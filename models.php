<?php
require_once __DIR__ . '/inc/init.php';
require_once __DIR__ . '/inc/functions.php';

$brandName = getSetting($pdo, 'brand_name');
$heroText = getSetting($pdo, 'hero_text');
$children = getAllChildren($pdo);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наши модели — <?= e($brandName) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/models.css">
</head>
<body>
    

    <!-- Hero -->
    <section class="models-hero">
        <div class="models-hero__inner">
            <div class="models-hero__label">Модельное агентство</div>
            <h1 class="models-hero__brand"><?= e($brandName) ?></h1>
            <p class="models-hero__text"><?= e($heroText) ?></p>
        </div>
    </section>

    <!-- Models Grid -->
    <section class="models-section">
        <div class="models-container">
            <?php if (empty($children)): ?>
                <div class="models-empty">
                    <p>Скоро здесь появятся наши модели</p>
                </div>
            <?php else: ?>
                <div class="models-grid">
                    <?php foreach ($children as $child): ?>
                        <?php
                            $mainPhoto = null;
                            foreach ($child['photos'] as $p) {
                                if ($p['is_main']) { $mainPhoto = $p; break; }
                            }
                            if (!$mainPhoto && !empty($child['photos'])) {
                                $mainPhoto = $child['photos'][0];
                            }
                        ?>
                        <div class="m-card" data-child-id="<?= $child['id'] ?>">
                            <div class="m-card__info">
                                <h2 class="m-card__name"><?= e($child['name']) ?></h2>
                                <div class="m-card__details">
                                    <?php if (!empty($child['age'])): ?>
                                    <div class="m-card__row">
                                        <span class="m-card__label">Возраст</span>
                                        <span class="m-card__value"><?= (int)$child['age'] ?> лет</span>
                                    </div>
                                    <?php endif; ?>
                                    <div class="m-card__row">
                                        <span class="m-card__label">Рост</span>
                                        <span class="m-card__value"><?= (int)$child['height'] ?> см</span>
                                    </div>
                                    <?php if (!empty($child['params'])): ?>
                                    <div class="m-card__row">
                                        <span class="m-card__label">Параметры</span>
                                        <span class="m-card__value"><?= e($child['params']) ?></span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="m-card__photo">
                                <?php if ($mainPhoto): ?>
                                    <img src="uploads/<?= e($mainPhoto['filename']) ?>" alt="<?= e($child['name']) ?>" loading="lazy">
                                <?php else: ?>
                                    <div class="m-card__nophoto">
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Popup Gallery -->
    <div class="m-popup" id="mPopup">
        <button class="m-popup__close" id="mPopupClose">&times;</button>
        <div class="m-popup__content">
            <div class="m-popup__info">
                <h2 class="m-popup__name" id="mPopupName"></h2>
                <div class="m-popup__details" id="mPopupDetails"></div>
            </div>
            <div class="m-popup__gallery">
                <div class="m-gallery__main">
                    <img id="mGalleryMain" src="" alt="">
                    <button class="m-gallery__nav m-gallery__nav--prev" id="mGalleryPrev">&#8249;</button>
                    <button class="m-gallery__nav m-gallery__nav--next" id="mGalleryNext">&#8250;</button>
                </div>
                <div class="m-gallery__thumbs" id="mGalleryThumbs"></div>
            </div>
        </div>
    </div>

    <script>
        window.__children = <?= json_encode($children, JSON_UNESCAPED_UNICODE) ?>;
    </script>
    <script src="js/models.js"></script>
</body>
</html>
