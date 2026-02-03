<style>
    
    /* Header */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 25px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.4s ease;
            
        }

        .header.scrolled {
            padding: 18px 60px;
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }
        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 30px;
            transition: all 0.3s ease;
        }

        .header.scrolled .logo img {
            height: 40px;
        }

        .logo {
            font-size: 20px;
            font-weight: 300;
            letter-spacing: 3px;
            color: #2c2c2c;
            text-transform: uppercase;
        }

        .logo span {
            font-weight: 600;
            color: #c9a57b;
        }

        .nav {
            display: flex;
            gap: 50px;
            align-items: center;
        }

        .nav a {
            color: #2c2c2c;
            text-decoration: none;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 400;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav a::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 1px;
            background: #c9a57b;
            transition: width 0.3s ease;
        }

        .nav a:hover {
            color: #c9a57b;
        }

        .nav a:hover::after {
            width: 100%;
        }

        .cta-button {
            padding: 14px 32px;
            background: #2c2c2c;
            color: #faf8f5;
            border: none;
            font-weight: 500;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.4s ease;
            border-radius: 0;
        }

        .cta-button:hover {
            background: #c9a57b;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(201, 165, 123, 0.25);
        }

        /* Mobile Menu Button */
        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            z-index: 1001;
        }

        .menu-toggle span {
            width: 28px;
            height: 2px;
            background: #2c2c2c;
            transition: all 0.3s ease;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }

        .modal.active {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            background-color: #faf8f5;
            padding: 50px;
            border: 1px solid #f0ebe5;
            width: 90%;
            max-width: 600px;
            position: relative;
            animation: slideUp 0.4s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-height: 90vh;
            overflow-y: auto;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close {
            position: absolute;
            right: 25px;
            top: 25px;
            font-size: 32px;
            font-weight: 300;
            color: #2c2c2c;
            cursor: pointer;
            transition: color 0.3s ease;
            line-height: 1;
        }

        .close:hover {
            color: #c9a57b;
        }

        .modal-content .section-label {
            font-size: 12px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #c9a57b;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .modal-content h2 {
            font-size: 32px;
            font-weight: 300;
            letter-spacing: -0.5px;
            color: #2c2c2c;
            margin-bottom: 10px;
        }

        .modal-content .subtitle {
            font-size: 15px;
            color: #5a5a5a;
            margin-bottom: 35px;
            line-height: 1.6;
        }

        .modal-form {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
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
            font-size: 13px;
            line-height: 1.6;
            color: #5a5a5a;
        }

        .checkbox-label input[type="checkbox"] {
            width: 18px;
            height: 18px;
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

        .submit-button {
            width: 100%;
            padding: 18px;
            margin-top: 10px;
            background: #2c2c2c;
            color: #faf8f5;
            border: none;
            font-weight: 500;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .submit-button:hover:not(:disabled) {
            background: #c9a57b;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(201, 165, 123, 0.25);
        }

        .submit-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .form-success {
            display: none;
            text-align: center;
            padding: 50px 30px;
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
            font-size: 15px;
            color: #5a5a5a;
            line-height: 1.6;
        }

        /* Responsive Modal */
        @media (max-width: 768px) {
            .modal-content {
                padding: 40px 30px;
            }

            .modal-content h2 {
                font-size: 26px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .close {
                right: 20px;
                top: 20px;
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .modal-content {
                padding: 30px 20px;
                width: 95%;
            }

            .modal-content h2 {
                font-size: 24px;
            }

            .checkbox-label {
                font-size: 12px;
            }
        }
    
</style>

<!-- Header -->
    <header class="header">
        <a href="index.php" style="text-decoration:none;"><div class="logo">
            <img src="logo2.png"/>
        </div></a>
        
        <nav class="nav">
            <!--<a href="about.php">О нас</a>
            <a href="school.php">Школа</a>
            <a href="agency.php">Агентство</a>
            <a href="portfolio.php">Портфолио</a>
            <a href="contact.php">Контакты</a>-->
            <button class="cta-button" id="openModalBtn">Записаться</button>
        </nav>

        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>

    <!-- Modal -->
    <div id="registrationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            
            <div class="form-success" id="modalFormSuccess">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <h3>Заявка отправлена!</h3>
                <p>Мы свяжемся с вами в ближайшее время</p>
            </div>

            <form class="modal-form" id="modalRegistrationForm" method="POST">
                <div class="section-label">Свяжитесь с нами</div>
                <h2>Запишитесь<br>в школу</h2>
                <p class="subtitle">Заполните форму, и наш менеджер свяжется с вами в течение 24 часов для записи</p>

                <div class="form-row">
                    <div class="form-group">
                        <label for="modal-parentName">Ваше имя *</label>
                        <input type="text" id="modal-parentName" name="parentName" required>
                    </div>
                    <div class="form-group">
                        <label for="modal-childName">Имя ребёнка *</label>
                        <input type="text" id="modal-childName" name="childName" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="modal-phone">Телефон *</label>
                        <input type="tel" id="modal-phone" name="phone" placeholder="+7 (___) ___-__-__" required>
                    </div>
                    <div class="form-group">
                        <label for="modal-email">Email *</label>
                        <input type="email" id="modal-email" name="email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="modal-childAge">Возраст ребёнка *</label>
                        <select id="modal-childAge" name="childAge" required>
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
                        <label for="modal-source">Как узнали о нас? *</label>
                        <select id="modal-source" name="source" required>
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
                    <label for="modal-message">Дополнительная информация</label>
                    <textarea id="modal-message" name="message" rows="4" placeholder="Расскажите о вашем ребёнке, его интересах и опыте (если есть)"></textarea>
                </div>

                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" id="modal-agree" name="agree" required>
                        <span>Я согласен с <a href="#" class="form-link">политикой конфиденциальности</a> и даю согласие на обработку персональных данных</span>
                    </label>
                </div>

                <button type="submit" class="submit-button">Отправить заявку</button>
            </form>
        </div>
    </div>

    <script>
        // Modal functionality
        const modal = document.getElementById('registrationModal');
        const btn = document.getElementById('openModalBtn');
        const span = document.getElementsByClassName('close')[0];
        const modalForm = document.getElementById('modalRegistrationForm');
        const modalFormSuccess = document.getElementById('modalFormSuccess');

        // Open modal
        btn.onclick = function() {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Close modal
        span.onclick = function() {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        }

        // Phone mask for modal
        const modalPhoneInput = document.getElementById('modal-phone');
        if (modalPhoneInput) {
            modalPhoneInput.addEventListener('input', function(e) {
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

        // Modal form submission
        if (modalForm) {
            modalForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const submitBtn = modalForm.querySelector('.submit-button');
                const originalText = submitBtn.textContent;
                submitBtn.disabled = true;
                submitBtn.textContent = 'Отправка...';
                
                const formData = new FormData(modalForm);
                
                try {
                    const response = await fetch('send_contact.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        modalForm.style.display = 'none';
                        modalFormSuccess.classList.add('show');
                        modalForm.reset();
                        
                        // Закрыть модальное окно через 3 секунды
                        setTimeout(() => {
                            modal.classList.remove('active');
                            document.body.style.overflow = 'auto';
                            modalForm.style.display = 'block';
                            modalFormSuccess.classList.remove('show');
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        }, 3000);
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

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>