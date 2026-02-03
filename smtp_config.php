<?php
/**
 * Настройки SMTP для отправки писем через Beget
 * Обновлено для работы с SMTP Beget.com
 */

// Включить использование SMTP вместо mail()
define('USE_SMTP', true);

// Настройки SMTP-сервера Beget
define('SMTP_HOST', 'smtp.beget.com');      // SMTP сервер Beget
define('SMTP_PORT', 2525);                   // Порт для TLS (альтернативно: 465 для SSL, 25 без шифрования)
define('SMTP_USERNAME', 'info@etat.agency'); // Ваш email на Beget
define('SMTP_PASSWORD', 'Mur220897!');       // Пароль от почтового ящика
define('SMTP_ENCRYPTION', 'tls');            // Тип шифрования: 'tls' для порта 2525, 'ssl' для порта 465

// Настройки отправителя по умолчанию
define('DEFAULT_FROM_NAME', 'PHOTO.ETAT');
define('DEFAULT_FROM_EMAIL', 'info@etat.agency');

// Настройка для логирования отправки писем
define('LOG_EMAILS', true);                  // Включить логирование писем для отладки


?>