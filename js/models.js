document.addEventListener('DOMContentLoaded', function () {
    var children = window.__children || [];
    var popup = document.getElementById('mPopup');
    var popupClose = document.getElementById('mPopupClose');
    var popupName = document.getElementById('mPopupName');
    var popupDetails = document.getElementById('mPopupDetails');
    var sliderTrack = document.getElementById('mSliderTrack');
    var sliderDots = document.getElementById('mSliderDots');
    var sliderPrev = document.getElementById('mSliderPrev');
    var sliderNext = document.getElementById('mSliderNext');

    var currentSlide = 0;
    var totalSlides = 0;

    // Card click
    document.querySelectorAll('.m-card').forEach(function (card) {
        card.addEventListener('click', function () {
            var id = parseInt(card.dataset.childId);
            var child = children.find(function (c) { return c.id == id; });
            if (child) openPopup(child);
        });
    });

    function openPopup(child) {
        popupName.textContent = child.name;
        popupDetails.innerHTML = '';

        if (child.age && parseInt(child.age) > 0) addDetail('Возраст', child.age + ' лет');
        addDetail('Рост', child.height + ' см');
        if (child.params) addDetail('Параметры', child.params);

        sliderTrack.innerHTML = '';
        sliderDots.innerHTML = '';

        var photos = child.photos || [];
        if (photos.length === 0) {
            sliderTrack.innerHTML = '<div class="m-slider__slide" style="display:flex;align-items:center;justify-content:center;color:#8a8a8a;">Нет фотографий</div>';
            totalSlides = 0;
        } else {
            photos.forEach(function (photo, i) {
                var slide = document.createElement('div');
                slide.className = 'm-slider__slide';
                slide.innerHTML = '<img src="uploads/' + esc(photo.filename) + '" alt="">';
                sliderTrack.appendChild(slide);

                var dot = document.createElement('span');
                dot.className = 'm-slider__dot' + (i === 0 ? ' m-slider__dot--active' : '');
                dot.addEventListener('click', function () { goToSlide(i); });
                sliderDots.appendChild(dot);
            });
            totalSlides = photos.length;
        }

        currentSlide = 0;
        updateSlider();

        popup.classList.add('m-popup--active');
        document.body.style.overflow = 'hidden';
        requestAnimationFrame(function () {
            popup.classList.add('m-popup--visible');
        });
    }

    function addDetail(label, value) {
        popupDetails.insertAdjacentHTML('beforeend',
            '<div><div class="m-popup__detail-label">' + esc(label) + '</div>' +
            '<div class="m-popup__detail-value">' + esc(value) + '</div></div>'
        );
    }

    function closePopup() {
        popup.classList.remove('m-popup--visible');
        setTimeout(function () {
            popup.classList.remove('m-popup--active');
            document.body.style.overflow = '';
        }, 400);
    }

    function goToSlide(index) {
        if (totalSlides === 0) return;
        currentSlide = Math.max(0, Math.min(index, totalSlides - 1));
        updateSlider();
    }

    function updateSlider() {
        sliderTrack.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';
        sliderDots.querySelectorAll('.m-slider__dot').forEach(function (dot, i) {
            dot.classList.toggle('m-slider__dot--active', i === currentSlide);
        });
    }

    popupClose.addEventListener('click', closePopup);
    popup.addEventListener('click', function (e) { if (e.target === popup) closePopup(); });
    sliderPrev.addEventListener('click', function (e) { e.stopPropagation(); goToSlide(currentSlide - 1); });
    sliderNext.addEventListener('click', function (e) { e.stopPropagation(); goToSlide(currentSlide + 1); });

    document.addEventListener('keydown', function (e) {
        if (!popup.classList.contains('m-popup--active')) return;
        if (e.key === 'Escape') closePopup();
        if (e.key === 'ArrowLeft') goToSlide(currentSlide - 1);
        if (e.key === 'ArrowRight') goToSlide(currentSlide + 1);
    });

    // Touch swipe
    var touchX = 0;
    sliderTrack.addEventListener('touchstart', function (e) {
        touchX = e.changedTouches[0].screenX;
    }, { passive: true });

    sliderTrack.addEventListener('touchend', function (e) {
        var diff = touchX - e.changedTouches[0].screenX;
        if (Math.abs(diff) > 50) {
            goToSlide(diff > 0 ? currentSlide + 1 : currentSlide - 1);
        }
    }, { passive: true });

    // Scroll animation for cards
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

    document.querySelectorAll('.m-card').forEach(function (card) {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });

    function esc(str) {
        var d = document.createElement('div');
        d.textContent = str;
        return d.innerHTML;
    }
});
