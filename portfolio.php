<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Портфолио - MAISON DE MODÈLES</title>
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

        /* Portfolio Hero */
        .portfolio-hero {
            padding: 180px 0 120px;
            background: linear-gradient(135deg, #faf8f5 0%, #f5f1eb 100%);
        }

        /* Filter Section */
        .filter-section {
            padding: 60px 0;
            background: #fff;
            border-bottom: 1px solid #e0e0e0;
        }

        .filter-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 12px 30px;
            background: transparent;
            border: 1px solid #e0e0e0;
            color: #2c2c2c;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 400;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #2c2c2c;
            color: #fff;
            border-color: #2c2c2c;
        }

        /* Models Grid */
        .models-section {
            padding: 100px 0;
            background: #faf8f5;
        }

        .models-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
        }

        .model-card {
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
        }

        .model-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .model-image {
            width: 100%;
            padding-bottom: 140%;
            background: linear-gradient(135deg, #f5f1eb 0%, #e8dfd3 100%);
            position: relative;
            overflow: hidden;
        }

        .model-placeholder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #c9a57b;
            opacity: 0.3;
        }

        .model-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .model-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);
            padding: 30px 20px 20px;
            transform: translateY(100%);
            transition: transform 0.4s ease;
        }

        .model-card:hover .model-overlay {
            transform: translateY(0);
        }

        .model-tags {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .model-tag {
            padding: 4px 12px;
            background: rgba(201, 165, 123, 0.3);
            color: #fff;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 2px;
        }

        .model-info {
            padding: 25px 20px;
        }

        .model-info h3 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 8px;
            color: #2c2c2c;
        }

        .model-meta {
            display: flex;
            gap: 20px;
            font-size: 14px;
            color: #5a5a5a;
        }

        .model-age,
        .model-height {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Success Stories Section */
        .stories-section {
            padding: 120px 0;
            background: #fff;
        }

        .stories-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 60px;
            margin-top: 60px;
        }

        .story-card {
            display: flex;
            gap: 40px;
            padding: 40px;
            background: #faf8f5;
            border-radius: 4px;
            transition: all 0.4s ease;
        }

        .story-card:hover {
            transform: translateX(10px);
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.08);
        }

        .story-image {
            flex-shrink: 0;
            width: 200px;
            height: 250px;
            background: linear-gradient(135deg, #f5f1eb 0%, #e8dfd3 100%);
            border-radius: 4px;
            overflow: hidden;
            position: relative;
        }

        .story-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .story-content h3 {
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 15px;
            color: #2c2c2c;
        }

        .story-role {
            font-size: 14px;
            color: #c9a57b;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 20px;
        }

        .story-description {
            font-size: 15px;
            line-height: 1.8;
            color: #5a5a5a;
            margin-bottom: 20px;
        }

        .story-achievements {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .achievement {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #2c2c2c;
        }

        .achievement::before {
            content: '✓';
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            background: #c9a57b;
            color: #fff;
            border-radius: 50%;
            font-size: 12px;
            flex-shrink: 0;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 120px 0;
            background: #2c2c2c;
            color: #fff;
        }

        .gallery-section .section-label {
            color: #c9a57b;
        }

        .gallery-section .section-title {
            color: #fff;
        }

        .gallery-section .section-description {
            color: #d0d0d0;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 60px;
        }

        .gallery-item {
            position: relative;
            padding-bottom: 100%;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 4px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-item:nth-child(1) {
            grid-column: span 2;
            grid-row: span 2;
            padding-bottom: 50%;
        }

        .gallery-item:nth-child(5) {
            grid-column: span 2;
            padding-bottom: 50%;
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

        /* Stats Section */
        .stats-section {
            padding: 100px 0;
            background: #fff;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 60px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 56px;
            font-weight: 300;
            color: #c9a57b;
            margin-bottom: 15px;
            line-height: 1;
        }

        .stat-label {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #5a5a5a;
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
            .models-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .gallery-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stories-grid {
                grid-template-columns: 1fr;
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

            .models-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 25px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .gallery-item:nth-child(1) {
                grid-column: span 2;
                padding-bottom: 100%;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }

            .story-card {
                flex-direction: column;
                gap: 25px;
            }

            .story-image {
                width: 100%;
                height: 300px;
            }

            .filter-container {
                gap: 15px;
            }

            .filter-btn {
                padding: 10px 20px;
                font-size: 11px;
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

            .models-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .gallery-item:nth-child(1),
            .gallery-item:nth-child(5) {
                grid-column: span 1;
                padding-bottom: 100%;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-number {
                font-size: 42px;
            }

            .cta-section h2 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
    <?php include 'inc/header.php'; ?>

    <!-- Portfolio Hero -->
    <section class="portfolio-hero">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Наши модели</div>
                <h1 class="section-title">Портфолио талантов</h1>
                <p class="section-description">
                    Познакомьтесь с нашими моделями — талантливыми детьми, которые уже работают 
                    с ведущими брендами и участвуют в крупнейших модных показах
                </p>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="container">
            <div class="filter-container">
                <button class="filter-btn active" data-filter="all">Все модели</button>
                <button class="filter-btn" data-filter="4-6">4-6 лет</button>
                <button class="filter-btn" data-filter="7-10">7-10 лет</button>
                <button class="filter-btn" data-filter="11-13">11-13 лет</button>
                <button class="filter-btn" data-filter="14-16">14-16 лет</button>
                <button class="filter-btn" data-filter="boys">Мальчики</button>
                <button class="filter-btn" data-filter="girls">Девочки</button>
            </div>
        </div>
    </section>

    <!-- Models Grid Section -->
    <section class="models-section">
        <div class="container">
            <div class="models-grid">
                <!-- Model Card 1 -->
                <div class="model-card" data-age="8" data-gender="girl">
                    <div class="model-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="model-overlay">
                            <div class="model-tags">
                                <span class="model-tag">Fashion</span>
                                <span class="model-tag">Реклама</span>
                            </div>
                        </div>
                    </div>
                    <div class="model-info">
                        <h3>Анна С.</h3>
                        <div class="model-meta">
                            <div class="model-age">8 лет</div>
                            <div class="model-height">125 см</div>
                        </div>
                    </div>
                </div>

                <!-- Model Card 2 -->
                <div class="model-card" data-age="10" data-gender="boy">
                    <div class="model-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="model-overlay">
                            <div class="model-tags">
                                <span class="model-tag">Fashion Week</span>
                                <span class="model-tag">Каталоги</span>
                            </div>
                        </div>
                    </div>
                    <div class="model-info">
                        <h3>Михаил К.</h3>
                        <div class="model-meta">
                            <div class="model-age">10 лет</div>
                            <div class="model-height">140 см</div>
                        </div>
                    </div>
                </div>

                <!-- Model Card 3 -->
                <div class="model-card" data-age="7" data-gender="boy">
                    <div class="model-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="model-overlay">
                            <div class="model-tags">
                                <span class="model-tag">Реклама</span>
                            </div>
                        </div>
                    </div>
                    <div class="model-info">
                        <h3>Александр П.</h3>
                        <div class="model-meta">
                            <div class="model-age">7 лет</div>
                            <div class="model-height">120 см</div>
                        </div>
                    </div>
                </div>

                <!-- Model Card 4 -->
                <div class="model-card" data-age="13" data-gender="girl">
                    <div class="model-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="model-overlay">
                            <div class="model-tags">
                                <span class="model-tag">Vogue</span>
                                <span class="model-tag">Fashion</span>
                            </div>
                        </div>
                    </div>
                    <div class="model-info">
                        <h3>Мария Л.</h3>
                        <div class="model-meta">
                            <div class="model-age">13 лет</div>
                            <div class="model-height">165 см</div>
                        </div>
                    </div>
                </div>

                <!-- Model Card 5 -->
                <div class="model-card" data-age="6" data-gender="girl">
                    <div class="model-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="model-overlay">
                            <div class="model-tags">
                                <span class="model-tag">Gloria Jeans</span>
                            </div>
                        </div>
                    </div>
                    <div class="model-info">
                        <h3>София В.</h3>
                        <div class="model-meta">
                            <div class="model-age">6 лет</div>
                            <div class="model-height">115 см</div>
                        </div>
                    </div>
                </div>

                <!-- Model Card 6 -->
                <div class="model-card" data-age="12" data-gender="boy">
                    <div class="model-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="model-overlay">
                            <div class="model-tags">
                                <span class="model-tag">ЦУМ</span>
                                <span class="model-tag">Fashion Week</span>
                            </div>
                        </div>
                    </div>
                    <div class="model-info">
                        <h3>Даниил Р.</h3>
                        <div class="model-meta">
                            <div class="model-age">12 лет</div>
                            <div class="model-height">155 см</div>
                        </div>
                    </div>
                </div>

                <!-- Model Card 7 -->
                <div class="model-card" data-age="9" data-gender="girl">
                    <div class="model-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="model-overlay">
                            <div class="model-tags">
                                <span class="model-tag">Реклама</span>
                                <span class="model-tag">Каталоги</span>
                            </div>
                        </div>
                    </div>
                    <div class="model-info">
                        <h3>Елизавета Т.</h3>
                        <div class="model-meta">
                            <div class="model-age">9 лет</div>
                            <div class="model-height">135 см</div>
                        </div>
                    </div>
                </div>

                <!-- Model Card 8 -->
                <div class="model-card" data-age="11" data-gender="boy">
                    <div class="model-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="model-overlay">
                            <div class="model-tags">
                                <span class="model-tag">Fashion</span>
                            </div>
                        </div>
                    </div>
                    <div class="model-info">
                        <h3>Артём Н.</h3>
                        <div class="model-meta">
                            <div class="model-age">11 лет</div>
                            <div class="model-height">150 см</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Stories Section -->
    <section class="stories-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Истории успеха</div>
                <h2 class="section-title">Наши звёзды</h2>
                <p class="section-description">
                    Познакомьтесь с учениками, которые достигли выдающихся результатов в модельной карьере
                </p>
            </div>

            <div class="stories-grid">
                <!-- Story 1 -->
                <div class="story-card">
                    <div class="story-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="story-content">
                        <h3>Алина Морозова</h3>
                        <div class="story-role">Модель международного уровня</div>
                        <p class="story-description">
                            Начала обучение в 8 лет. Через год участвовала в своём первом показе на 
                            Mercedes-Benz Fashion Week. Сейчас работает с ведущими fashion-брендами.
                        </p>
                        <div class="story-achievements">
                            <div class="achievement">Публикация в Vogue Italia</div>
                            <div class="achievement">15+ модных показов</div>
                            <div class="achievement">Лицо кампании Gloria Jeans</div>
                        </div>
                    </div>
                </div>

                <!-- Story 2 -->
                <div class="story-card">
                    <div class="story-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="story-content">
                        <h3>Максим Соколов</h3>
                        <div class="story-role">Детская модель</div>
                        <p class="story-description">
                            Один из самых востребованных детских моделей в России. Снимается для 
                            крупнейших брендов детской одежды и участвует в рекламных кампаниях.
                        </p>
                        <div class="story-achievements">
                            <div class="achievement">50+ рекламных съёмок</div>
                            <div class="achievement">Работа с ЦУМ и Lamoda</div>
                            <div class="achievement">Участие в ТВ-рекламе</div>
                        </div>
                    </div>
                </div>

                <!-- Story 3 -->
                <div class="story-card">
                    <div class="story-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="story-content">
                        <h3>Варвара Иванова</h3>
                        <div class="story-role">Модель и актриса</div>
                        <p class="story-description">
                            Сочетает модельную карьеру с актёрским мастерством. Снималась в нескольких 
                            детских фильмах и продолжает активно работать в модельной индустрии.
                        </p>
                        <div class="story-achievements">
                            <div class="achievement">Публикации в 5+ журналах</div>
                            <div class="achievement">Роли в детском кино</div>
                            <div class="achievement">Московская Неделя Моды</div>
                        </div>
                    </div>
                </div>

                <!-- Story 4 -->
                <div class="story-card">
                    <div class="story-image">
                        <div class="model-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="story-content">
                        <h3>Егор Петров</h3>
                        <div class="story-role">Детская модель</div>
                        <p class="story-description">
                            Начал карьеру в 6 лет. Благодаря профессиональной подготовке быстро 
                            стал одним из самых узнаваемых детских лиц в рекламе.
                        </p>
                        <div class="story-achievements">
                            <div class="achievement">Реклама федеральных каналов</div>
                            <div class="achievement">Работа с Wildberries, OZON</div>
                            <div class="achievement">30+ проектов за год</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Галерея работ</div>
                <h2 class="section-title">Наши съёмки</h2>
                <p class="section-description">
                    Лучшие моменты с показов, съёмок и мероприятий наших моделей
                </p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?w=800&h=800&fit=crop" alt="Fashion съёмка">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=400&h=400&fit=crop" alt="Детская модель">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1503342394128-c104d54dba01?w=400&h=400&fit=crop" alt="Fashion показ">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=400&fit=crop" alt="Backstage">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1509631179647-0177331693ae?w=800&h=400&fit=crop" alt="Fashion Week">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=400&h=400&fit=crop" alt="Фотосессия">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=400&h=400&fit=crop" alt="Модная съёмка">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">120+</div>
                    <div class="stat-label">Моделей в базе</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">300+</div>
                    <div class="stat-label">Проектов в год</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Брендов-партнёров</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Довольных клиентов</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Станьте частью нашей семьи</h2>
            <p>Начните модельную карьеру вашего ребёнка с профессионалами</p>
            <div class="cta-buttons">
                <a href="school.php" class="cta-btn cta-btn-primary">Записаться в школу</a>
                <a href="agency.php" class="cta-btn cta-btn-secondary">Узнать об агентстве</a>
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

        // Filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const modelCards = document.querySelectorAll('.model-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');

                modelCards.forEach(card => {
                    const age = parseInt(card.getAttribute('data-age'));
                    const gender = card.getAttribute('data-gender');

                    let show = false;

                    if (filter === 'all') {
                        show = true;
                    } else if (filter === '4-6') {
                        show = age >= 4 && age <= 6;
                    } else if (filter === '7-10') {
                        show = age >= 7 && age <= 10;
                    } else if (filter === '11-13') {
                        show = age >= 11 && age <= 13;
                    } else if (filter === '14-16') {
                        show = age >= 14 && age <= 16;
                    } else if (filter === 'boys') {
                        show = gender === 'boy';
                    } else if (filter === 'girls') {
                        show = gender === 'girl';
                    }

                    if (show) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 10);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
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