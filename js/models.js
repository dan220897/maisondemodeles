document.addEventListener('DOMContentLoaded', function () {
    var children = window.__children || [];
    var popup = document.getElementById('mPopup');
    var popupClose = document.getElementById('mPopupClose');
    var popupName = document.getElementById('mPopupName');
    var popupDetails = document.getElementById('mPopupDetails');
    var galleryMain = document.getElementById('mGalleryMain');
    var galleryThumbs = document.getElementById('mGalleryThumbs');
    var galleryPrev = document.getElementById('mGalleryPrev');
    var galleryNext = document.getElementById('mGalleryNext');

    var currentIndex = 0;
    var currentPhotos = [];

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

        currentPhotos = child.photos || [];
        galleryThumbs.innerHTML = '';

        if (currentPhotos.length === 0) {
            galleryMain.style.display = 'none';
            galleryPrev.style.display = 'none';
            galleryNext.style.display = 'none';
            galleryThumbs.innerHTML = '<div style="text-align:center;color:#8a8a8a;padding:40px;">Нет фотографий</div>';
        } else {
            galleryMain.style.display = 'block';
            galleryPrev.style.display = '';
            galleryNext.style.display = '';

            currentPhotos.forEach(function (photo, i) {
                var thumb = document.createElement('div');
                thumb.className = 'm-gallery__thumb' + (i === 0 ? ' m-gallery__thumb--active' : '');
                thumb.innerHTML = '<img src="uploads/' + esc(photo.filename) + '" alt="">';
                thumb.addEventListener('click', function (e) {
                    e.stopPropagation();
                    goToPhoto(i);
                });
                galleryThumbs.appendChild(thumb);
            });

            currentIndex = 0;
            updateGallery();
        }

        popup.classList.add('m-popup--active');
        document.body.style.overflow = 'hidden';
        requestAnimationFrame(function () {
            popup.classList.add('m-popup--visible');
        });
    }

    function goToPhoto(index) {
        if (currentPhotos.length === 0) return;
        currentIndex = Math.max(0, Math.min(index, currentPhotos.length - 1));
        updateGallery();
    }

    function updateGallery() {
        galleryMain.src = 'uploads/' + currentPhotos[currentIndex].filename;
        var thumbs = galleryThumbs.querySelectorAll('.m-gallery__thumb');
        thumbs.forEach(function (t, i) {
            t.classList.toggle('m-gallery__thumb--active', i === currentIndex);
        });
        // Scroll active thumb into view
        if (thumbs[currentIndex]) {
            thumbs[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        }
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

    // Events
    popupClose.addEventListener('click', closePopup);
    popup.addEventListener('click', function (e) { if (e.target === popup) closePopup(); });

    galleryPrev.addEventListener('click', function (e) {
        e.stopPropagation();
        goToPhoto(currentIndex - 1);
    });

    galleryNext.addEventListener('click', function (e) {
        e.stopPropagation();
        goToPhoto(currentIndex + 1);
    });

    document.addEventListener('keydown', function (e) {
        if (!popup.classList.contains('m-popup--active')) return;
        if (e.key === 'Escape') closePopup();
        if (e.key === 'ArrowLeft') goToPhoto(currentIndex - 1);
        if (e.key === 'ArrowRight') goToPhoto(currentIndex + 1);
    });

    // Touch swipe on main image
    var touchX = 0;
    galleryMain.addEventListener('touchstart', function (e) {
        touchX = e.changedTouches[0].screenX;
    }, { passive: true });

    galleryMain.addEventListener('touchend', function (e) {
        var diff = touchX - e.changedTouches[0].screenX;
        if (Math.abs(diff) > 50) {
            goToPhoto(diff > 0 ? currentIndex + 1 : currentIndex - 1);
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
