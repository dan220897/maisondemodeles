<?php
// Установка кодировки
header('Content-Type: application/json; charset=utf-8');
ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');

// Включаем отображение ошибок для отладки (закомментируйте в продакшене)
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log');

require_once 'smtp_config.php';

// Проверка метода запроса
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo json_encode([
        'success' => false, 
        'message' => 'Неверный метод запроса'
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Получение и очистка данных
$parentName = isset($_POST['parentName']) ? trim($_POST['parentName']) : '';
$childName = isset($_POST['childName']) ? trim($_POST['childName']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$childAge = isset($_POST['childAge']) ? trim($_POST['childAge']) : '';
$source = isset($_POST['source']) ? trim($_POST['source']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Валидация
$errors = [];

if (empty($parentName)) {
    $errors[] = 'Укажите имя родителя';
}
if (empty($childName)) {
    $errors[] = 'Укажите имя ребёнка';
}
if (empty($phone)) {
    $errors[] = 'Укажите телефон';
}
if (empty($email)) {
    $errors[] = 'Укажите email';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Неверный формат email';
}
if (empty($childAge)) {
    $errors[] = 'Укажите возраст ребёнка';
}
if (empty($source)) {
    $errors[] = 'Укажите, как узнали о нас';
}

if (!empty($errors)) {
    echo json_encode([
        'success' => false, 
        'message' => implode(', ', $errors)
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Настройки получателя
$to = "diane_kilchurina@mail.ru";
$subject = "Новая заявка на запись в модельную школу";

// Словарь источников
$sourceText = [
    'instagram' => 'Instagram',
    'vk' => 'VKontakte',
    'friends' => 'От друзей',
    'google' => 'Поиск в Google',
    'yandex' => 'Поиск в Яндекс',
    'other' => 'Другое'
];

// Формирование тела письма
$emailBody = "Новая заявка на запись в модельную школу:\n\n";
$emailBody .= "═══════════════════════════════════\n";
$emailBody .= "ИНФОРМАЦИЯ О РОДИТЕЛЕ\n";
$emailBody .= "═══════════════════════════════════\n";
$emailBody .= "Имя родителя: {$parentName}\n";
$emailBody .= "Телефон: {$phone}\n";
$emailBody .= "Email: {$email}\n\n";

$emailBody .= "═══════════════════════════════════\n";
$emailBody .= "ИНФОРМАЦИЯ О РЕБЁНКЕ\n";
$emailBody .= "═══════════════════════════════════\n";
$emailBody .= "Имя ребёнка: {$childName}\n";
$emailBody .= "Возраст: {$childAge} лет\n\n";

$emailBody .= "═══════════════════════════════════\n";
$emailBody .= "ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ\n";
$emailBody .= "═══════════════════════════════════\n";
$emailBody .= "Как узнали: " . ($sourceText[$source] ?? $source) . "\n";

if (!empty($message)) {
    $emailBody .= "\nСообщение:\n{$message}\n";
}

$emailBody .= "\n═══════════════════════════════════\n";
$emailBody .= "Дата: " . date('d.m.Y H:i:s') . "\n";
$emailBody .= "IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
$emailBody .= "═══════════════════════════════════\n";

// Попытка отправки
try {
    if (USE_SMTP) {
        $result = sendEmailViaSMTP($to, $subject, $emailBody, $email);
    } else {
        // Fallback на mail()
        $headers = "From: " . DEFAULT_FROM_NAME . " <" . DEFAULT_FROM_EMAIL . ">\r\n";
        $headers .= "Reply-To: {$email}\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        $result = mail($to, $subject, $emailBody, $headers);
    }
    
    if ($result) {
        echo json_encode([
            'success' => true, 
            'message' => 'Заявка успешно отправлена'
        ], JSON_UNESCAPED_UNICODE);
    } else {
        throw new Exception('Ошибка отправки письма');
    }
    
} catch (Exception $e) {
    error_log("Email Error: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => 'Ошибка при отправке. Попробуйте позже или свяжитесь с нами по телефону.'
    ], JSON_UNESCAPED_UNICODE);
}

/**
 * Отправка через SMTP
 */
function sendEmailViaSMTP($to, $subject, $body, $replyTo = null) {
    $from = DEFAULT_FROM_EMAIL;
    $fromName = DEFAULT_FROM_NAME;
    
    try {
        // Попытка подключения
        $smtp = @fsockopen(SMTP_HOST, SMTP_PORT, $errno, $errstr, 10);
        
        if (!$smtp) {
            error_log("SMTP connection failed: {$errstr} ({$errno})");
            return false;
        }
        
        stream_set_timeout($smtp, 10);
        
        // Чтение приветствия
        $response = fgets($smtp, 515);
        if (substr($response, 0, 3) != '220') {
            throw new Exception("Invalid server greeting: {$response}");
        }
        
        // EHLO
        fputs($smtp, "EHLO " . gethostname() . "\r\n");
        $response = fgets($smtp, 515);
        if (substr($response, 0, 3) != '250') {
            throw new Exception("EHLO failed: {$response}");
        }
        
        // Пропускаем остальные строки EHLO
        while ($line = fgets($smtp, 515)) {
            if (substr($line, 3, 1) == ' ') break;
        }
        
        // STARTTLS
        if (SMTP_ENCRYPTION === 'tls') {
            fputs($smtp, "STARTTLS\r\n");
            $response = fgets($smtp, 515);
            if (substr($response, 0, 3) != '220') {
                throw new Exception("STARTTLS failed: {$response}");
            }
            
            if (!stream_socket_enable_crypto($smtp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
                throw new Exception("Failed to enable TLS");
            }
            
            // Повторный EHLO
            fputs($smtp, "EHLO " . gethostname() . "\r\n");
            $response = fgets($smtp, 515);
            if (substr($response, 0, 3) != '250') {
                throw new Exception("EHLO after TLS failed: {$response}");
            }
            
            while ($line = fgets($smtp, 515)) {
                if (substr($line, 3, 1) == ' ') break;
            }
        }
        
        // AUTH LOGIN
        fputs($smtp, "AUTH LOGIN\r\n");
        $response = fgets($smtp, 515);
        if (substr($response, 0, 3) != '334') {
            throw new Exception("AUTH LOGIN failed: {$response}");
        }
        
        // Username
        fputs($smtp, base64_encode(SMTP_USERNAME) . "\r\n");
        $response = fgets($smtp, 515);
        if (substr($response, 0, 3) != '334') {
            throw new Exception("Username auth failed: {$response}");
        }
        
        // Password
        fputs($smtp, base64_encode(SMTP_PASSWORD) . "\r\n");
        $response = fgets($smtp, 515);
        if (substr($response, 0, 3) != '235') {
            throw new Exception("Password auth failed: {$response}");
        }
        
        // MAIL FROM
        fputs($smtp, "MAIL FROM: <{$from}>\r\n");
        $response = fgets($smtp, 515);
        if (substr($response, 0, 3) != '250') {
            throw new Exception("MAIL FROM failed: {$response}");
        }
        
        // RCPT TO
        fputs($smtp, "RCPT TO: <{$to}>\r\n");
        $response = fgets($smtp, 515);
        if (substr($response, 0, 3) != '250') {
            throw new Exception("RCPT TO failed: {$response}");
        }
        
        // DATA
        fputs($smtp, "DATA\r\n");
        $response = fgets($smtp, 515);
        if (substr($response, 0, 3) != '354') {
            throw new Exception("DATA failed: {$response}");
        }
        
        // Заголовки и тело
        $headers = "From: {$fromName} <{$from}>\r\n";
        if ($replyTo) {
            $headers .= "Reply-To: {$replyTo}\r\n";
        }
        $headers .= "To: {$to}\r\n";
        $headers .= "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\r\n";
        $headers .= "Date: " . date('r') . "\r\n";
        $headers .= "Message-ID: <" . time() . "@" . gethostname() . ">\r\n";
        
        fputs($smtp, $headers . "\r\n" . $body . "\r\n.\r\n");
        $response = fgets($smtp, 515);
        if (substr($response, 0, 3) != '250') {
            throw new Exception("Message not accepted: {$response}");
        }
        
        // QUIT
        fputs($smtp, "QUIT\r\n");
        fclose($smtp);
        
        return true;
        
    } catch (Exception $e) {
        error_log("SMTP Error: " . $e->getMessage());
        if (isset($smtp) && is_resource($smtp)) {
            fclose($smtp);
        }
        return false;
    }
}
?>