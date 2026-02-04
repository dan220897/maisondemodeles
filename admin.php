<?php
session_start();
require_once __DIR__ . '/inc/init.php';
require_once __DIR__ . '/inc/functions.php';

$isAdmin = !empty($_SESSION['admin']);
$brandName = getSetting($pdo, 'brand_name');
$heroText = getSetting($pdo, 'hero_text');
$pinCode = getSetting($pdo, 'pin_code');
$children = $isAdmin ? getAllChildren($pdo) : [];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ — <?= e($brandName) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/models.css">
</head>
<body class="adm-body">

    <!-- PIN Lock -->
    <div class="pin-screen <?= $isAdmin ? 'pin-screen--hidden' : '' ?>" id="pinScreen">
        <div class="pin-box">
            <div class="pin-box__logo"><?= e($brandName) ?></div>
            <p class="pin-box__label">Введите пин-код</p>
            <div class="pin-box__dots" id="pinDots">
                <span class="pin-dot"></span>
                <span class="pin-dot"></span>
                <span class="pin-dot"></span>
                <span class="pin-dot"></span>
            </div>
            <div class="pin-box__error" id="pinError"></div>
            <div class="pin-box__pad" id="pinPad">
                <button class="pin-btn" data-num="1">1</button>
                <button class="pin-btn" data-num="2">2</button>
                <button class="pin-btn" data-num="3">3</button>
                <button class="pin-btn" data-num="4">4</button>
                <button class="pin-btn" data-num="5">5</button>
                <button class="pin-btn" data-num="6">6</button>
                <button class="pin-btn" data-num="7">7</button>
                <button class="pin-btn" data-num="8">8</button>
                <button class="pin-btn" data-num="9">9</button>
                <button class="pin-btn pin-btn--empty"></button>
                <button class="pin-btn" data-num="0">0</button>
                <button class="pin-btn pin-btn--del" id="pinDel">&#9003;</button>
            </div>
        </div>
    </div>

    <!-- Admin Panel -->
    <div class="adm <?= $isAdmin ? '' : 'adm--hidden' ?>" id="adminPanel">
        <header class="adm__header">
            <a href="models.php" class="adm__back">&larr; На сайт</a>
            <h1 class="adm__title">Панель управления</h1>
            <button class="adm__logout" id="logoutBtn">Выйти</button>
        </header>

        <!-- Settings -->
        <section class="adm__section">
            <h2 class="adm__section-title">Настройки</h2>
            <form class="adm__form" id="settingsForm">
                <div class="adm-form-group">
                    <label class="adm-label">Название бренда</label>
                    <input type="text" name="brand_name" class="adm-input" value="<?= e($brandName) ?>">
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Текст на странице моделей</label>
                    <input type="text" name="hero_text" class="adm-input" value="<?= e($heroText) ?>">
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Пин-код (4 цифры)</label>
                    <input type="text" name="pin_code" class="adm-input" value="<?= e($pinCode) ?>" maxlength="4" pattern="\d{4}">
                </div>
                <button type="submit" class="adm-btn adm-btn--primary">Сохранить настройки</button>
            </form>
        </section>

        <!-- Add Child -->
        <section class="adm__section">
            <h2 class="adm__section-title">Добавить модель</h2>
            <form class="adm__form" id="addChildForm" enctype="multipart/form-data">
                <div class="adm-form-row">
                    <div class="adm-form-group">
                        <label class="adm-label">Имя *</label>
                        <input type="text" name="name" class="adm-input" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Возраст</label>
                        <input type="number" name="age" class="adm-input" min="1" max="18">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Рост (см) *</label>
                        <input type="number" name="height" class="adm-input" min="50" max="200" required>
                    </div>
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Параметры</label>
                    <input type="text" name="params" class="adm-input" placeholder="Обхват груди, талия, обувь...">
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Фотографии</label>
                    <div class="adm-file-upload" id="fileUpload">
                        <input type="file" name="photos[]" multiple accept="image/*" class="adm-file-upload__input" id="photoInput">
                        <div class="adm-file-upload__label">
                            <span class="adm-file-upload__icon">+</span>
                            <span>Выберите фото или перетащите сюда</span>
                        </div>
                        <div class="adm-file-upload__preview" id="photoPreview"></div>
                    </div>
                </div>
                <button type="submit" class="adm-btn adm-btn--primary">Добавить модель</button>
            </form>
        </section>

        <!-- List -->
        <section class="adm__section">
            <h2 class="adm__section-title">Модели</h2>
            <div class="adm__list" id="childrenList">
                <?php if (empty($children)): ?>
                    <p class="adm__empty">Пока нет моделей. Добавьте первую!</p>
                <?php else: ?>
                    <?php foreach ($children as $child): ?>
                        <div class="adm-child" data-id="<?= $child['id'] ?>">
                            <div class="adm-child__header">
                                <div class="adm-child__order">
                                    <button class="adm-order-btn" onclick="moveChild(<?= $child['id'] ?>, 'up')" title="Вверх">&#9650;</button>
                                    <button class="adm-order-btn" onclick="moveChild(<?= $child['id'] ?>, 'down')" title="Вниз">&#9660;</button>
                                </div>
                                <div class="adm-child__info">
                                    <h3><?= e($child['name']) ?></h3>
                                    <span><?= (int)$child['age'] ?> лет, <?= (int)$child['height'] ?> см</span>
                                    <?php if ($child['params']): ?>
                                        <span class="adm-child__params"><?= e($child['params']) ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="adm-child__actions">
                                    <button class="adm-btn adm-btn--small adm-btn--edit" onclick="editChild(<?= $child['id'] ?>)">Изменить</button>
                                    <button class="adm-btn adm-btn--small adm-btn--danger" onclick="deleteChild(<?= $child['id'] ?>)">Удалить</button>
                                </div>
                            </div>
                            <div class="adm-child__photos">
                                <?php foreach ($child['photos'] as $photo): ?>
                                    <div class="adm-thumb <?= $photo['is_main'] ? 'adm-thumb--main' : '' ?>">
                                        <img src="uploads/<?= e($photo['filename']) ?>" alt="">
                                        <div class="adm-thumb__actions">
                                            <button class="adm-thumb__btn" onclick="setMainPhoto(<?= $photo['id'] ?>, <?= $child['id'] ?>)" title="Главное фото">&#9733;</button>
                                            <button class="adm-thumb__btn adm-thumb__btn--del" onclick="deletePhoto(<?= $photo['id'] ?>)" title="Удалить">&times;</button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <label class="adm-thumb adm-thumb--add">
                                    <input type="file" multiple accept="image/*" onchange="addPhotos(<?= $child['id'] ?>, this)" hidden>
                                    <span>+</span>
                                </label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </div>

    <!-- Edit Modal -->
    <div class="adm-modal" id="editModal">
        <div class="adm-modal__inner">
            <button class="adm-modal__close" onclick="closeEditModal()">&times;</button>
            <h2>Редактировать модель</h2>
            <form id="editChildForm">
                <input type="hidden" name="id" id="editId">
                <div class="adm-form-row">
                    <div class="adm-form-group">
                        <label class="adm-label">Имя</label>
                        <input type="text" name="name" id="editName" class="adm-input" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Возраст</label>
                        <input type="number" name="age" id="editAge" class="adm-input">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Рост (см)</label>
                        <input type="number" name="height" id="editHeight" class="adm-input" required>
                    </div>
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Параметры</label>
                    <input type="text" name="params" id="editParams" class="adm-input">
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Добавить фото</label>
                    <input type="file" name="photos[]" multiple accept="image/*" class="adm-input">
                </div>
                <button type="submit" class="adm-btn adm-btn--primary">Сохранить</button>
            </form>
        </div>
    </div>

    <script>
        var IS_ADMIN = <?= $isAdmin ? 'true' : 'false' ?>;
    </script>
    <script src="js/admin.js"></script>
</body>
</html>
