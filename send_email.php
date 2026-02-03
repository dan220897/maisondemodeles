<?php
require_once 'smtp_config.php';

header('Content-Type: application/json');

// Проверка метода запроса
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo json_encode(['success' => false, 'message' => 'Неверный метод запроса']);
    exit;
}

// Получение данных из формы
$name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : '';
$message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';

// Валидация данных
if (empty($name) || empty($email) || empty($phone)) {
    echo json_encode(['success' => false, 'message' => 'Пожалуйста, заполните все обязательные поля']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Неверный формат email']);
    exit;
}

// Настройки email
$to = "diane_kilchurina@mail.ru";
$subject = "Новая заявка на запись с сайта";

// Формирование тела письма
$email_body = "Новая заявка на запись:\n\n";
$email_body .= "Имя: $name\n";
$email_body .= "Email: $email\n";
$email_body .= "Телефон: $phone\n";
if (!empty($message)) {
    $email_body .= "Сообщение: $message\n";
}
$email_body .= "\n---\n";
$email_body .= "Дата отправки: " . date('d.m.Y H:i:s') . "\n";

// Отправка через SMTP
if (USE_SMTP) {
    try {
        $result = sendEmailViaSMTP($to, $subject, $email_body, $email);
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Заявка успешно отправлена']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Ошибка при отправке письма']);
        }
    } catch (Exception $e) {
        if (LOG_EMAILS) {
            error_log("SMTP Error: " . $e->getMessage());
        }
        echo json_encode(['success' => false, 'message' => 'Ошибка при отправке письма']);
    }
} else {
    // Fallback на стандартную функцию mail()
    $headers = "From: " . DEFAULT_FROM_NAME . " <" . DEFAULT_FROM_EMAIL . ">\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    if (mail($to, $subject, $email_body, $headers)) {
        echo json_encode(['success' => true, 'message' => 'Заявка успешно отправлена']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ошибка при отправке письма']);
    }
}

/**
 * Функция отправки email через SMTP
 */
function sendEmailViaSMTP($to, $subject, $body, $replyTo = null) {
    $from = DEFAULT_FROM_EMAIL;
    $fromName = DEFAULT_FROM_NAME;
    
    // Подключение к SMTP серверу
    $smtp = fsockopen(SMTP_HOST, SMTP_PORT, $errno, $errstr, 30);
    
    if (!$smtp) {
        if (LOG_EMAILS) {
            error_log("SMTP Connection failed: $errstr ($errno)");
        }
        return false;
    }
    
    // Функция для отправки команды и получения ответа
    $sendCommand = function($command, $expectedCode = 250) use ($smtp) {
        if (LOG_EMAILS) {
            error_log("SMTP Command: $command");
        }
        
        fputs($smtp, $command . "\r\n");
        $response = fgets($smtp, 515);
        
        if (LOG_EMAILS) {
            error_log("SMTP Response: $response");
        }
        
        $code = substr($response, 0, 3);
        return $code == $expectedCode;
    };
    
    try {
        // Читаем приветствие сервера
        fgets($smtp, 515);
        
        // EHLO
        if (!$sendCommand("EHLO " . $_SERVER['SERVER_NAME'], 250)) {
            throw new Exception("EHLO failed");
        }
        
        // STARTTLS если используется TLS
        if (SMTP_ENCRYPTION === 'tls') {
            if (!$sendCommand("STARTTLS", 220)) {
                throw new Exception("STARTTLS failed");
            }
            
            stream_socket_enable_crypto($smtp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            
            // Повторный EHLO после STARTTLS
            if (!$sendCommand("EHLO " . $_SERVER['SERVER_NAME'], 250)) {
                throw new Exception("EHLO after STARTTLS failed");
            }
        }
        
        // AUTH LOGIN
        if (!$sendCommand("AUTH LOGIN", 334)) {
            throw new Exception("AUTH LOGIN failed");
        }
        
        if (!$sendCommand(base64_encode(SMTP_USERNAME), 334)) {
            throw new Exception("Username authentication failed");
        }
        
        if (!$sendCommand(base64_encode(SMTP_PASSWORD), 235)) {
            throw new Exception("Password authentication failed");
        }
        
        // MAIL FROM
        if (!$sendCommand("MAIL FROM: <$from>", 250)) {
            throw new Exception("MAIL FROM failed");
        }
        
        // RCPT TO
        if (!$sendCommand("RCPT TO: <$to>", 250)) {
            throw new Exception("RCPT TO failed");
        }
        
        // DATA
        if (!$sendCommand("DATA", 354)) {
            throw new Exception("DATA command failed");
        }
        
        // Формирование заголовков и тела письма
        $headers = "From: $fromName <$from>\r\n";
        if ($replyTo) {
            $headers .= "Reply-To: $replyTo\r\n";
        }
        $headers .= "To: $to\r\n";
        $headers .= "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\r\n";
        $headers .= "Date: " . date('r') . "\r\n";
        $headers .= "Message-ID: <" . time() . "." . md5($to . $from) . "@" . $_SERVER['SERVER_NAME'] . ">\r\n";
        
        $emailContent = $headers . "\r\n" . $body . "\r\n.\r\n";
        
        fputs($smtp, $emailContent);
        $response = fgets($smtp, 515);
        
        if (LOG_EMAILS) {
            error_log("SMTP Data Response: $response");
        }
        
        if (substr($response, 0, 3) != 250) {
            throw new Exception("Email sending failed");
        }
        
        // QUIT
        $sendCommand("QUIT", 221);
        
        fclose($smtp);
        
        if (LOG_EMAILS) {
            error_log("Email sent successfully to: $to");
        }
        
        return true;
        
    } catch (Exception $e) {
        if (LOG_EMAILS) {
            error_log("SMTP Error: " . $e->getMessage());
        }
        fclose($smtp);
        return false;
    }
}
?>