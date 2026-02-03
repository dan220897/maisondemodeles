<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты - MAISON DE MODÈLES</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            overflow-x: hidden;
            background: #faf8f5;
            color: #2c2c2c;
        }

        
        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 60px;
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-label {
            font-size: 12px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #c9a57b;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .section-title {
            font-size: 56px;
            font-weight: 300;
            letter-spacing: -1px;
            color: #2c2c2c;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .section-description {
            max-width: 700px;
            margin: 0 auto;
            font-size: 18px;
            line-height: 1.8;
            color: #5a5a5a;
        }

        /* Contact Hero */
        .contact-hero {
            padding: 180px 0 120px;
            background: linear-gradient(135deg, #faf8f5 0%, #f5f1eb 100%);
        }

        /* Contact Info Section */
        .contact-info-section {
            padding: 120px 0;
            background: #fff;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 50px;
            margin-top: 60px;
        }

        .contact-card {
            text-align: center;
            padding: 50px 30px;
            background: #faf8f5;
            border-radius: 4px;
            transition: all 0.4s ease;
        }

        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        .contact-icon {
            width: 80px;
            height: 80px;
            background: #c9a57b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            color: #fff;
        }

        .contact-card h3 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 15px;
            color: #2c2c2c;
        }

        .contact-card p {
            font-size: 15px;
            line-height: 1.8;
            color: #5a5a5a;
            margin-bottom: 10px;
        }

        .contact-card a {
            color: #c9a57b;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .contact-card a:hover {
            color: #2c2c2c;
        }

        /* Contact Form Section */
        .contact-form-section {
            padding: 120px 0;
            background: #faf8f5;
        }

        .form-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 80px;
            margin-top: 60px;
        }

        .form-info {
            position: sticky;
            top: 150px;
            height: fit-content;
        }

        .form-info h3 {
            font-size: 32px;
            font-weight: 400;
            margin-bottom: 25px;
            color: #2c2c2c;
        }

        .form-info p {
            font-size: 16px;
            line-height: 1.8;
            color: #5a5a5a;
            margin-bottom: 30px;
        }

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .info-icon {
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            background: #c9a57b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .info-text h4 {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 5px;
            color: #2c2c2c;
        }

        .info-text p {
            font-size: 14px;
            line-height: 1.6;
            color: #5a5a5a;
            margin: 0;
        }

        .form-container {
            background: #fff;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
            color: #2c2c2c;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 15px 20px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            font-size: 15px;
            font-family: inherit;
            transition: all 0.3s ease;
            background: #faf8f5;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #c9a57b;
            background: #fff;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: #2c2c2c;
            color: #fff;
            border: none;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.4s ease;
            font-weight: 500;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: #c9a57b;
            transform: translateY(-2px);
        }

        .form-success {
            display: none;
            text-align: center;
            padding: 60px 30px;
        }

        .form-success.active {
            display: block;
        }

        .form-success svg {
            color: #4caf50;
            margin-bottom: 20px;
        }

        .form-success h3 {
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 15px;
            color: #2c2c2c;
        }

        .form-success p {
            font-size: 16px;
            color: #5a5a5a;
        }

        /* Map Section */
        .map-section {
            padding: 120px 0;
            background: #fff;
        }

        .map-container {
            margin-top: 60px;
            height: 500px;
            background: #f5f1eb;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
        }

        .map-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: #c9a57b;
        }

        .map-placeholder svg {
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .map-placeholder p {
            font-size: 18px;
            color: #5a5a5a;
        }

        /* FAQ Section */
        .faq-section {
            padding: 120px 0;
            background: #faf8f5;
        }

        .faq-list {
            max-width: 900px;
            margin: 60px auto 0;
        }

        .faq-item {
            background: #fff;
            margin-bottom: 20px;
            border-radius: 4px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-question {
            padding: 30px 60px 30px 30px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: #faf8f5;
        }

        .faq-question h3 {
            font-size: 18px;
            font-weight: 500;
            color: #2c2c2c;
            padding-right: 40px;
        }

        .faq-icon {
            position: absolute;
            right: 30px;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .faq-answer-content {
            padding: 0 30px 30px;
            font-size: 15px;
            line-height: 1.8;
            color: #5a5a5a;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
        }

        /* Social Section */
        .social-section {
            padding: 120px 0;
            background: #2c2c2c;
            color: #fff;
            text-align: center;
        }

        .social-section .section-label {
            color: #c9a57b;
        }

        .social-section .section-title {
            color: #fff;
        }

        .social-section .section-description {
            color: #d0d0d0;
        }

        .social-links {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 50px;
        }

        .social-link {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.4s ease;
        }

        .social-link:hover {
            background: #c9a57b;
            transform: translateY(-5px);
        }

        /* Footer */
        .footer {
            padding: 60px 0 30px;
            background: #2c2c2c;
            color: #fff;
            text-align: center;
        }

        .footer-content {
            margin-bottom: 30px;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: 300;
            letter-spacing: 3px;
            margin-bottom: 20px;
        }

        .footer-links {
            display: flex;
            gap: 30px;
            justify-content: center;
            margin-bottom: 30px;
        }

        .footer-links a {
            color: #d0d0d0;
            text-decoration: none;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #c9a57b;
        }

        .footer-bottom {
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 12px;
            color: #d0d0d0;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .contact-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .form-wrapper {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .form-info {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 30px;
            }

            .header {
                padding: 20px 30px;
            }

            .nav {
                position: fixed;
                top: 0;
                right: -100%;
                width: 300px;
                height: 100vh;
                background: #fff;
                flex-direction: column;
                padding: 100px 40px;
                transition: right 0.4s ease;
                box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
            }

            .nav.active {
                right: 0;
            }

            .menu-toggle {
                display: flex;
            }

            .section-title {
                font-size: 36px;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-container {
                padding: 40px 30px;
            }

            .map-container {
                height: 350px;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 28px;
            }

            .contact-card {
                padding: 40px 25px;
            }

            .form-info h3 {
                font-size: 26px;
            }

            .faq-question h3 {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
   <?php include 'inc/header.php'; ?>

    <!-- Contact Hero -->
    <section class="contact-hero">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Свяжитесь с нами</div>
                <h1 class="section-title">Контакты</h1>
                <p class="section-description">
                    Мы всегда рады ответить на ваши вопросы и помочь начать модельную карьеру вашего ребёнка
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-card">
                    <div class="contact-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </div>
                    <h3>Телефон</h3>
                    <p><a href="tel:+79060691153">+7 (906) 069-11-53</a></p>
                    <p style="margin-top: 10px; font-size: 13px;">Пн-Пт: 10:00 - 20:00<br>Сб-Вс: 11:00 - 18:00</p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <h3>Email</h3>
                    <p><a href="mailto:info@maisondemodeles.ru">info@maisondemodeles.ru</a></p>
                    <p style="margin-top: 10px; font-size: 13px;">Ответим в течение 24 часов</p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <h3>Адрес</h3>
                    <p>Москва, ул. Петровка, 15<br>БЦ "Столица", 3 этаж</p>
                    <p style="margin-top: 10px; font-size: 13px;">м. Театральная, 5 мин пешком</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <div class="form-wrapper">
                <div class="form-info">
                    <h3>Запишитесь на бесплатный кастинг</h3>
                    <p>
                        Заполните форму, и наш менеджер свяжется с вами в течение 24 часов для 
                        записи на бесплатный кастинг в модельную школу.
                    </p>

                    <div class="info-list">
                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="info-text">
                                <h4>Бесплатный кастинг</h4>
                                <p>Знакомство с преподавателями и оценка потенциала ребёнка</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="info-text">
                                <h4>Индивидуальная консультация</h4>
                                <p>Рекомендации по развитию модельной карьеры</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="info-text">
                                <h4>Экскурсия по школе</h4>
                                <p>Осмотр учебных классов и знакомство с атмосферой</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="info-text">
                                <h4>Без обязательств</h4>
                                <p>Никаких обязательств по оплате или записи</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-container">
                    <div class="form-success" id="formSuccess">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <h3>Заявка отправлена!</h3>
                        <p>Мы свяжемся с вами в ближайшее время</p>
                    </div>

                    <form id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Ваше имя *</label>
                                <input type="text" name="parentName" required placeholder="Введите ваше имя">
                            </div>
                            <div class="form-group">
                                <label>Имя ребёнка *</label>
                                <input type="text" name="childName" required placeholder="Введите имя ребёнка">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Телефон *</label>
                                <input type="tel" name="phone" required placeholder="+7 (___) ___-__-__">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="your@email.com">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Возраст ребёнка *</label>
                                <select name="childAge" required>
                                    <option value="">Выберите возраст</option>
                                    <option value="4">4 года</option>
                                    <option value="5">5 лет</option>
                                    <option value="6">6 лет</option>
                                    <option value="7">7 лет</option>
                                    <option value="8">8 лет</option>
                                    <option value="9">9 лет</option>
                                    <option value="10">10 лет</option>
                                    <option value="11">11 лет</option>
                                    <option value="12">12 лет</option>
                                    <option value="13">13 лет</option>
                                    <option value="14">14 лет</option>
                                    <option value="15">15 лет</option>
                                    <option value="16">16 лет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Как узнали о нас?</label>
                                <select name="source">
                                    <option value="">Выберите вариант</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="friends">От знакомых</option>
                                    <option value="internet">Поиск в интернете</option>
                                    <option value="advertising">Реклама</option>
                                    <option value="other">Другое</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Комментарий</label>
                            <textarea name="message" placeholder="Расскажите о вашем ребёнке, его интересах и опыте (если есть)"></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Отправить заявку</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Как нас найти</div>
                <h2 class="section-title">Мы на карте</h2>
                <p class="section-description">
                    Наша школа находится в центре Москвы, в 5 минутах ходьбы от метро Театральная
                </p>
            </div>

            <div class="map-container">
                <div class="map-placeholder">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <p>Москва, ул. Петровка, 15, БЦ "Столица", 3 этаж</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Часто задаваемые вопросы</div>
                <h2 class="section-title">FAQ</h2>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Какой возраст детей вы принимаете в школу?</h3>
                        <div class="faq-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Мы принимаем детей в возрасте от 4 до 16 лет. Для каждой возрастной группы разработана специальная программа обучения, учитывающая психологические и физические особенности развития.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Сколько длится обучение в школе?</h3>
                        <div class="faq-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Базовый курс длится 3 месяца с занятиями 2 раза в неделю. После этого ученики могут продолжить обучение на продвинутых курсах или начать работать с модельным агентством.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Нужен ли опыт для поступления в школу?</h3>
                        <div class="faq-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Нет, предварительный опыт не требуется. Мы обучаем детей с нуля, начиная с базовых навыков дефиле, позирования и актёрского мастерства.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Как проходит кастинг?</h3>
                        <div class="faq-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Бесплатный кастинг длится около 30 минут. Наши преподаватели оценивают потенциал ребёнка, дают рекомендации и проводят экскурсию по школе. Родители получают полную информацию о программе обучения.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Могут ли дети начать работать во время обучения?</h3>
                        <div class="faq-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Да, после освоения базовых навыков (обычно через 1-2 месяца обучения) мы начинаем приглашать детей на кастинги для съёмок и показов. Участие в проектах согласовывается с родителями.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Какова стоимость обучения?</h3>
                        <div class="faq-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Стоимость базового курса (3 месяца, 2 занятия в неделю) составляет 45 000 рублей. Возможна помесячная оплата по 15 000 рублей. Мы также предлагаем скидки для братьев и сестёр.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Section -->
    <section class="social-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Следите за нами</div>
                <h2 class="section-title">Мы в социальных сетях</h2>
                <p class="section-description">
                    Подписывайтесь на наши аккаунты, чтобы следить за успехами наших учеников и быть в курсе всех новостей
                </p>
            </div>

            <div class="social-links">
                <a href="#" class="social-link" aria-label="Instagram">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="Telegram">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="VK">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.07 2H8.93C3.33 2 2 3.33 2 8.93v6.14C2 20.67 3.33 22 8.93 22h6.14c5.6 0 6.93-1.33 6.93-6.93V8.93C22 3.33 20.67 2 15.07 2zm3.18 14.23h-1.26c-.49 0-.64-.39-1.52-1.27-.77-.73-1.11-.83-1.31-.83-.26 0-.34.08-.34.49v1.16c0 .32-.09.5-1.01.5-1.48 0-3.11-.89-4.27-2.56-1.73-2.44-2.21-4.29-2.21-4.67 0-.2.08-.39.49-.39h1.26c.37 0 .51.17.65.56.71 2.05 1.91 3.84 2.39 3.84.19 0 .27-.09.27-.55v-2.15c-.06-.97-.57-1.05-.57-1.39 0-.16.14-.32.36-.32h1.98c.31 0 .42.17.42.53v2.9c0 .31.14.42.23.42.19 0 .35-.11.7-.46 1.07-1.2 1.84-3.06 1.84-3.06.1-.21.27-.39.64-.39h1.26c.38 0 .46.19.38.53-.14.78-1.69 3.37-1.69 3.37-.16.26-.21.37 0 .67.14.21.63.62 1 1.05.61.71 1.09 1.31 1.22 1.72.12.42-.08.64-.49.64z"/>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="WhatsApp">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="YouTube">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                        <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">MAISON DE MODÈLES</div>
                <div class="footer-links">
                    <a href="index.php">Главная</a>
                    <a href="about.php">О нас</a>
                    <a href="school.php">Школа</a>
                    <a href="agency.php">Агентство</a>
                    <a href="portfolio.php">Портфолио</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2024 MAISON DE MODÈLES. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav');

        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('active');
        });

        // FAQ Accordion
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                
                // Close all items
                faqItems.forEach(i => i.classList.remove('active'));
                
                // Open clicked item if it wasn't active
                if (!isActive) {
                    item.classList.add('active');
                }
            });
        });

        // Form submission
        const contactForm = document.getElementById('contactForm');
        const formSuccess = document.getElementById('formSuccess');

        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Hide form and show success message
            contactForm.style.display = 'none';
            formSuccess.classList.add('active');
            
            // Reset form after 3 seconds
            setTimeout(() => {
                contactForm.reset();
                contactForm.style.display = 'block';
                formSuccess.classList.remove('active');
            }, 3000);
        });

        // Phone mask
        const phoneInput = document.querySelector('input[name="phone"]');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 0) {
                    if (value[0] === '7' || value[0] === '8') {
                        value = '7' + value.substring(1);
                    } else {
                        value = '7' + value;
                    }
                    
                    let formattedValue = '+7';
                    if (value.length > 1) {
                        formattedValue += ' (' + value.substring(1, 4);
                    }
                    if (value.length >= 5) {
                        formattedValue += ') ' + value.substring(4, 7);
                    }
                    if (value.length >= 8) {
                        formattedValue += '-' + value.substring(7, 9);
                    }
                    if (value.length >= 10) {
                        formattedValue += '-' + value.substring(9, 11);
                    }
                    
                    e.target.value = formattedValue;
                }
            });
        }
    </script>
</body>
</html>