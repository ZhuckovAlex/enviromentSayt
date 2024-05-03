<div class="change-background-page">
    <div class="change-background-page__container container">
        <div class="change-background-page__window">
            <h2 class="change-background-page__window-title">Шапка профиля</h2>
            <p class="change-photo-page__window-text-preview">
                Изображение, находящееся в верхней части вашего профиля
            </p>
            <?php if (empty($_SESSION['user']['background'])): ?>
                <div class="change-background-page__window-photo-grad">
                    <div class="change-background-page__window-photo"></div>
                </div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['user']['background'])): ?>
                <div class="change-background-page__window-photo-grad">
                    <div class="change-background-page__window-photo"
                         style='background: url("backgrounds/<?php echo $_SESSION['user']['background'] . '?' . time(); ?>") no-repeat; background-size: cover;
                                 background-position: center;'></div>
                </div>
            <?php endif; ?>
            <div class="change-background-page__window-text">
                Рекомендуем загружать изображение размером не менее 1520 х 370 пикселей в формате PNG/jpg.
                Обратите внимание, что анимированные картинки загружать нельзя.
                Размер файла не должен превышать 8 МБ.
                Изображение не должно содержать контент, нарушающий авторские права, и откровенный контент.
            </div>
            <div class="change-background-page__window-close-div">
                <div class="change-background-page__window-close-jpg"></div>
            </div>
            <div class="change-background-page__window-download-flex">
                <div class="change-background-page__window-download-button">
                    <div class="change-background-page__window-download-button-gray">
                        <h3 class="change-background-page__window-download-text">Загрузить</h3>
                    </div>
                </div>
                <form id="uploadFormBg" action="edit_background_profile.php" method="post" enctype="multipart/form-data"
                      style="display: none;">
                    <!-- Добавляем атрибут accept для выбора только файлов формата jpg и png -->
                    <input type="file" name="background" id="background" accept="image/jpeg, image/png" max="6291456"/>
                </form>
                <script>
                    document.querySelector('.change-background-page__window-download-button').addEventListener('click', function () {
                        document.getElementById('background').click();
                    });

                    document.getElementById('background').addEventListener('change', function () {
                        document.getElementById('uploadFormBg').submit();
                    });
                </script>
                <?php if (empty($_SESSION['user']['background'])): ?>
                    <div class="change-background-page__window-download-blocked-button-grad">
                        <div class="change-background-page__window-download-blocked-button">Удалить</div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($_SESSION['user']['background'])): ?>
                    <div class="change-background-page__window-download-delete-grad">
                        <div class="change-background-page__window-download-delete">Удалить</div>
                    </div>
                <?php endif; ?>
                <script>
                    document.querySelector('.change-background-page__window-download-delete').addEventListener('click', function () {
                        // Отправляем запрос на сервер
                        fetch('delete_background.php', {
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