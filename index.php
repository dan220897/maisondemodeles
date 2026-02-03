<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAISON DE MODÈLES - Детское модельное агентство</title>
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

       

        /* Header Styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 20px 40px;
            transition: all 0.4s ease;
            background: transparent;
        }

        .header.scrolled {
            
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            padding: 15px 40px;
        }

        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        

        .nav {
            display: flex;
            gap: 35px;
            align-items: center;
        }

        

        .nav a:hover {
            color: #c9a57b;
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 10px;
        }

        .menu-toggle span {
            width: 25px;
            height: 2px;
            background: #2c2c2c;
            transition: all 0.3s ease;
        }

                /* Hero Section */
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #faf8f5;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                url('13.png') center center / cover no-repeat;
            z-index: 1;
        }

      

        .hero-content {
            position: relative;
            z-index: 3;
            text-align: center;
            max-width: 1100px;
            padding: 0 40px;
            animation: fadeInUp 1.2s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-subtitle {
            font-size: 12px;
            letter-spacing: 4px;
            text-transform: uppercase;
            
            margin-bottom: 30px;
            font-weight: 500;
            animation: fadeInUp 1.2s ease 0.2s backwards;
        }

        .hero-title {
            font-size: 90px;
            font-weight: 300;
            line-height: 1.1;
            margin-bottom: 35px;
            letter-spacing: -2px;
            color: #ffffff;
            animation: fadeInUp 1.2s ease 0.4s backwards;
        }

        .hero-title strong {
            font-weight: 600;
            display: block;
            color: #c9a57b;
        }

        .hero-description {
            font-size: 17px;
            line-height: 1.9;
            
            margin-bottom: 50px;
            max-width: 680px;
            margin-left: auto;
            margin-right: auto;
            font-weight: 400;
            animation: fadeInUp 1.2s ease 0.6s backwards;
        }

        .hero-buttons {
            display: flex;
            gap: 25px;
            justify-content: center;
            animation: fadeInUp 1.2s ease 0.8s backwards;
        }

        .hero-button {
            padding: 18px 45px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
            cursor: pointer;
            transition: all 0.4s ease;
            text-decoration: none;
            display: inline-block;
        }

        .hero-button.primary {
            background: #2c2c2c;
            color: #faf8f5;
        }

        .hero-button.primary:hover {
            background: #c9a57b;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(201, 165, 123, 0.3);
        }

        .hero-button.secondary {
            background: transparent;
            color: #2c2c2c;
            border: 2px solid #2c2c2c;
        }

        .hero-button.secondary:hover {
            background: #2c2c2c;
            color: #faf8f5;
            transform: translateY(-3px);
        }

        

        

        

        

        .scroll-indicator {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            40% {
                transform: translateX(-50%) translateY(-10px);
            }
            60% {
                transform: translateX(-50%) translateY(-5px);
            }
        }

        .scroll-indicator span {
            display: block;
            width: 24px;
            height: 40px;
            border: 2px solid #2c2c2c;
            border-radius: 20px;
            position: relative;
            opacity: 0.5;
        }

        .scroll-indicator span::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 50%;
            width: 4px;
            height: 4px;
            background: #2c2c2c;
            border-radius: 50%;
            transform: translateX(-50%);
            animation: scrollDown 2s infinite;
        }

        @keyframes scrollDown {
            0% {
                top: 8px;
                opacity: 1;
            }
            100% {
                top: 24px;
                opacity: 0;
            }
        }

        /* Decorative Elements */
        .hero-decoration {
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201, 165, 123, 0.1) 0%, transparent 70%);
            z-index: 1;
        }

        .hero-decoration.left {
            top: -200px;
            left: -200px;
        }

        .hero-decoration.right {
            bottom: -200px;
            right: -200px;
        }

        /* About School Section */
        .about-school {
            padding: 120px 0;
            background: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
        }

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
            line-height: 1.2;
            color: #2c2c2c;
            letter-spacing: -1px;
        }

        .school-content {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 80px;
            margin-bottom: 100px;
            align-items: start;
        }

        .school-image {
            position: sticky;
            top: 120px;
        }

        .image-placeholder {
            aspect-ratio: 3/4;
            background: 
                url('14.png') center center / cover no-repeat;
            border-radius: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #c9a57b;
            padding: 40px;
            text-align: center;
        }

        .image-placeholder svg {
            margin-bottom: 20px;
            opacity: 0.6;
        }

        .image-placeholder p {
            font-size: 14px;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .info-block {
            margin-bottom: 50px;
        }

        .info-block h3 {
            font-size: 28px;
            font-weight: 400;
            color: #2c2c2c;
            margin-bottom: 20px;
            letter-spacing: -0.5px;
        }

        .info-block p {
            font-size: 16px;
            line-height: 1.8;
            color: #5a5a5a;
        }

        .program-list {
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-bottom: 50px;
        }

        .program-item {
            display: grid;
            grid-template-columns: 60px 1fr;
            gap: 25px;
            padding: 30px;
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            transition: all 0.4s ease;
        }

        .program-item:hover {
            background: #fff;
            border-color: #e3d5ca;
            transform: translateX(5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .program-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 1px solid #e3d5ca;
            color: #c9a57b;
        }

        .program-content h4 {
            font-size: 20px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 10px;
            letter-spacing: -0.3px;
        }

        .program-content p {
            font-size: 15px;
            line-height: 1.7;
            color: #5a5a5a;
            margin-bottom: 12px;
        }

        .duration {
            display: inline-block;
            font-size: 12px;
            color: #c9a57b;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .school-cta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn-primary, .btn-secondary {
            padding: 16px 35px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-decoration: none;
            transition: all 0.4s ease;
            display: inline-block;
        }

        .btn-primary {
            background: #2c2c2c;
            color: #faf8f5;
            border: 2px solid #2c2c2c;
        }

        .btn-primary:hover {
            background: #c9a57b;
            border-color: #c9a57b;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(201, 165, 123, 0.25);
        }

        .btn-secondary {
            background: transparent;
            color: #2c2c2c;
            border: 2px solid #2c2c2c;
        }

        .btn-secondary:hover {
            background: #2c2c2c;
            color: #faf8f5;
            transform: translateY(-2px);
        }

        .school-features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .feature-card {
            padding: 40px 30px;
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            transition: all 0.4s ease;
        }

        .feature-card:hover {
            background: #fff;
            border-color: #e3d5ca;
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        .feature-number {
            font-size: 14px;
            color: #c9a57b;
            margin-bottom: 20px;
            font-weight: 500;
            letter-spacing: 2px;
        }

        .feature-card h4 {
            font-size: 22px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 15px;
            letter-spacing: -0.3px;
        }

        .feature-card p {
            font-size: 14px;
            line-height: 1.7;
            color: #5a5a5a;
        }

        /* Our Faces Section */
        .our-faces {
            padding: 120px 0;
            background: #faf8f5;
        }

        .faces-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .face-card {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
            display: block;
            background: #fff;
            border: 1px solid #f0ebe5;
            transition: all 0.4s ease;
        }

        .face-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            border-color: #e3d5ca;
        }

        .face-image {
            aspect-ratio: 3/4;
            overflow: hidden;
            position: relative;
        }

        .face-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f5ebe0 0%, #e3d5ca 100%);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #c9a57b;
            transition: all 0.4s ease;
        }

        /* Скрыть SVG иконку когда есть фоновое изображение */
        .face-placeholder[style*="background-image"] svg {
            display: none;
        }

        .face-card:hover .face-placeholder {
            transform: scale(1.05);
        }

        .face-info {
            padding: 20px;
            background: #fff;
            text-align: center;
        }

        .face-info h4 {
            font-size: 18px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 5px;
            letter-spacing: -0.3px;
        }

        .face-info p {
            font-size: 13px;
            color: #8a8a8a;
            letter-spacing: 0.5px;
        }

        /* More Card */
        .face-card-more {
            background: #2c2c2c;
            border-color: #2c2c2c;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100%;
        }

        .face-card-more:hover {
            background: #c9a57b;
            border-color: #c9a57b;
        }

        .face-more-content {
            text-align: center;
            padding: 40px 20px;
            color: #fff;
        }

        .face-more-content svg {
            margin-bottom: 20px;
            transition: all 0.4s ease;
        }

        .face-card-more:hover .face-more-content svg {
            transform: rotate(90deg);
        }

        .face-more-content h4 {
            font-size: 24px;
            font-weight: 500;
            color: #fff;
            margin-bottom: 15px;
            line-height: 1.3;
            letter-spacing: -0.5px;
        }

        .models-count {
            display: block;
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            opacity: 0.7;
        }

        /* Animation on scroll */
        .face-card {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .face-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .faces-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 25px;
            }
        }

        @media (max-width: 768px) {
            .our-faces {
                padding: 80px 0;
            }

            .faces-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .face-info {
                padding: 15px;
            }

            .face-info h4 {
                font-size: 16px;
            }
            .hero-background {
                background: url(13.png) 89% center / cover no-repeat;
            }
        }

        @media (max-width: 480px) {
            .faces-grid {
                grid-template-columns: 1fr;
            }

            .face-more-content h4 {
                font-size: 20px;
            }
        }

        /* Partners Section */
        .partners {
            padding: 120px 0;
            background: #fff;
        }

        .section-description {
            max-width: 600px;
            margin: 20px auto 0;
            font-size: 16px;
            line-height: 1.7;
            color: #5a5a5a;
            text-align: center;
        }

        .partners-categories {
            margin-top: 80px;
        }

        .category-block {
            margin-bottom: 70px;
        }

        .category-block:last-child {
            margin-bottom: 0;
        }

        .category-title {
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #c9a57b;
            margin-bottom: 30px;
            text-align: center;
        }

        .partners-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 25px;
        }

        .partners-grid-2 {
            grid-template-columns: repeat(2, 1fr);
            max-width: 600px;
            margin: 0 auto;
        }

        .partner-card {
            aspect-ratio: 1;
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            transition: all 0.4s ease;
            cursor: default;
            position: relative;
        }

        .partner-card::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            height: 60%;
            background-image: radial-gradient(circle, #e3d5ca 1px, transparent 1px);
            background-size: 8px 8px;
            opacity: 0.15;
            pointer-events: none;
        }

        .partner-card:hover {
            background: #fff;
            border-color: #c9a57b;
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        .partner-logo {
            font-size: 16px;
            font-weight: 600;
            color: #2c2c2c;
            text-align: center;
            letter-spacing: 0.5px;
            line-height: 1.3;
            position: relative;
            z-index: 1;
            text-transform: uppercase;
        }

        .partner-card:hover .partner-logo {
            color: #c9a57b;
        }

        .partners-cta {
            margin-top: 80px;
            text-align: center;
            padding: 60px 40px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e3d5ca 100%);
            border-radius: 0;
        }

        .partners-cta p {
            font-size: 24px;
            font-weight: 400;
            color: #2c2c2c;
            margin-bottom: 30px;
            letter-spacing: -0.3px;
        }

        /* Animation for partners */
        .partner-card {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }

        .partner-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Partners */
        @media (max-width: 1024px) {
            .partners-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 20px;
            }

            .partners-grid-2 {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .partners {
                padding: 80px 0;
            }

            .partners-categories {
                margin-top: 60px;
            }

            .category-block {
                margin-bottom: 50px;
            }

            .partners-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 15px;
            }

            .partners-grid-2 {
                grid-template-columns: repeat(2, 1fr);
            }

            .partner-logo {
                font-size: 12px;
            }

            .partners-cta {
                padding: 40px 25px;
            }

            .partners-cta p {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .partners-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .partners-grid-2 {
                grid-template-columns: 1fr;
                max-width: 300px;
            }

            .partner-card {
                padding: 20px;
            }

            .partner-logo {
                font-size: 11px;
            }

            .category-title {
                font-size: 12px;
            }

            .partners-cta p {
                font-size: 18px;
            }
        }

        /* Video Gallery Section */
        .video-gallery {
            padding: 120px 0;
            background: #faf8f5;
        }

        .videos-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 60px;
        }

        .video-card {
            background: #fff;
            border: 1px solid #f0ebe5;
            overflow: hidden;
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .video-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            border-color: #c9a57b;
        }

        .video-card-large {
            grid-column: span 2;
            grid-row: span 2;
        }

        .video-thumbnail {
            position: relative;
            aspect-ratio: 16/9;
            overflow: hidden;
        }

        .video-card-large .video-thumbnail {
            aspect-ratio: 16/10;
        }

        .video-preview-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .video-card:hover .video-preview-img {
            transform: scale(1.05);
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(44, 44, 44, 0);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s ease;
            opacity: 0;
        }

        .video-card:hover .video-overlay {
            background: rgba(44, 44, 44, 0.6);
            opacity: 1;
        }

        .play-button {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.95);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #2c2c2c;
        }

        .video-card:not(.video-card-large) .play-button {
            width: 50px;
            height: 50px;
        }

        .play-button:hover {
            transform: scale(1.1);
            background: #c9a57b;
            color: #fff;
        }

        .video-info {
            padding: 25px;
            position: relative;
        }

        .video-card-large .video-info {
            padding: 30px;
        }

        .video-info h4 {
            font-size: 18px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .video-card-large .video-info h4 {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .video-info p {
            font-size: 14px;
            color: #8a8a8a;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .video-card-large .video-info p {
            font-size: 16px;
        }

        .video-duration {
            display: inline-block;
            font-size: 12px;
            color: #c9a57b;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .gallery-cta {
            text-align: center;
        }

        /* Video animation */
        .video-card {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .video-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Video Gallery */
        @media (max-width: 1024px) {
            .videos-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 25px;
            }

            .video-card-large {
                grid-column: span 2;
                grid-row: span 1;
            }
        }

        @media (max-width: 768px) {
            .video-gallery {
                padding: 80px 0;
            }

            .videos-grid {
                gap: 20px;
                margin-bottom: 40px;
            }

            .video-card-large .video-info h4 {
                font-size: 20px;
            }

            .video-card-large .video-info p {
                font-size: 15px;
            }
        }

        @media (max-width: 580px) {
            .videos-grid {
                grid-template-columns: 1fr;
            }

            .video-card-large {
                grid-column: span 1;
            }

            .video-info {
                padding: 20px;
            }

            .video-card-large .video-info {
                padding: 25px;
            }
        }

        /* Contact Section */
        .contact-section {
            padding: 120px 0;
            background: #fff;
        }

        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 80px;
            align-items: start;
        }

        .contact-info {
            position: sticky;
            top: 120px;
        }

        .contact-description {
            font-size: 16px;
            line-height: 1.8;
            color: #5a5a5a;
            margin-bottom: 50px;
        }

        .contact-details {
            margin-bottom: 50px;
        }

        .contact-item {
            display: flex;
            gap: 20px;
            margin-bottom: 35px;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #c9a57b;
            flex-shrink: 0;
        }

        .contact-text h4 {
            font-size: 14px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .contact-text p {
            font-size: 15px;
            line-height: 1.6;
            color: #5a5a5a;
        }

        .contact-text a {
            color: #5a5a5a;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-text a:hover {
            color: #c9a57b;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c2c2c;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-link:hover {
            background: #2c2c2c;
            border-color: #2c2c2c;
            color: #fff;
            transform: translateY(-3px);
        }

        /* Contact Form */
        .contact-form-wrapper {
            background: #faf8f5;
            padding: 50px;
            border: 1px solid #f0ebe5;
        }

        .contact-form {
            position: relative;
        }

        .form-success {
            display: none;
            text-align: center;
            padding: 60px 40px;
            background: #fff;
            border: 2px solid #4CAF50;
        }

        .form-success.show {
            display: block;
        }

        .form-success svg {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .form-success h3 {
            font-size: 24px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 10px;
        }

        .form-success p {
            font-size: 16px;
            color: #5a5a5a;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-row .form-group {
            margin-bottom: 0;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 14px 18px;
            background: #fff;
            border: 1px solid #e3d5ca;
            font-size: 15px;
            color: #2c2c2c;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #c9a57b;
            box-shadow: 0 0 0 3px rgba(201, 165, 123, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .checkbox-label {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            cursor: pointer;
            font-size: 14px;
            line-height: 1.6;
            color: #5a5a5a;
        }

        .checkbox-label input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin: 0;
            cursor: pointer;
            flex-shrink: 0;
        }

        .form-link {
            color: #c9a57b;
            text-decoration: none;
            border-bottom: 1px solid transparent;
            transition: border-color 0.3s ease;
        }

        .form-link:hover {
            border-bottom-color: #c9a57b;
        }

        .btn-submit {
            width: 100%;
            padding: 18px;
            margin-top: 10px;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Responsive Contact */
        @media (max-width: 968px) {
            .contact-section {
                padding: 80px 0;
            }

            .contact-wrapper {
                grid-template-columns: 1fr;
                gap: 60px;
            }

            .contact-info {
                position: relative;
                top: 0;
            }

            .contact-form-wrapper {
                padding: 40px 30px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }

        @media (max-width: 480px) {
            .contact-form-wrapper {
                padding: 30px 20px;
            }

            .contact-item {
                gap: 15px;
            }

            .contact-icon {
                width: 45px;
                height: 45px;
            }

            .social-links {
                gap: 12px;
            }

            .social-link {
                width: 40px;
                height: 40px;
            }
        }

        /* Responsive */
        @media (max-width: 968px) {
            .about-school {
                padding: 80px 0;
            }

            .section-title {
                font-size: 42px;
            }

            .school-content {
                grid-template-columns: 1fr;
                gap: 50px;
                margin-bottom: 60px;
            }

            .school-image {
                position: relative;
                top: 0;
            }

            .school-features {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 25px;
            }

            .section-header {
                margin-bottom: 50px;
            }

            .section-title {
                font-size: 36px;
            }

            .program-item {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .program-icon {
                width: 50px;
                height: 50px;
            }

            .school-cta {
                flex-direction: column;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 32px;
            }

            .info-block h3 {
                font-size: 24px;
            }

            .feature-card {
                padding: 30px 20px;
            }
        }

        /* Responsive */
        @media (max-width: 968px) {
            

            
        }

        @media (max-width: 768px) {
            .header {
                padding: 20px 25px;
            }

            .nav {
                position: fixed;
                top: 0;
                right: -100%;
                width: 100%;
                height: 100vh;
                background: rgba(250, 248, 245, 0.98);
                backdrop-filter: blur(20px);
                flex-direction: column;
                justify-content: center;
                gap: 40px;
                transition: right 0.4s ease;
            }

            .nav.active {
                right: 0;
            }

            .nav a {
                font-size: 20px;
            }

            .menu-toggle {
                display: flex;
            }

            .hero-title {
                font-size: 52px;
            }

            .hero-description {
                font-size: 16px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .hero-button {
                width: 100%;
                max-width: 320px;
            }

            

            

            
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 16px;
            }

            .hero-title {
                font-size: 40px;
            }

            .hero-subtitle {
                font-size: 10px;
            }

            
        }

        /* Mobile Menu Styles */
        @media (max-width: 968px) {
            .nav {
                position: fixed;
                top: 0;
                right: -100%;
                width: 70%;
                max-width: 300px;
                height: 100vh;
                background: #faf8f5;
                flex-direction: column;
                padding: 80px 30px 30px;
                gap: 25px;
                box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
                transition: right 0.4s ease;
            }

            .nav.active {
                right: 0;
            }

            .nav a {
                font-size: 14px;
            }

            .menu-toggle {
                display: flex;
            }

            .menu-toggle.active span:nth-child(1) {
                transform: rotate(45deg) translate(6px, 6px);
            }

            .menu-toggle.active span:nth-child(2) {
                opacity: 0;
            }

            .menu-toggle.active span:nth-child(3) {
                transform: rotate(-45deg) translate(6px, -6px);
            }
        }
    </style>
    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m,e,t,r,i,k,a){
        m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
    })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=105218380', 'ym');

    ym(105218380, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", accurateTrackBounce:true, trackLinks:true});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/105218380" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
    <?php include 'inc/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background"></div>
        <div class="hero-pattern"></div>
        <div class="hero-decoration left"></div>
        <div class="hero-decoration right"></div>
        
        <div class="hero-content">
            <div class="hero-subtitle">ДЕТСКОЕ МОДЕЛЬНОЕ АГЕНТСТВО И ШКОЛА</div>
            <h1 class="hero-title">
                <img src="logo.png" alt="MAISON DE MODÈLES" style="max-width: 600px; width: 100%;" />
            </h1>
            <p class="hero-description">
                РАЗВИВАЕМСЯ, КАК СЕГМЕНТ МОДЕЛЬНОЙ ИНДУСТРИИ, КОТОРЫЙ ВКЛЮЧАЕТ В СЕБЯ РАЗЛИЧНЫЕ АСПЕКТЫ, ТАКИЕ КАК ФОТОСЕССИИ, РЕКЛАМНЫЕ КАМПАНИИ, ПОКАЗЫ МОД И СЪЕМКИ ДЛЯ КИНО ИЛИ ТЕЛЕВИДЕНИЯ, ГДЕ УЧАСТВУЮТ ДЕТИ.
            </p>
            <div class="hero-buttons">
                <a href="#contact" class="hero-button primary">Записаться в школу</a>
                <!--<a href="#agency" class="hero-button secondary">Узнать больше</a>-->
            </div>
        </div>

        
        

        <div class="scroll-indicator">
            <span></span>
        </div>
    </section>

    <!-- About School Section -->
    <section class="about-school" id="school">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Модельная школа</div>
                <h2 class="section-title">Профессиональное<br>обучение для детей</h2>
            </div>

            <div class="school-content">
                <div class="school-image">
                    <div class="image-placeholder">
                        
                    </div>
                </div>

                <div class="school-info">
                    <div class="info-block">
                        <h3>О программе</h3>
                        <p>Наша модельная школа предлагает комплексную программу обучения для детей от 4 до 16 лет. Мы развиваем не только модельные навыки, но и уверенность в себе, артистизм и профессионализм.</p>
                    </div>

                    <div class="program-list">
                        <div class="program-item">
                            <div class="program-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                    <path d="M2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                </svg>
                            </div>
                            <div class="program-content">
                                <h4>Основы дефиле</h4>
                                <p>Постановка походки, позиции и повороты на подиуме, работа под разные стили музыки</p>
                                <span class="duration">1.5 часа</span>
                            </div>
                        </div>

                        <div class="program-item">
                            <div class="program-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                            </div>
                            <div class="program-content">
                                <h4>Фотопозирование</h4>
                                <p>Работа с камерой, постановка лица и тела, создание портфолио, практика в студии</p>
                                <span class="duration">1.5 часа</span>
                            </div>
                        </div>

                        <div class="program-item">
                            <div class="program-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                            </div>
                            <div class="program-content">
                                <h4>Актёрское мастерство</h4>
                                <p>Раскрепощение, работа с аудиторией, развитие харизмы и уверенности</p>
                                <span class="duration">1.5 часа</span>
                            </div>
                        </div>

                        <div class="program-item">
                            <div class="program-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <div class="program-content">
                                <h4>Выпускной показ</h4>
                                <p>Подготовка и финальный показ для родителей с профессиональными образами</p>
                                <span class="duration">2 часа</span>
                            </div>
                        </div>
                    </div>

                    <div class="school-cta">
                        <a href="#contact" class="btn-primary">Записаться на курс</a>
                        <!--<a href="#programs" class="btn-secondary">Подробная программа</a>-->
                    </div>
                </div>
            </div>

            <div class="school-features">
                <div class="feature-card">
                    <div class="feature-number">01</div>
                    <h4>Зачем вашему ребёнку модельная школа?</h4>
                    <p>Это не просто уроки дефиле. Мы развиваем уверенность в себе, артистизм и умение держаться перед камерой - навыки, которые пригодятся в любой сфере жизни. Наш интенсив поможет вашему ребёнку почувствовать себя звездой.
</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">02</div>
                    <h4>Преподаватели, работавшие с известными брендами:</h4>
                    <p>Наши эксперты имеют опыт работы с Mercedes Benz Fashion Week, Московской Неделей Моды, ЦУМ, Dyson, Gloria Jeans и многими другими. Они поделятся своим
профессионализмом и помогут раскрыть потенциал каждого ребёнка.
</p>
                </div>
                <div class="feature-card">
                    <div class="feature-number">03</div>
                    <h4>Не упустите возможность: места ограничены!</h4>
                    <p>Стоимость интенсива — 10 000 рублей. Мы сознательно ограничиваем количество мест, чтобы обеспечить индивидуальный подход и максимальное внимание каждому участнику. Забронируйте место для вашего ребёнка сейчас!
</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Faces Section -->
    <section class="our-faces" id="portfolio">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Портфолио</div>
                <h2 class="section-title">Наши лица</h2>
            </div>

            <div class="faces-grid">
                <div class="face-card">
                    <div class="face-image">
                        <div class="face-placeholder" style="background-image: url('26.jpg');">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="face-info">
                        <h4>Адель</h4>
                        <p>9 лет</p>
                    </div>
                </div>

                <div class="face-card">
                    <div class="face-image">
                        <div class="face-placeholder" style="background-image: url('25.jpg');">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="face-info">
                        <h4>Андрей</h4>
                        <p>12 лет</p>
                    </div>
                </div>

                <div class="face-card">
                    <div class="face-image">
                        <div class="face-placeholder" style="background-image: url('24.jpg');">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="face-info">
                        <h4>Варя</h4>
                        <p>13 лет</p>
                    </div>
                </div>

                <div class="face-card">
                    <div class="face-image">
                        <div class="face-placeholder" style="background-image: url('23.jpg');">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="face-info">
                        <h4>Марго</h4>
                        <p>10 лет</p>
                    </div>
                </div>

                <div class="face-card">
                    <div class="face-image">
                        <div class="face-placeholder" style="background-image: url('22.jpg');">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="face-info">
                        <h4>Марианна</h4>
                        <p>9 лет</p>
                    </div>
                </div>

                <div class="face-card">
                    <div class="face-image">
                        <div class="face-placeholder" style="background-image: url('21.jpg');">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="face-info">
                        <h4>Стефания</h4>
                        <p>7 лет</p>
                    </div>
                </div>

                <div class="face-card">
                    <div class="face-image">
                        <div class="face-placeholder" style="background-image: url('20.jpg');">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="face-info">
                        <h4>Устинья</h4>
                        <p>9 лет</p>
                    </div>
                </div>

                <a href="#all-models" class="face-card face-card-more">
                    <div class="face-more-content">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <h4>Смотреть<br>все</h4>
                        <span class="models-count">12+ моделей</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="partners" id="partners">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Сотрудничество</div>
                <h2 class="section-title">Наши партнёры<br>и бренды</h2>
                <p class="section-description">Наши преподаватели работают с ведущими российскими и международными брендами</p>
            </div>

            <div class="partners-categories">
                <div class="category-block">
                    <h3 class="category-title">Fashion показы</h3>
                    <div class="partners-grid partners-grid-2">
                        <div class="partner-card">
                            <div class="partner-logo">
                                Mercedes-Benz<br>Fashion Week
                            </div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">
                                Московская<br>Неделя Моды
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category-block">
                    <h3 class="category-title">Детские бренды</h3>
                    <div class="partners-grid">
                        <div class="partner-card">
                            <div class="partner-logo">Gloria Jeans</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Sela</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">ORBY</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Детский мир</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Gulliver</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Playtoday</div>
                        </div>
                    </div>
                </div>

                <div class="category-block">
                    <h3 class="category-title">Retail & E-commerce</h3>
                    <div class="partners-grid">
                        <div class="partner-card">
                            <div class="partner-logo">ЦУМ</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Lamoda</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Wildberries</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">OZON</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Яндекс Маркет</div>
                        </div>
                    </div>
                </div>

                <div class="category-block">
                    <h3 class="category-title">Lifestyle бренды</h3>
                    <div class="partners-grid">
                        <div class="partner-card">
                            <div class="partner-logo">Dyson</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Альфа-Банк</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Кенгуру</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Mercury</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Ашан</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Пятёрочка</div>
                        </div>
                    </div>
                </div>

                <div class="category-block">
                    <h3 class="category-title">Публикации</h3>
                    <div class="partners-grid">
                        <div class="partner-card">
                            <div class="partner-logo">Vogue Italia</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">FLACON</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">MOB Journal</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Marika<br>Magazine</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">GOJI</div>
                        </div>
                        <div class="partner-card">
                            <div class="partner-logo">Horizont</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="partners-cta">
                <p>Хотите, чтобы ваш ребёнок работал с лучшими брендами?</p>
                <a href="#contact" class="btn-primary">Записаться в школу</a>
            </div>
        </div>
    </section>

    <!-- 
    <section class="video-gallery" id="gallery">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Наши работы</div>
                <h2 class="section-title">Видео-галерея</h2>
                <p class="section-description">Посмотрите, как проходят наши занятия, показы и съёмки</p>
            </div>

            <div class="videos-grid">
                <div class="video-card video-card-large">
                    <div class="video-thumbnail">
                        <img src="https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?w=800&h=600&fit=crop" alt="Выпускной показ" class="video-preview-img">
                        <div class="video-overlay">
                            <button class="play-button">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="video-info">
                        <h4>Выпускной показ 2024</h4>
                        <p>Финальный показ наших учеников в ЦУМе</p>
                        <span class="video-duration">5:30</span>
                    </div>
                </div>

                <div class="video-card">
                    <div class="video-thumbnail">
                        <img src="https://images.unsplash.com/photo-1483118714900-540cf339fd46?w=600&h=400&fit=crop" alt="Урок дефиле" class="video-preview-img">
                        <div class="video-overlay">
                            <button class="play-button">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="video-info">
                        <h4>Урок дефиле</h4>
                        <p>Постановка походки</p>
                        <span class="video-duration">3:45</span>
                    </div>
                </div>

                <div class="video-card">
                    <div class="video-thumbnail">
                        <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=600&h=400&fit=crop" alt="Фотосессия" class="video-preview-img">
                        <div class="video-overlay">
                            <button class="play-button">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="video-info">
                        <h4>Фотосессия</h4>
                        <p>Работа с камерой</p>
                        <span class="video-duration">4:12</span>
                    </div>
                </div>

                <div class="video-card">
                    <div class="video-thumbnail">
                        <img src="https://images.unsplash.com/photo-1489392191049-fc10c97e64b6?w=600&h=400&fit=crop" alt="За кулисами" class="video-preview-img">
                        <div class="video-overlay">
                            <button class="play-button">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="video-info">
                        <h4>За кулисами</h4>
                        <p>Подготовка к показу</p>
                        <span class="video-duration">2:58</span>
                    </div>
                </div>

                <div class="video-card">
                    <div class="video-thumbnail">
                        <img src="https://images.unsplash.com/photo-1515377905703-c4788e51af15?w=600&h=400&fit=crop" alt="Актёрское мастерство" class="video-preview-img">
                        <div class="video-overlay">
                            <button class="play-button">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="video-info">
                        <h4>Актёрское мастерство</h4>
                        <p>Развитие уверенности</p>
                        <span class="video-duration">3:20</span>
                    </div>
                </div>

                <div class="video-card">
                    <div class="video-thumbnail">
                        <img src="https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?w=600&h=400&fit=crop" alt="Отзывы родителей" class="video-preview-img">
                        <div class="video-overlay">
                            <button class="play-button">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="video-info">
                        <h4>Отзывы родителей</h4>
                        <p>Впечатления о школе</p>
                        <span class="video-duration">6:15</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- Contact Form Section -->
    <section class="contact-section" id="contact">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-info">
                    <div class="section-label">Свяжитесь с нами</div>
                    <h2 class="section-title">Запишитесь<br>в школу</h2>
                    <p class="contact-description">
                        Заполните форму, и наш менеджер свяжется с вами в течение 24 часов для записи 
                    </p>

                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </div>
                            <div class="contact-text">
                                <h4>Телефон</h4>
                                <p><a href="tel:+79060691153">+7 (906) 069-11-53</a></p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div class="contact-text">
                                <h4>Email</h4>
                                <p><a href="mailto:info@etat.agency">info@etat.agency</a></p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div class="contact-text">
                                <h4>Адрес</h4>
                                <p>Москва, ул. 1-я тверская-ямская, 36с1</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <div class="contact-text">
                                <h4>Время работы</h4>
                                <p>Пн-Пт: 10:00 - 20:00<br>Сб-Вс: 11:00 - 18:00</p>
                            </div>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="https://www.instagram.com/maisondemodeles_/" class="social-link" aria-label="Instagram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        <a href="https://t.me/maison_de_models" class="social-link" aria-label="Telegram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                        </a>
                        <a href="https://wa.clck.bar/79060691153" class="social-link" aria-label="WhatsApp">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                            </svg>
                        </a>
                        <a href="https://vk.com/club233476665" class="social-link" aria-label="VK">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.785 16.241s.288-.032.436-.194c.136-.148.132-.427.132-.427s-.02-1.304.567-1.496c.579-.189 1.323 1.26 2.11 1.818.595.422 1.049.33 1.049.33l2.106-.03s1.102-.07.58-.967c-.043-.074-.306-.665-1.572-1.888-1.324-1.28-1.146-1.073.448-3.29.97-1.35 1.357-2.173 1.236-2.525-.115-.336-.826-.247-.826-.247l-2.37.015s-.176-.025-.307.056c-.127.079-.21.263-.21.263s-.375 1.03-.875 1.906c-1.054 1.847-1.476 1.945-1.648 1.83-.401-.267-.301-1.073-.301-1.645 0-1.788.262-2.532-.511-2.725-.257-.064-.446-.106-1.103-.113-.843-.009-1.556.003-1.959.207-.268.136-.475.439-.349.456.155.022.508.098.695.361.241.339.233 1.101.233 1.101s.139 2.105-.324 2.366c-.318.179-.754-.187-1.69-1.865-.479-.854-.841-1.798-.841-1.798s-.07-.177-.194-.272c-.151-.114-.362-.15-.362-.15l-2.252.015s-.338.01-.462.162c-.11.135-.009.413-.009.413s1.765 4.267 3.763 6.417c1.833 1.973 3.911 1.843 3.911 1.843h.943z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="contact-form-wrapper">
                    <form class="contact-form" id="castingForm">
                        <div class="form-success" id="formSuccess">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            <h3>Заявка отправлена!</h3>
                            <p>Мы свяжемся с вами в ближайшее время</p>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="parentName">Ваше имя *</label>
                                <input type="text" id="parentName" name="parentName" required>
                            </div>
                            <div class="form-group">
                                <label for="childName">Имя ребёнка *</label>
                                <input type="text" id="childName" name="childName" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Телефон *</label>
                                <input type="tel" id="phone" name="phone" placeholder="+7 (___) ___-__-__" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="childAge">Возраст ребёнка *</label>
                                <select id="childAge" name="childAge" required>
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
                                <label for="source">Как узнали о нас? *</label>
                                <select id="source" name="source" required>
                                    <option value="">Выберите вариант</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="vk">VKontakte</option>
                                    <option value="friends">От друзей</option>
                                    <option value="google">Поиск в Google</option>
                                    <option value="yandex">Поиск в Яндекс</option>
                                    <option value="other">Другое</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message">Дополнительная информация</label>
                            <textarea id="message" name="message" rows="4" placeholder="Расскажите о вашем ребёнке, его интересах и опыте (если есть)"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="agree" name="agree" required>
                                <span>Я согласен с <a href="#" class="form-link">политикой конфиденциальности</a> и даю согласие на обработку персональных данных</span>
                            </label>
                        </div>

                        <button type="submit" class="btn-primary btn-submit">
                            Отправить заявку
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', () => {
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

        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            nav.classList.toggle('active');
        });

        // Close menu when clicking on a link
        document.querySelectorAll('.nav a').forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                nav.classList.remove('active');
            });
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.program-item, .feature-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });

        // Faces grid animation
        const facesObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, index * 100);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.face-card').forEach(card => {
            facesObserver.observe(card);
        });

        // Partners animation
        const partnersObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    const cards = entry.target.querySelectorAll('.partner-card');
                    cards.forEach((card, cardIndex) => {
                        setTimeout(() => {
                            card.classList.add('visible');
                        }, cardIndex * 50);
                    });
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.partners-grid').forEach(grid => {
            partnersObserver.observe(grid);
        });

        // Video gallery animation
        const videoObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, index * 100);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.video-card').forEach(card => {
            videoObserver.observe(card);
        });

        // Play button click simulation
        document.querySelectorAll('.video-card').forEach(card => {
            card.addEventListener('click', function() {
                console.log('Video clicked:', this.querySelector('h4').textContent);
                // Здесь можно добавить открытие модального окна с видео
            });
        });

        // Contact form phone mask
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                
                if (value.length > 0) {
                    if (value[0] === '7' || value[0] === '8') {
                        value = value.substring(1);
                    }
                    
                    let formatted = '+7';
                    if (value.length > 0) {
                        formatted += ' (' + value.substring(0, 3);
                    }
                    if (value.length > 3) {
                        formatted += ') ' + value.substring(3, 6);
                    }
                    if (value.length > 6) {
                        formatted += '-' + value.substring(6, 8);
                    }
                    if (value.length > 8) {
                        formatted += '-' + value.substring(8, 10);
                    }
                    
                    e.target.value = formatted;
                } else {
                    e.target.value = '';
                }
            });
        }

        // Contact form submission
const castingForm = document.getElementById('castingForm');
const formSuccess = document.getElementById('formSuccess');

if (castingForm) {
    castingForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = castingForm.querySelector('.btn-submit');
        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Отправка...';
        
        const formData = new FormData(castingForm);
        
        try {
            const response = await fetch('send_contact.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                castingForm.style.display = 'none';
                formSuccess.classList.add('show');
                castingForm.reset();
                
                // Сброс формы через 5 секунд
                setTimeout(() => {
                    castingForm.style.display = 'block';
                    formSuccess.classList.remove('show');
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }, 5000);
            } else {
                alert(result.message || 'Произошла ошибка при отправке. Пожалуйста, попробуйте еще раз.');
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Произошла ошибка при отправке. Пожалуйста, попробуйте еще раз.');
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    });
}
    </script>
</body>
</html>