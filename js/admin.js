document.addEventListener('DOMContentLoaded', function () {

    // === PIN ===
    var pinScreen = document.getElementById('pinScreen');
    var adminPanel = document.getElementById('adminPanel');
    var pinDots = document.getElementById('pinDots') ? document.getElementById('pinDots').querySelectorAll('.pin-dot') : [];
    var pinError = document.getElementById('pinError');
    var pinCode = '';

    if (!IS_ADMIN && pinScreen) {
        document.getElementById('pinPad').addEventListener('click', function (e) {
            var btn = e.target.closest('.pin-btn');
            if (!btn) return;
            var num = btn.dataset.num;
            if (num !== undefined) {
                if (pinCode.length < 4) {
                    pinCode += num;
                    updatePinDots();
                    if (pinCode.length === 4) checkPin(pinCode);
                }
            }
        });

        document.getElementById('pinDel').addEventListener('click', function () {
            if (pinCode.length > 0) {
                pinCode = pinCode.slice(0, -1);
                updatePinDots();
                pinError.textContent = '';
            }
        });
    }

    function updatePinDots() {
        pinDots.forEach(function (dot, i) {
            dot.classList.toggle('pin-dot--filled', i < pinCode.length);
            dot.classList.remove('pin-dot--error');
        });
    }

    function checkPin(code) {
        var fd = new FormData();
        fd.append('action', 'check_pin');
        fd.append('pin', code);

        fetch('api.php', { method: 'POST', body: fd })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.success) {
                    pinScreen.style.opacity = '0';
                    setTimeout(function () {
                        pinScreen.classList.add('pin-screen--hidden');
                        adminPanel.classList.remove('adm--hidden');
                        location.reload();
                    }, 400);
                } else {
                    pinDots.forEach(function (d) { d.classList.add('pin-dot--error'); });
                    pinError.textContent = data.error || 'Неверный пин-код';
                    setTimeout(function () { pinCode = ''; updatePinDots(); }, 800);
                }
            });
    }

    // === Logout ===
    var logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function () {
            var fd = new FormData();
            fd.append('action', 'logout');
            fetch('api.php', { method: 'POST', body: fd }).then(function () { location.reload(); });
        });
    }

    // === Settings ===
    var settingsForm = document.getElementById('settingsForm');
    if (settingsForm) {
        settingsForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var fd = new FormData(settingsForm);
            fd.append('action', 'save_settings');
            fetch('api.php', { method: 'POST', body: fd })
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    showToast(data.success ? 'Настройки сохранены' : (data.error || 'Ошибка'), !data.success);
                });
        });
    }

    // === Add Child ===
    var addForm = document.getElementById('addChildForm');
    if (addForm) {
        addForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var fd = new FormData(addForm);
            fd.append('action', 'add_child');
            fetch('api.php', { method: 'POST', body: fd })
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    if (data.success) {
                        showToast('Модель добавлена');
                        setTimeout(function () { location.reload(); }, 800);
                    } else {
                        showToast(data.error || 'Ошибка', true);
                    }
                });
        });
    }

    // === Photo preview ===
    var photoInput = document.getElementById('photoInput');
    var photoPreview = document.getElementById('photoPreview');
    if (photoInput && photoPreview) {
        photoInput.addEventListener('change', function () {
            photoPreview.innerHTML = '';
            for (var i = 0; i < photoInput.files.length; i++) {
                var img = document.createElement('img');
                img.className = 'adm-file-upload__thumb';
                img.src = URL.createObjectURL(photoInput.files[i]);
                photoPreview.appendChild(img);
            }
        });
    }

    // === Toast ===
    function showToast(msg, isError) {
        var old = document.querySelector('.m-toast');
        if (old) old.remove();
        var t = document.createElement('div');
        t.className = 'm-toast' + (isError ? ' m-toast--error' : '');
        t.textContent = msg;
        document.body.appendChild(t);
        requestAnimationFrame(function () { t.classList.add('m-toast--visible'); });
        setTimeout(function () {
            t.classList.remove('m-toast--visible');
            setTimeout(function () { t.remove(); }, 400);
        }, 2500);
    }

    window.showToast = showToast;

    // === Delete Child ===
    window.deleteChild = function (id) {
        if (!confirm('Удалить эту модель и все её фотографии?')) return;
        var fd = new FormData();
        fd.append('action', 'delete_child');
        fd.append('id', id);
        fetch('api.php', { method: 'POST', body: fd })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.success) {
                    showToast('Модель удалена');
                    var el = document.querySelector('.adm-child[data-id="' + id + '"]');
                    if (el) el.remove();
                }
            });
    };

    // === Delete Photo ===
    window.deletePhoto = function (id) {
        if (!confirm('Удалить фото?')) return;
        var fd = new FormData();
        fd.append('action', 'delete_photo');
        fd.append('id', id);
        fetch('api.php', { method: 'POST', body: fd })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.success) { showToast('Фото удалено'); location.reload(); }
            });
    };

    // === Set Main Photo ===
    window.setMainPhoto = function (photoId, childId) {
        var fd = new FormData();
        fd.append('action', 'set_main_photo');
        fd.append('photo_id', photoId);
        fd.append('child_id', childId);
        fetch('api.php', { method: 'POST', body: fd })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.success) { showToast('Главное фото обновлено'); location.reload(); }
            });
    };

    // === Add Photos ===
    window.addPhotos = function (childId, input) {
        if (!input.files.length) return;
        var fd = new FormData();
        fd.append('action', 'update_child');
        fd.append('id', childId);
        var card = document.querySelector('.adm-child[data-id="' + childId + '"]');
        fd.append('name', card.querySelector('h3').textContent);
        fd.append('age', '0');
        fd.append('height', '0');
        for (var i = 0; i < input.files.length; i++) {
            fd.append('photos[]', input.files[i]);
        }
        fetch('api.php', { method: 'POST', body: fd })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.success) { showToast('Фото добавлены'); location.reload(); }
            });
    };

    // === Reorder Child ===
    window.moveChild = function (id, direction) {
        var fd = new FormData();
        fd.append('action', 'reorder_child');
        fd.append('id', id);
        fd.append('direction', direction);
        fetch('api.php', { method: 'POST', body: fd })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.success) {
                    // Swap DOM elements
                    var card = document.querySelector('.adm-child[data-id="' + id + '"]');
                    if (!card) return;
                    if (direction === 'up' && card.previousElementSibling) {
                        card.parentNode.insertBefore(card, card.previousElementSibling);
                    } else if (direction === 'down' && card.nextElementSibling) {
                        card.parentNode.insertBefore(card.nextElementSibling, card);
                    }
                }
            });
    };

    // === Edit Child ===
    var editModal = document.getElementById('editModal');

    window.editChild = function (id) {
        fetch('api.php?action=get_child&id=' + id)
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (!data.success) return;
                var c = data.child;
                document.getElementById('editId').value = c.id;
                document.getElementById('editName').value = c.name;
                document.getElementById('editAge').value = c.age;
                document.getElementById('editHeight').value = c.height;
                document.getElementById('editParams').value = c.params || '';
                editModal.classList.add('adm-modal--active');
            });
    };

    window.closeEditModal = function () {
        editModal.classList.remove('adm-modal--active');
    };

    editModal.addEventListener('click', function (e) {
        if (e.target === editModal) closeEditModal();
    });

    var editForm = document.getElementById('editChildForm');
    if (editForm) {
        editForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var fd = new FormData(editForm);
            fd.append('action', 'update_child');
            fetch('api.php', { method: 'POST', body: fd })
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    if (data.success) {
                        showToast('Модель обновлена');
                        setTimeout(function () { location.reload(); }, 800);
                    } else {
                        showToast(data.error || 'Ошибка', true);
                    }
                });
        });
    }
});
