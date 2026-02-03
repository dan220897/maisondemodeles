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
            background: linear-gradient(135deg, #f5ebe0 0%, #e3d5ca 50%, #d5bdaf 100%);
            z-index: 1;
        }

        .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.03;
            background-image: 
                repeating-linear-gradient(45deg, #2c2c2c 0, #2c2c2c 1px, transparent 0, transparent 50%),
                repeating-linear-gradient(-45deg, #2c2c2c 0, #2c2c2c 1px, transparent 0, transparent 50%);
            background-size: 30px 30px;
            z-index: 2;
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
            color: #c9a57b;
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
            color: #2c2c2c;
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
            color: #5a5a5a;
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

        .hero-stats {
            position: absolute;
            bottom: 80px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            display: flex;
            gap: 80px;
            animation: fadeInUp 1.2s ease 1s backwards;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 300;
            color: #2c2c2c;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #8a8a8a;
            font-weight: 500;
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
            background: linear-gradient(135deg, #f5ebe0 0%, #e3d5ca 100%);
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
            display: flex;
            align-items: center;
            justify-content: center;
            color: #c9a57b;
            transition: all 0.4s ease;
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

        /* School Page Section */
        .school-page {
            padding: 140px 0;
            background: #fff;
        }

        .school-intro {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            margin: 80px 0 100px;
            align-items: center;
        }

        .intro-image {
            aspect-ratio: 4/3;
            overflow: hidden;
        }

        .intro-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .intro-image:hover img {
            transform: scale(1.05);
        }

        .intro-content h3 {
            font-size: 32px;
            font-weight: 400;
            color: #2c2c2c;
            margin-bottom: 25px;
            letter-spacing: -0.5px;
        }

        .intro-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #5a5a5a;
            margin-bottom: 20px;
        }

        .intro-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 30px;
        }

        .intro-feature {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #2c2c2c;
            font-size: 15px;
        }

        .intro-feature svg {
            color: #c9a57b;
            flex-shrink: 0;
        }

        /* Program Detailed */
        .program-detailed {
            margin-bottom: 100px;
        }

        .program-detailed-title {
            font-size: 36px;
            font-weight: 400;
            color: #2c2c2c;
            text-align: center;
            margin-bottom: 60px;
            letter-spacing: -0.5px;
        }

        .curriculum-block {
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            margin-bottom: 25px;
            overflow: hidden;
        }

        .curriculum-header {
            display: flex;
            align-items: center;
            gap: 25px;
            padding: 30px 40px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .curriculum-header:hover {
            background: #f5ebe0;
        }

        .curriculum-number {
            font-size: 20px;
            font-weight: 500;
            color: #c9a57b;
            min-width: 40px;
        }

        .curriculum-header h4 {
            flex: 1;
            font-size: 22px;
            font-weight: 500;
            color: #2c2c2c;
            letter-spacing: -0.3px;
        }

        .curriculum-duration {
            font-size: 14px;
            color: #c9a57b;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .curriculum-content {
            padding: 0 40px 40px 105px;
        }

        .curriculum-content p {
            font-size: 16px;
            color: #5a5a5a;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .curriculum-list {
            list-style: none;
            padding: 0;
        }

        .curriculum-list li {
            font-size: 15px;
            color: #5a5a5a;
            padding-left: 25px;
            margin-bottom: 12px;
            position: relative;
            line-height: 1.6;
        }

        .curriculum-list li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: #c9a57b;
            font-size: 20px;
        }

        /* Age Groups */
        .age-groups {
            margin-bottom: 100px;
        }

        .age-groups-title {
            font-size: 36px;
            font-weight: 400;
            color: #2c2c2c;
            text-align: center;
            margin-bottom: 60px;
            letter-spacing: -0.5px;
        }

        .age-groups-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .age-group-card {
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            padding: 40px 30px;
            transition: all 0.4s ease;
        }

        .age-group-card:hover {
            background: #fff;
            border-color: #c9a57b;
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        .age-badge {
            display: inline-block;
            padding: 8px 16px;
            background: #c9a57b;
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .age-group-card h4 {
            font-size: 24px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 15px;
            letter-spacing: -0.3px;
        }

        .age-group-card > p {
            font-size: 15px;
            line-height: 1.7;
            color: #5a5a5a;
            margin-bottom: 25px;
        }

        .age-features {
            list-style: none;
            padding: 0;
        }

        .age-features li {
            font-size: 14px;
            color: #5a5a5a;
            padding-left: 25px;
            margin-bottom: 10px;
            position: relative;
        }

        .age-features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #c9a57b;
            font-weight: 600;
        }

        /* Schedule & Pricing */
        .schedule-pricing {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 100px;
        }

        .schedule-block h3,
        .pricing-block h3 {
            font-size: 28px;
            font-weight: 400;
            color: #2c2c2c;
            margin-bottom: 30px;
            letter-spacing: -0.5px;
        }

        .schedule-item {
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            padding: 25px 30px;
            margin-bottom: 15px;
        }

        .schedule-day {
            font-size: 16px;
            font-weight: 600;
            color: #2c2c2c;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .schedule-times {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .schedule-times span {
            font-size: 14px;
            color: #5a5a5a;
        }

        .price-card {
            background: linear-gradient(135deg, #f5ebe0 0%, #e3d5ca 100%);
            border: 1px solid #f0ebe5;
            padding: 40px 35px;
        }

        .price-label {
            font-size: 14px;
            color: #c9a57b;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .price-amount {
            font-size: 48px;
            font-weight: 300;
            color: #2c2c2c;
            margin-bottom: 25px;
            letter-spacing: -1px;
        }

        .price-includes {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }

        .price-includes li {
            font-size: 15px;
            color: #5a5a5a;
            padding-left: 25px;
            margin-bottom: 10px;
            position: relative;
        }

        .price-includes li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #c9a57b;
            font-weight: 600;
        }

        .pricing-note {
            font-size: 13px;
            color: #5a5a5a;
            font-style: italic;
            margin-top: 20px;
        }

        /* What Get */
        .what-get {
            margin-bottom: 100px;
        }

        .what-get-title {
            font-size: 36px;
            font-weight: 400;
            color: #2c2c2c;
            text-align: center;
            margin-bottom: 60px;
            letter-spacing: -0.5px;
        }

        .what-get-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .what-get-card {
            text-align: center;
            padding: 40px 30px;
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            transition: all 0.4s ease;
        }

        .what-get-card:hover {
            background: #fff;
            border-color: #c9a57b;
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        .what-get-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .what-get-card h4 {
            font-size: 20px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 12px;
            letter-spacing: -0.3px;
        }

        .what-get-card p {
            font-size: 15px;
            line-height: 1.6;
            color: #5a5a5a;
        }

        /* School CTA */
        .school-cta {
            padding: 80px 60px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e3d5ca 100%);
            border: 1px solid #f0ebe5;
            text-align: center;
        }

        .school-cta-content h3 {
            font-size: 36px;
            font-weight: 400;
            color: #2c2c2c;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
        }

        .school-cta-content p {
            font-size: 16px;
            color: #5a5a5a;
            margin-bottom: 35px;
        }

        .school-cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Responsive School Page */
        @media (max-width: 1024px) {
            .age-groups-grid {
                grid-template-columns: 1fr;
            }

            .schedule-pricing {
                grid-template-columns: 1fr;
            }

            .what-get-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .school-page {
                padding: 80px 0;
            }

            .school-intro {
                grid-template-columns: 1fr;
                gap: 40px;
                margin: 60px 0 80px;
            }

            .intro-features {
                grid-template-columns: 1fr;
            }

            .program-detailed {
                margin-bottom: 80px;
            }

            .program-detailed-title,
            .age-groups-title,
            .what-get-title,
            .school-cta-content h3 {
                font-size: 28px;
            }

            .curriculum-header {
                flex-wrap: wrap;
                padding: 25px 25px;
            }

            .curriculum-content {
                padding: 0 25px 30px 25px;
            }

            .age-groups {
                margin-bottom: 80px;
            }

            .what-get {
                margin-bottom: 80px;
            }

            .what-get-grid {
                grid-template-columns: 1fr;
            }

            .school-cta {
                padding: 50px 30px;
            }

            .school-cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .school-cta-buttons .btn-primary,
            .school-cta-buttons .btn-secondary {
                width: 100%;
                max-width: 400px;
            }
        }

        /* About Us Section */
        .about-us {
            padding: 120px 0 0 0;
            background: #fff;
        }

        .about-hero {
            margin: 60px 0 100px;
            padding: 80px 60px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e3d5ca 100%);
            border: 1px solid #f0ebe5;
        }

        .about-stats-group {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 50px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .about-stat {
            text-align: center;
        }

        .about-stat .stat-number {
            font-size: 56px;
            font-weight: 300;
            color: #2c2c2c;
            margin-bottom: 10px;
            letter-spacing: -1px;
        }

        .about-stat .stat-text {
            font-size: 14px;
            color: #5a5a5a;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Story Section */
        .about-story {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 80px;
            margin-bottom: 120px;
            align-items: center;
        }

        .story-content h3 {
            font-size: 36px;
            font-weight: 400;
            color: #2c2c2c;
            margin-bottom: 30px;
            letter-spacing: -0.5px;
        }

        .story-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #5a5a5a;
            margin-bottom: 20px;
        }

        .story-content p:last-child {
            margin-bottom: 0;
        }

        .story-image {
            aspect-ratio: 3/4;
            overflow: hidden;
        }

        .story-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .story-image:hover img {
            transform: scale(1.05);
        }

        /* Mission & Values */
        .mission-values {
            padding: 80px 60px;
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            margin-bottom: 120px;
        }

        .values-title {
            font-size: 36px;
            font-weight: 400;
            color: #2c2c2c;
            text-align: center;
            margin-bottom: 60px;
            letter-spacing: -0.5px;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
        }

        .value-card {
            text-align: center;
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: #fff;
            border: 1px solid #e3d5ca;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: #c9a57b;
        }

        .value-card h4 {
            font-size: 20px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 15px;
            letter-spacing: -0.3px;
        }

        .value-card p {
            font-size: 15px;
            line-height: 1.7;
            color: #5a5a5a;
        }

        /* Team Section */
        .team-section {
            margin-bottom: 120px;
        }

        .team-title {
            font-size: 36px;
            font-weight: 400;
            color: #2c2c2c;
            text-align: center;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
        }

        .team-subtitle {
            font-size: 16px;
            color: #5a5a5a;
            text-align: center;
            margin-bottom: 60px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .team-card {
            background: #faf8f5;
            border: 1px solid #f0ebe5;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            border-color: #c9a57b;
        }

        .team-photo {
            aspect-ratio: 3/4;
            overflow: hidden;
        }

        .team-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .team-card:hover .team-photo img {
            transform: scale(1.05);
        }

        .team-info {
            padding: 25px;
        }

        .team-info h4 {
            font-size: 18px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 5px;
            letter-spacing: -0.3px;
        }

        .team-position {
            font-size: 12px;
            color: #c9a57b;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .team-bio {
            font-size: 14px;
            line-height: 1.6;
            color: #5a5a5a;
        }

        /* Achievements */
        .achievements {
            margin-bottom: 120px;
        }

        .achievements-title {
            font-size: 36px;
            font-weight: 400;
            color: #2c2c2c;
            text-align: center;
            margin-bottom: 60px;
            letter-spacing: -0.5px;
        }

        .achievements-list {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }

        .achievements-list::before {
            content: '';
            position: absolute;
            left: 50px;
            top: 0;
            bottom: 0;
            width: 1px;
            background: #e3d5ca;
        }

        .achievement-item {
            display: flex;
            gap: 40px;
            margin-bottom: 50px;
            position: relative;
        }

        .achievement-item:last-child {
            margin-bottom: 0;
        }

        .achievement-year {
            width: 100px;
            font-size: 20px;
            font-weight: 500;
            color: #c9a57b;
            flex-shrink: 0;
            position: relative;
        }

        .achievement-year::after {
            content: '';
            position: absolute;
            right: -21px;
            top: 8px;
            width: 12px;
            height: 12px;
            background: #c9a57b;
            border-radius: 50%;
            border: 3px solid #fff;
        }

        .achievement-content h4 {
            font-size: 20px;
            font-weight: 500;
            color: #2c2c2c;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .achievement-content p {
            font-size: 15px;
            line-height: 1.6;
            color: #5a5a5a;
        }

        /* About CTA */
        .about-cta {
            text-align: center;
            padding: 80px 60px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e3d5ca 100%);
            border: 1px solid #f0ebe5;
            margin-bottom: 120px;
        }

        .about-cta h3 {
            font-size: 36px;
            font-weight: 400;
            color: #2c2c2c;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
        }

        .about-cta p {
            font-size: 16px;
            color: #5a5a5a;
            margin-bottom: 30px;
        }

        /* Responsive About */
        @media (max-width: 1024px) {
            .about-stats-group {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }

            .values-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .about-us {
                padding: 80px 0 0 0;
            }

            .about-hero {
                padding: 50px 30px;
                margin: 40px 0 60px;
            }

            .about-stats-group {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .about-story {
                grid-template-columns: 1fr;
                gap: 40px;
                margin-bottom: 80px;
            }

            .story-content h3,
            .values-title,
            .team-title,
            .achievements-title,
            .about-cta h3 {
                font-size: 28px;
            }

            .mission-values {
                padding: 50px 30px;
                margin-bottom: 80px;
            }

            .team-section {
                margin-bottom: 80px;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }

            .achievements {
                margin-bottom: 80px;
            }

            .achievements-list::before {
                left: 70px;
            }

            .achievement-year {
                width: 80px;
            }

            .achievement-year::after {
                right: -16px;
            }

            .about-cta {
                padding: 50px 30px;
                margin-bottom: 80px;
            }
        }

        @media (max-width: 480px) {
            .about-stat .stat-number {
                font-size: 42px;
            }

            .story-content h3 {
                font-size: 24px;
            }

            .achievements-list::before {
                display: none;
            }

            .achievement-item {
                flex-direction: column;
                gap: 10px;
            }

            .achievement-year::after {
                display: none;
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
            .hero-stats {
                gap: 50px;
            }

            .stat-number {
                font-size: 28px;
            }
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

            .hero-stats {
                gap: 40px;
                bottom: 100px;
            }

            .stat-number {
                font-size: 24px;
            }

            .stat-label {
                font-size: 10px;
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

            .hero-stats {
                flex-wrap: wrap;
                gap: 30px;
                bottom: 120px;
            }
        }
    </style>
</head>
<body>
    <?php include 'inc/header.php'; ?>

    

    <!-- School Page Section -->
    <section class="school-page" id="school-page">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Обучение</div>
                <h2 class="section-title">Модельная школа</h2>
                <p class="section-description">Комплексная программа обучения для детей 4-16 лет</p>
            </div>

            <div class="school-intro">
                <div class="intro-image">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800&h=600&fit=crop" alt="Модельная школа">
                </div>
                <div class="intro-content">
                    <h3>Профессиональное обучение для будущих моделей</h3>
                    <p>
                        Наша модельная школа — это не просто курсы, это целая экосистема для развития талантливых детей в индустрии моды. Мы обучаем профессиональным навыкам, развиваем уверенность в себе и открываем реальные возможности для карьеры.
                    </p>
                    <p>
                        Программа разработана с учетом международных стандартов модельного образования и адаптирована для детей разного возраста и уровня подготовки.
                    </p>
                    <div class="intro-features">
                        <div class="intro-feature">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Курс 3 месяца</span>
                        </div>
                        <div class="intro-feature">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Занятия 2 раза в неделю</span>
                        </div>
                        <div class="intro-feature">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Группы до 10 человек</span>
                        </div>
                        <div class="intro-feature">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Выпускной показ</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="program-detailed">
                <h3 class="program-detailed-title">Программа курса</h3>
                
                <div class="curriculum-block">
                    <div class="curriculum-header">
                        <div class="curriculum-number">01</div>
                        <h4>Основы дефиле и постановка походки</h4>
                        <span class="curriculum-duration">1.5 часа</span>
                    </div>
                    <div class="curriculum-content">
                        <p>Изучаем основы профессиональной модельной походки и поведения на подиуме</p>
                        <ul class="curriculum-list">
                            <li>Правильная осанка и постановка корпуса</li>
                            <li>Техника модельной походки</li>
                            <li>Позиции и повороты на подиуме</li>
                            <li>Работа с ритмом и музыкой</li>
                            <li>Демонстрация одежды различных стилей</li>
                            <li>Практика на профессиональном подиуме</li>
                        </ul>
                    </div>
                </div>

                <div class="curriculum-block">
                    <div class="curriculum-header">
                        <div class="curriculum-number">02</div>
                        <h4>Фотопозирование и работа с камерой</h4>
                        <span class="curriculum-duration">1.5-2 часа</span>
                    </div>
                    <div class="curriculum-content">
                        <p>Учимся работать перед камерой и создавать профессиональное портфолио</p>
                        <ul class="curriculum-list">
                            <li>Секреты фотогеничности</li>
                            <li>Работа с лицом: мимика и выражения</li>
                            <li>Постановка тела и рук</li>
                            <li>Взаимодействие с фотографом</li>
                            <li>Создание различных образов</li>
                            <li>Практические фотосессии в студии</li>
                            <li>Формирование профессионального портфолио</li>
                        </ul>
                    </div>
                </div>

                <div class="curriculum-block">
                    <div class="curriculum-header">
                        <div class="curriculum-number">03</div>
                        <h4>Актёрское мастерство и раскрепощение</h4>
                        <span class="curriculum-duration">1.5 часа</span>
                    </div>
                    <div class="curriculum-content">
                        <p>Развиваем харизму, уверенность и умение держаться перед публикой</p>
                        <ul class="curriculum-list">
                            <li>Упражнения на раскрепощение</li>
                            <li>Работа со страхом и волнением</li>
                            <li>Развитие эмоциональности</li>
                            <li>Взаимодействие с аудиторией</li>
                            <li>Импровизация и креативность</li>
                            <li>Публичные выступления</li>
                        </ul>
                    </div>
                </div>

                <div class="curriculum-block">
                    <div class="curriculum-header">
                        <div class="curriculum-number">04</div>
                        <h4>Выпускной показ</h4>
                        <span class="curriculum-duration">2 часа</span>
                    </div>
                    <div class="curriculum-content">
                        <p>Кульминация курса — профессиональный показ для родителей и гостей</p>
                        <ul class="curriculum-list">
                            <li>Работа с визажистом и стилистом</li>
                            <li>Подбор и примерка одежды</li>
                            <li>Репетиции с постановщиком</li>
                            <li>Backstage подготовка</li>
                            <li>Выход на профессиональный подиум</li>
                            <li>Вручение сертификатов</li>
                            <li>Профессиональная фото и видеосъёмка</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="age-groups">
                <h3 class="age-groups-title">Возрастные группы</h3>
                <div class="age-groups-grid">
                    <div class="age-group-card">
                        <div class="age-badge">4-7 лет</div>
                        <h4>Kids</h4>
                        <p>Игровой формат обучения с акцентом на развитие координации, уверенности и базовых модельных навыков</p>
                        <ul class="age-features">
                            <li>Развитие координации движений</li>
                            <li>Базовая постановка походки</li>
            <li>Простые позы для фото</li>
                            <li>Раскрепощение через игру</li>
                        </ul>
                    </div>

                    <div class="age-group-card">
                        <div class="age-badge">8-11 лет</div>
                        <h4>Junior</h4>
                        <p>Комплексная программа с профессиональным подходом, адаптированная под средний школьный возраст</p>
                        <ul class="age-features">
                            <li>Профессиональная походка</li>
                            <li>Фотопозирование</li>
                            <li>Работа с эмоциями</li>
                            <li>Создание портфолио</li>
                        </ul>
                    </div>

                    <div class="age-group-card">
                        <div class="age-badge">12-16 лет</div>
                        <h4>Teen</h4>
                        <p>Продвинутый уровень с максимальным погружением в модельную индустрию и подготовкой к профессиональной карьере</p>
                        <ul class="age-features">
                            <li>Продвинутые техники дефиле</li>
                            <li>Editorial фотопозирование</li>
                            <li>Работа на реальных проектах</li>
                            <li>Подготовка к кастингам</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="schedule-pricing">
                <div class="schedule-block">
                    <h3>Расписание</h3>
                    <div class="schedule-item">
                        <div class="schedule-day">Понедельник</div>
                        <div class="schedule-times">
                            <span>16:00 - 18:00 (Kids)</span>
                            <span>18:30 - 20:30 (Junior)</span>
                        </div>
                    </div>
                    <div class="schedule-item">
                        <div class="schedule-day">Среда</div>
                        <div class="schedule-times">
                            <span>16:00 - 18:00 (Teen)</span>
                            <span>18:30 - 20:30 (Kids)</span>
                        </div>
                    </div>
                    <div class="schedule-item">
                        <div class="schedule-day">Суббота</div>
                        <div class="schedule-times">
                            <span>11:00 - 13:00 (Junior)</span>
                            <span>14:00 - 16:00 (Teen)</span>
                        </div>
                    </div>
                </div>

                <div class="pricing-block">
                    <h3>Стоимость</h3>
                    <div class="price-card">
                        <div class="price-label">Полный курс (3 месяца)</div>
                        <div class="price-amount">35 000 ₽</div>
                        <ul class="price-includes">
                            <li>24 занятия по 1.5-2 часа</li>
                            <li>Все учебные материалы</li>
                            <li>Профессиональное портфолио</li>
                            <li>Выпускной показ</li>
                            <li>Сертификат об окончании</li>
                        </ul>
                        <a href="#contact" class="btn-primary">Записаться</a>
                    </div>
                    <p class="pricing-note">* Возможна рассрочка платежа. Скидка 10% при оплате полного курса</p>
                </div>
            </div>

            <div class="what-get">
                <h3 class="what-get-title">Что получит ваш ребёнок</h3>
                <div class="what-get-grid">
                    <div class="what-get-card">
                        <div class="what-get-icon">📚</div>
                        <h4>Профессиональные навыки</h4>
                        <p>Дефиле, фотопозирование, работа с камерой и на публике</p>
                    </div>
                    <div class="what-get-card">
                        <div class="what-get-icon">💪</div>
                        <h4>Уверенность в себе</h4>
                        <p>Преодоление страхов, развитие харизмы и лидерских качеств</p>
                    </div>
                    <div class="what-get-card">
                        <div class="what-get-icon">📸</div>
                        <h4>Портфолио</h4>
                        <p>Профессиональные фотографии для дальнейшей работы</p>
                    </div>
                    <div class="what-get-card">
                        <div class="what-get-icon">🎭</div>
                        <h4>Опыт показов</h4>
                        <p>Участие в реальных модельных показах и съёмках</p>
                    </div>
                    <div class="what-get-card">
                        <div class="what-get-icon">👥</div>
                        <h4>Новые друзья</h4>
                        <p>Знакомство с единомышленниками и профессионалами</p>
                    </div>
                    <div class="what-get-card">
                        <div class="what-get-icon">🏆</div>
                        <h4>Сертификат</h4>
                        <p>Официальный документ об окончании модельной школы</p>
                    </div>
                </div>
            </div>

            <div class="school-cta">
                <div class="school-cta-content">
                    <h3>Запишитесь на бесплатное пробное занятие</h3>
                    <p>Познакомьтесь с нашей школой, преподавателями и программой обучения</p>
                    <div class="school-cta-buttons">
                        <a href="#contact" class="btn-primary">Записаться на пробное занятие</a>
                        <a href="tel:+79060691153" class="btn-secondary">Позвонить: +7 (906) 069-11-53</a>
                    </div>
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
            castingForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Симуляция отправки формы
                const submitBtn = castingForm.querySelector('.btn-submit');
                submitBtn.disabled = true;
                submitBtn.textContent = 'Отправка...';
                
                // Имитация отправки (замените на реальный AJAX запрос)
                setTimeout(() => {
                    castingForm.style.display = 'none';
                    formSuccess.classList.add('show');
                    
                    // Сброс формы через 5 секунд
                    setTimeout(() => {
                        castingForm.reset();
                        castingForm.style.display = 'block';
                        formSuccess.classList.remove('show');
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Отправить заявку';
                    }, 5000);
                }, 1500);
            });
        }
    </script>
</body>
</html>