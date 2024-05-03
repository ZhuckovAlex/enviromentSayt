<div class="change-photo-page">
    <div class="change-photo-page__container container">
        <div class="change-photo-page__window">
            <h2 class="change-photo-page__window-title">Фото профиля</h2>
            <p class="change-photo-page__window-text-preview">
                Ваше фото профиля отображается в вашем профиле, ваших комментариях и других местах на платформе.
            </p>
            <div class="change-photo-page__window-text-flex">
                <?php if (empty($_SESSION['user']['photo'])): ?>
                    <div class="change-photo-page__window-photo-grad">
                        <div class="change-photo-page__window-photo"></div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['user']['photo'])): ?>
                    <div class="change-photo-page__window-photo-grad-photo">
                        <div class="change-photo-page__window-photo"
                             style='background: url("avatars/<?php echo $_SESSION['user']['photo'] . '?' . time(); ?>") no-repeat; background-size: 100% 100%'></div>
                    </div>
                <?php endif; ?>
                <div class="change-photo-page__window-text">
                    Рекомендуем загружать изображение размером не менее 64 х 64 пикселей в формате PNG/JPG.
                    Обратите внимание, что анимированные картинки загружать нельзя.
                    Размер файла не должен превышать 6 МБ. Изображение не должно содержать контент, нарушающий авторские
                    права, и откровенный контент.
                </div>
            </div>
            <div class="change-photo-page__window-close-div">
                <div class="change-photo-page__window-close-jpg"></div>
            </div>
            <div class="change-photo-page__window-download-flex">
                <div class="change-photo-page__window-download-button">
                    <div class="change-photo-page__window-download-button-gray">
                        <h3 class="change-photo-page__window-download-text">Загрузить</h3>
                    </div>
                </div>
                <form id="uploadForm" action="edit_photo_profile.php" method="post" enctype="multipart/form-data"
                      style="display: none;">
                    <!-- Добавляем атрибут accept для выбора только файлов формата jpg и png -->
                    <input type="file" name="photo" id="photo" accept="image/jpeg, image/png" max="6291456"/>
                </form>
                <script>
                    document.querySelector('.change-photo-page__window-download-button').addEventListener('click', function () {
                        document.getElementById('photo').click();
                    });

                    document.getElementById('photo').addEventListener('change', function () {
                        document.getElementById('uploadForm').submit();
                    });
                </script>
                <?php if (empty($_SESSION['user']['photo'])): ?>
                    <div class="change-photo-page__window-download-blocked-button">Удалить</div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['user']['photo'])): ?>
                    <div class="change-photo-page__window-download-delete-grad">
                        <div class="change-photo-page__window-download-delete">Удалить</div>
                    </div>
                <?php endif; ?>
                <script>
                    document.querySelector('.change-photo-page__window-download-delete').addEventListener('click', function () {
                        // Отправляем запрос на сервер
                        fetch('delete_photo.php', {
                            method: 'POST',
                            body: JSON.stringify({delete: true}),
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Если удаление прошло успешно, обновляем страницу
                                    window.location.reload();
                                } else {
                                    console.error('Ошибка при удалении фото:', data.error);
                                }
                            })
                            .catch(error => {
                                console.error('Ошибка при удалении фото:', error);
                            });
                    });
                </script>
            </div>
        </div>
    </div>
</div>