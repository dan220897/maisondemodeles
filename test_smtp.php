<?php
/**
 * Простой тест SMTP
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: text/html; charset=utf-8');

echo '<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест SMTP</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; padding: 20px; background: #f5f5f5; }
        .box { background: white; padding: 20px; margin: 15px 0; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .success { background: #d4edda; border-left: 4px solid #28a745; }
        .error { background: #f8d7da; border-left: 4px solid #dc3545; }
        .info { background: #d1ecf1; border-left: 4px solid #17a2b8; }
        .warning { background: #fff3cd; border-left: 4px solid #ffc107; }
        h1 { color: #333; margin-top: 0; }
        h2 { color: #555; border-bottom: 2px solid #ddd; padding-bottom: 10px; }
        pre { background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto; border: 1px solid #ddd; }
        .btn { display: inline-block; padding: 12px 24px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; margin: 10px 5px 10px 0; border: none; cursor: pointer; }
        .btn:hover { background: #0056b3; }
        .status { display: inline-block; padding: 5px 10px; border-radius: 3px; font-weight: bold; }
        .status.ok { background: #28a745; color: white; }
        .status.fail { background: #dc3545; color: white; }
        table { width: 100%; border-collapse: collapse; }
        table td { padding: 8px; border-bottom: 1px solid #ddd; }
        table td:first-child { font-weight: bold; width: 200px; }
    </style>
</head>
<body>
    <h1>🔧 Тест SMTP настроек</h1>';

// Шаг 1: Проверка файла конфигурации
echo '<div class="box">';
echo '<h2>Шаг 1: Проверка файлов</h2>';

if (file_exists('smtp_config.php')) {
    echo '<p class="success">✓ smtp_config.php найден</p>';
    require_once 'smtp_config.php';
} else {
    echo '<p class="error">✗ smtp_config.php НЕ НАЙДЕН!</p>';
    echo '<p>Создайте файл smtp_config.php в той же папке.</p>';
    exit;
}

if (file_exists('send_contact.php')) {
    echo '<p class="success">✓ send_contact.php найден</p>';
} else {
    echo '<p class="error">✗ send_contact.php НЕ НАЙДЕН!</p>';
}

echo '</div>';

// Шаг 2: Текущие настройки
echo '<div class="box info">';
echo '<h2>Шаг 2: Текущие настройки</h2>';
echo '<table>';
echo '<tr><td>SMTP Host</td><td>' . SMTP_HOST . '</td></tr>';
echo '<tr><td>SMTP Port</td><td>' . SMTP_PORT . '</td></tr>';
echo '<tr><td>SMTP Username</td><td>' . SMTP_USERNAME . '</td></tr>';
echo '<tr><td>SMTP Encryption</td><td>' . SMTP_ENCRYPTION . '</td></tr>';
echo '<tr><td>From Email</td><td>' . DEFAULT_FROM_EMAIL . '</td></tr>';
echo '<tr><td>From Name</td><td>' . DEFAULT_FROM_NAME . '</td></tr>';
echo '<tr><td>Use SMTP</td><td>' . (USE_SMTP ? 'Да' : 'Нет (используется mail())') . '</td></tr>';
echo '</table>';
echo '</div>';

// Шаг 3: Проверка PHP функций
echo '<div class="box">';
echo '<h2>Шаг 3: Проверка PHP функций</h2>';

$functions = [
    'fsockopen' => 'Открытие сокетов',
    'fgets' => 'Чтение из сокета',
    'fputs' => 'Запись в сокет',
    'stream_socket_enable_crypto' => 'Шифрование TLS/SSL'
];

$allOk = true;
foreach ($functions as $func => $desc) {
    if (function_exists($func)) {
        echo "<p class='success'>✓ $func() - $desc</p>";
    } else {
        echo "<p class='error'>✗ $func() недоступна - $desc</p>";
        $allOk = false;
    }
}

if (!$allOk) {
    echo '<div class="warning"><strong>⚠️ Внимание:</strong> Некоторые функции недоступны. Обратитесь в поддержку хостинга.</div>';
}

echo '</div>';

// Шаг 4: Тест подключения
echo '<div class="box">';
echo '<h2>Шаг 4: Тест подключения к SMTP серверу</h2>';

echo '<p>Пытаемся подключиться к ' . SMTP_HOST . ':' . SMTP_PORT . '...</p>';

$errno = 0;
$errstr = '';
$timeout = 10;

$connection = @fsockopen(SMTP_HOST, SMTP_PORT, $errno, $errstr, $timeout);

if ($connection) {
    echo '<p class="success"><strong>✓ Подключение успешно!</strong></p>';
    
    // Читаем приветствие сервера
    $greeting = fgets($connection, 515);
    echo '<p>Ответ сервера:</p>';
    echo '<pre>' . htmlspecialchars($greeting) . '</pre>';
    
    if (substr($greeting, 0, 3) == '220') {
        echo '<p class="success">✓ Сервер готов принимать команды</p>';
    } else {
        echo '<p class="error">✗ Неожиданный код ответа: ' . substr($greeting, 0, 3) . '</p>';
    }
    
    fclose($connection);
} else {
    echo '<p class="error"><strong>✗ Ошибка подключения!</strong></p>';
    echo '<p>Код ошибки: ' . $errno . '</p>';
    echo '<p>Сообщение: ' . htmlspecialchars($errstr) . '</p>';
    
    echo '<div class="warning">';
    echo '<h3>Возможные причины:</h3>';
    echo '<ul>';
    echo '<li>Неверный хост SMTP или порт</li>';
    echo '<li>Файрвол блокирует исходящие подключения</li>';
    echo '<li>SMTP сервер Beget временно недоступен</li>';
    echo '<li>Хостинг ограничивает использование fsockopen()</li>';
    echo '</ul>';
    echo '<h3>Что делать:</h3>';
    echo '<ol>';
    echo '<li>Попробуйте другой порт (587, 465, 25)</li>';
    echo '<li>Свяжитесь с поддержкой Beget: support@beget.com</li>';
    echo '<li>Используйте встроенную функцию mail() вместо SMTP</li>';
    echo '</ol>';
    echo '</div>';
}

echo '</div>';

// Шаг 5: Альтернативные настройки
echo '<div class="box info">';
echo '<h2>Шаг 5: Альтернативные настройки для Beget</h2>';
echo '<p>Если текущие настройки не работают, попробуйте:</p>';

$alternatives = [
    ['host' => 'smtp.beget.com', 'port' => 2525, 'encryption' => 'tls', 'desc' => 'TLS на порту 2525 (рекомендуется)'],
    ['host' => 'smtp.beget.com', 'port' => 587, 'encryption' => 'tls', 'desc' => 'TLS на порту 587'],
    ['host' => 'smtp.beget.com', 'port' => 465, 'encryption' => 'ssl', 'desc' => 'SSL на порту 465'],
    ['host' => 'smtp.beget.com', 'port' => 25, 'encryption' => '', 'desc' => 'Без шифрования на порту 25'],
];

echo '<table>';
foreach ($alternatives as $alt) {
    $current = (SMTP_HOST == $alt['host'] && SMTP_PORT == $alt['port']) ? ' <span class="status ok">ТЕКУЩАЯ</span>' : '';
    echo '<tr>';
    echo '<td>' . $alt['desc'] . $current . '</td>';
    echo '<td><code>Host: ' . $alt['host'] . ', Port: ' . $alt['port'] . ', Encryption: ' . ($alt['encryption'] ?: 'none') . '</code></td>';
    echo '</tr>';
}
echo '</table>';

echo '</div>';

// Шаг 6: Тест отправки (если есть параметр)
if (isset($_GET['send_test'])) {
    echo '<div class="box">';
    echo '<h2>Шаг 6: Тест отправки письма</h2>';
    
    $testEmail = $_GET['test_email'] ?? 'diane_kilchurina@mail.ru';
    
    echo '<p>Отправляем тестовое письмо на: <strong>' . htmlspecialchars($testEmail) . '</strong></p>';
    
    // Простая проверка отправки через mail()
    $subject = 'Тестовое письмо с ' . $_SERVER['SERVER_NAME'];
    $message = "Это тестовое письмо.\n\nЕсли вы его получили, значит отправка работает!\n\nДата: " . date('d.m.Y H:i:s');
    $headers = "From: " . DEFAULT_FROM_NAME . " <" . DEFAULT_FROM_EMAIL . ">\r\n";
    $headers .= "Reply-To: " . DEFAULT_FROM_EMAIL . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    if (mail($testEmail, $subject, $message, $headers)) {
        echo '<p class="success">✓ Письмо отправлено через функцию mail()</p>';
        echo '<p>Проверьте почтовый ящик (в том числе папку Спам)</p>';
    } else {
        echo '<p class="error">✗ Ошибка отправки через mail()</p>';
    }
    
    echo '</div>';
}

// Форма для теста
echo '<div class="box">';
echo '<h2>Отправить тестовое письмо</h2>';
echo '<form method="get">';
echo '<input type="email" name="test_email" value="diane_kilchurina@mail.ru" style="padding: 10px; width: 300px; border: 1px solid #ddd; border-radius: 4px;">';
echo '<input type="hidden" name="send_test" value="1">';
echo '<button type="submit" class="btn">Отправить тест</button>';
echo '</form>';
echo '</div>';

// Шаг 7: Проверка error.log
if (file_exists(__DIR__ . '/error.log')) {
    echo '<div class="box warning">';
    echo '<h2>Последние ошибки (error.log)</h2>';
    $log = file_get_contents(__DIR__ . '/error.log');
    $lines = array_slice(explode("\n", $log), -15);
    echo '<pre>' . htmlspecialchars(implode("\n", $lines)) . '</pre>';
    echo '</div>';
}

// Рекомендации
echo '<div class="box info">';
echo '<h2>📋 Рекомендации</h2>';
echo '<ol>';
echo '<li><strong>Если тест подключения успешен:</strong> SMTP работает, проблема в send_contact.php</li>';
echo '<li><strong>Если тест подключения НЕ успешен:</strong> Попробуйте альтернативные настройки выше</li>';
echo '<li><strong>Если ничего не помогает:</strong> Используйте mail() вместо SMTP (в smtp_config.php: USE_SMTP = false)</li>';
echo '<li><strong>После теста:</strong> Удалите этот файл для безопасности!</li>';
echo '</ol>';
echo '</div>';

// Контакты
echo '<div class="box">';
echo '<h2>📞 Техподдержка</h2>';
echo '<p><strong>Beget:</strong></p>';
echo '<ul>';
echo '<li>Email: support@beget.com</li>';
echo '<li>Телефон: +7 (495) 721-85-55</li>';
echo '<li>Документация: <a href="https://beget.com/ru/kb/email/pochta-smtp" target="_blank">beget.com/ru/kb/email/pochta-smtp</a></li>';
echo '</ul>';
echo '</div>';

echo '</body></html>';
?>