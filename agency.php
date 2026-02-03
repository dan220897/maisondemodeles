<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Агентство - MAISON DE MODÈLES</title>
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

        /* Agency Hero */
        .agency-hero {
            padding: 180px 0 120px;
            background: linear-gradient(135deg, #faf8f5 0%, #f5f1eb 100%);
        }

        .hero-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            margin-top: 60px;
        }

        .stat-box {
            text-align: center;
            padding: 40px 20px;
            background: #fff;
            border-radius: 4px;
            transition: all 0.4s ease;
        }

        .stat-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .stat-number {
            font-size: 48px;
            font-weight: 300;
            color: #c9a57b;
            margin-bottom: 10px;
        }

        .stat-text {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #5a5a5a;
        }

        /* Services Section */
        .services-section {
            padding: 120px 0;
            background: #fff;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-top: 60px;
        }

        .service-card {
            padding: 50px 40px;
            background: #faf8f5;
            border-radius: 4px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #c9a57b;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background: #c9a57b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            color: #fff;
            font-size: 24px;
        }

        .service-card h3 {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 20px;
            color: #2c2c2c;
        }

        .service-card p {
            font-size: 15px;
            line-height: 1.8;
            color: #5a5a5a;
        }

        /* Process Section */
        .process-section {
            padding: 120px 0;
            background: #2c2c2c;
            color: #fff;
        }

        .process-section .section-label {
            color: #c9a57b;
        }

        .process-section .section-title {
            color: #fff;
        }

        .process-section .section-description {
            color: #d0d0d0;
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 60px;
        }

        .step-card {
            padding: 40px 30px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            transition: all 0.4s ease;
        }

        .step-card:hover {
            background: rgba(201, 165, 123, 0.1);
            border-color: #c9a57b;
            transform: translateY(-5px);
        }

        .step-number {
            font-size: 48px;
            font-weight: 300;
            color: #c9a57b;
            margin-bottom: 20px;
            line-height: 1;
        }

        .step-card h3 {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 15px;
            color: #fff;
        }

        .step-card p {
            font-size: 14px;
            line-height: 1.7;
            color: #d0d0d0;
        }

        /* Benefits Section */
        .benefits-section {
            padding: 120px 0;
            background: #fff;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
            margin-top: 60px;
        }

        .benefit-item {
            display: flex;
            gap: 30px;
            padding: 40px;
            background: #faf8f5;
            border-radius: 4px;
            transition: all 0.4s ease;
        }

        .benefit-item:hover {
            transform: translateX(10px);
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.08);
        }

        .benefit-icon {
            flex-shrink: 0;
            width: 50px;
            height: 50px;
            background: #c9a57b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
        }

        .benefit-content h3 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 12px;
            color: #2c2c2c;
        }

        .benefit-content p {
            font-size: 15px;
            line-height: 1.7;
            color: #5a5a5a;
        }

        /* CTA Section */
        .cta-section {
            padding: 120px 0;
            background: linear-gradient(135deg, #c9a57b 0%, #b89566 100%);
            text-align: center;
            color: #fff;
        }

        .cta-section h2 {
            font-size: 48px;
            font-weight: 300;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .cta-btn {
            padding: 18px 40px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
            cursor: pointer;
            transition: all 0.4s ease;
            text-decoration: none;
            display: inline-block;
            font-weight: 500;
        }

        .cta-btn-primary {
            background: #fff;
            color: #c9a57b;
        }

        .cta-btn-primary:hover {
            background: #2c2c2c;
            color: #fff;
            transform: translateY(-3px);
        }

        .cta-btn-secondary {
            background: transparent;
            color: #fff;
            border: 2px solid #fff;
        }

        .cta-btn-secondary:hover {
            background: #fff;
            color: #c9a57b;
            transform: translateY(-3px);
        }

        /* Contact Form Section */
        .contact-form-section {
            padding: 120px 0;
            background: #faf8f5;
        }

        .form-wrapper {
            max-width: 800px;
            margin: 60px auto 0;
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
            min-height: 150px;
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
        }

        .submit-btn:hover {
            background: #c9a57b;
            transform: translateY(-2px);
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
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .process-steps {
                grid-template-columns: repeat(2, 1fr);
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

            .hero-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .process-steps {
                grid-template-columns: 1fr;
            }

            .benefits-grid {
                grid-template-columns: 1fr;
            }

            .benefit-item:hover {
                transform: translateY(-5px);
            }

            .form-wrapper {
                padding: 40px 30px;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .cta-btn {
                width: 100%;
                max-width: 300px;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 28px;
            }

            .hero-stats {
                grid-template-columns: 1fr;
            }

            .stat-number {
                font-size: 36px;
            }

            .cta-section h2 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
   <?php include 'inc/header.php'; ?>

    <!-- Agency Hero -->
    <section class="agency-hero">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Модельное агентство</div>
                <h1 class="section-title">Профессиональное<br>представительство моделей</h1>
                <p class="section-description">
                    Мы представляем талантливых детских моделей для работы с ведущими российскими 
                    и международными брендами. Наши ученики участвуют в fashion-показах, рекламных 
                    кампаниях и съёмках для глянцевых изданий.
                </p>
            </div>

            <div class="hero-stats">
                <div class="stat-box">
                    <div class="stat-number">120+</div>
                    <div class="stat-text">Моделей в базе</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">50+</div>
                    <div class="stat-text">Брендов-партнёров</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">300+</div>
                    <div class="stat-text">Проектов в год</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">100%</div>
                    <div class="stat-text">Легальность</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Наши услуги</div>
                <h2 class="section-title">Что мы предлагаем</h2>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">👥</div>
                    <h3>Кастинг моделей</h3>
                    <p>Подбираем идеальные лица для вашего бренда или проекта. Учитываем возраст, внешность, опыт и характер ребёнка.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">📸</div>
                    <h3>Организация съёмок</h3>
                    <p>Полное сопровождение съёмочного процесса: от подготовки документов до присутствия на площадке с родителями.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">👗</div>
                    <h3>Fashion-показы</h3>
                    <p>Участие наших моделей в показах российских и международных дизайнеров на неделях моды.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">🎬</div>
                    <h3>Рекламные кампании</h3>
                    <p>Съёмки для рекламы детских товаров, одежды, образовательных проектов и семейных брендов.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">📰</div>
                    <h3>Публикации в СМИ</h3>
                    <p>Участие в съёмках для глянцевых журналов, онлайн-изданий и специализированных детских медиа.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">⚖️</div>
                    <h3>Юридическое сопровождение</h3>
                    <p>Полное оформление документов, соблюдение трудового законодательства и защита интересов ребёнка.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Как мы работаем</div>
                <h2 class="section-title">Процесс сотрудничества</h2>
                <p class="section-description">
                    Простой и прозрачный процесс от первого контакта до успешной съёмки
                </p>
            </div>

            <div class="process-steps">
                <div class="step-card">
                    <div class="step-number">01</div>
                    <h3>Заявка</h3>
                    <p>Вы оставляете заявку с описанием проекта, требованиями к моделям и условиями съёмки</p>
                </div>

                <div class="step-card">
                    <div class="step-number">02</div>
                    <h3>Подбор</h3>
                    <p>Мы подбираем подходящих моделей из нашей базы и отправляем вам портфолио для выбора</p>
                </div>

                <div class="step-card">
                    <div class="step-number">03</div>
                    <h3>Согласование</h3>
                    <p>Обсуждаем детали проекта, оформляем необходимые документы и договариваемся об условиях</p>
                </div>

                <div class="step-card">
                    <div class="step-number">04</div>
                    <h3>Съёмка</h3>
                    <p>Сопровождаем процесс съёмки, обеспечиваем комфорт ребёнка и выполнение всех договорённостей</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Преимущества</div>
                <h2 class="section-title">Почему выбирают нас</h2>
            </div>

            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <div class="benefit-content">
                        <h3>Профессиональная подготовка</h3>
                        <p>Все наши модели прошли обучение в модельной школе и имеют опыт работы на камеру</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <div class="benefit-content">
                        <h3>Полное документальное сопровождение</h3>
                        <p>Оформляем все необходимые договоры, разрешения и соблюдаем трудовое законодательство</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <div class="benefit-content">
                        <h3>Индивидуальный подход</h3>
                        <p>Учитываем специфику вашего проекта и подбираем моделей точно под ваши требования</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <div class="benefit-content">
                        <h3>Опыт работы с крупными брендами</h3>
                        <p>Сотрудничаем с ведущими российскими и международными компаниями более 7 лет</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <div class="benefit-content">
                        <h3>Комфортная атмосфера</h3>
                        <p>Создаём безопасную и дружелюбную среду для работы детей на площадке</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <div class="benefit-content">
                        <h3>Широкая база моделей</h3>
                        <p>Более 120 детей разного возраста, типажа и опыта в нашей модельной базе</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Готовы начать сотрудничество?</h2>
            <p>Свяжитесь с нами для обсуждения вашего проекта</p>
            <div class="cta-buttons">
                <a href="#contact-form" class="cta-btn cta-btn-primary">Оставить заявку</a>
                <a href="#portfolio" class="cta-btn cta-btn-secondary">Посмотреть портфолио</a>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section" id="contact-form">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Связаться с нами</div>
                <h2 class="section-title">Заявка для брендов</h2>
                <p class="section-description">
                    Заполните форму, и мы свяжемся с вами в ближайшее время
                </p>
            </div>

            <div class="form-wrapper">
                <form>
                    <div class="form-group">
                        <label>Название компании *</label>
                        <input type="text" required placeholder="Введите название вашей компании">
                    </div>

                    <div class="form-group">
                        <label>Контактное лицо *</label>
                        <input type="text" required placeholder="Ваше имя">
                    </div>

                    <div class="form-group">
                        <label>Телефон *</label>
                        <input type="tel" required placeholder="+7 (___) ___-__-__">
                    </div>

                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" required placeholder="your@email.com">
                    </div>

                    <div class="form-group">
                        <label>Тип проекта</label>
                        <select>
                            <option>Выберите тип проекта</option>
                            <option>Рекламная съёмка</option>
                            <option>Fashion-показ</option>
                            <option>Фотосессия для каталога</option>
                            <option>Съёмка для СМИ</option>
                            <option>Видеосъёмка</option>
                            <option>Другое</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Описание проекта *</label>
                        <textarea required placeholder="Расскажите о вашем проекте: цели, требования к моделям, даты съёмки"></textarea>
                    </div>

                    <button type="submit" class="submit-btn">Отправить заявку</button>
                </form>
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
                    <a href="#contact">Контакты</a>
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

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    nav.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>