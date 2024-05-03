<?php
session_start();

// Подключение к базе данных
$pdo = new PDO('mysql:host=localhost;dbname=mods', 'root', '');

// Проверяем, есть ли активная сессия
if (isset($_SESSION['user']['id'])) {
    // Если есть, загружаем данные пользователя из базы данных
    $userId = $_SESSION['user']['id'];
    $statement = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $statement->execute(array(':id' => $userId));
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $user;
}
?>
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "root", "", "mods");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>
<body>
<header class="header">
    <div class="header__container container">
        <?php if (empty($_SESSION['user']['background'])): ?>
        <div class="header__background-user">
            <?php elseif (empty($_SESSION['user']['background'])): ?>
            <div class="header__background-user">
                <?php else: ?>
                <div class="header__background-user" style='background: url("backgrounds/<?php echo $_SESSION['user']['background'] . '?' . time(); ?>") no-repeat; background-size: cover;background-position:center;' >
                    <?php endif; ?>
            <div class="header__flex">
                <a href="#" class="header__logo-link">
                    <img src="images/logo.png" alt="логотип" class="header__logo">
                </a>
                <nav class="header__menu">
                    <ul class="header__menu-list">
                        <li class="header__menu-item"><a href="#">главная</a></li>
                        <li class="header__menu-item"><a href="mods.php">моды</a></li>
                        <li class="header__menu-item"><a href="#">карты</a></li>
                        <li class="header__menu-item"><a href="#">сборки</a></li>
                        <li class="header__menu-item"><a href="#">ресурспаки</a></li>
                        <li class="header__menu-item"><a href="#">статьи</a></li>
                        <li class="header__menu-item"><a href="#">ещё</a></li>
                    </ul>
                </nav>
                <?php if (empty($_SESSION['user']['photo'])): ?>
                <div class="header__account-grad">
                    <div class="header__account" id="header__account">
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($_SESSION['user']['photo'])): ?>
                    <div class="header__account-grad">
                        <div class="header__account" style='background: url("avatars/<?php echo $_SESSION['user']['photo']; ?>") no-repeat; background-size: 100% 100%'id="header__account">
                        </div>
                        <?php endif; ?>
                    <nav class="header__account-menu" id="header__account-menu">
                        <ul class="header__account-menu-list">
                            <li class="header__account-menu-item-name">
                                <p class="header__user-name"><?= $_SESSION['user']['name'] ?></p>
                            </li>
                            <li class="header__account-menu-item" id="edit__profile">
                                <div class="header__account-menu-item-plus"></div>
                                <a href="#">Добавить проект</a>
                            </li>
                            <li class="header__account-menu-item" id="edit__profile">
                                <div class="header__account-menu-item-nick"></div>
                                <a href="cabinet.php">Аккаунт</a>
                            </li>
                            <li class="header__account-menu-item">
                                <div class="header__account-menu-item-projects"></div>
                                <a href="cabinet-projects.php">Проекты</a>
                            </li>
                            <li class="header__account-menu-item">
                                <div class="header__account-menu-item-like"></div>
                                <a href="#">Избранное</a>
                            </li>
                            <li class="header__account-menu-item">
                                <div class="header__account-menu-item-organizations"></div>
                                <a href="#">Организации</a>
                            </li>
                            <li class="header__account-menu-item">
                                <div class="header__account-menu-item-settings"></div>
                                <a href="cabinet-settings.php">Настройки</a>
                            </li>
                            <li class="header__account-menu-item-exit">
                                <a href="logout.php">Выход</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <? if (!empty($_SESSION['user']['name'])) { ?>
                    <div class="header__menu-icons-flex">
                        <div class="header__account_mob" id="header__account2">
                            <nav class="header__account-menu" id="header__account-menu2">
                                <ul class="header__account-menu-list">
                                    <li class="header__account-menu-item-name">
                                        <p class="header__user-name"><?= $_SESSION['user']['name'] ?></p>
                                    </li>
                                    <li class="header__account-menu-item" id="edit__profile">
                                        <div class="header__account-menu-item-plus"></div>
                                        <a href="#">Добавить проект</a>
                                    </li>
                                    <li class="header__account-menu-item" id="edit__profile">
                                        <div class="header__account-menu-item-nick"></div>
                                        <a href="cabinet.php">Аккаунт</a>
                                    </li>
                                    <li class="header__account-menu-item">
                                        <div class="header__account-menu-item-projects"></div>
                                        <a href="cabinet-projects.php">Проекты</a>
                                    </li>
                                    <li class="header__account-menu-item">
                                        <div class="header__account-menu-item-like"></div>
                                        <a href="#">Избранное</a>
                                    </li>
                                    <li class="header__account-menu-item">
                                        <div class="header__account-menu-item-organizations"></div>
                                        <a href="#">Организации</a>
                                    </li>
                                    <li class="header__account-menu-item">
                                        <div class="header__account-menu-item-settings"></div>
                                        <a href="cabinet-settings.php">Настройки</a>
                                    </li>
                                    <li class="header__account-menu-item-exit">
                                        <a href="logout.php">Выход</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header__menu-icons">
                            <div class="header__menu-icon">
                                <span></span>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
            <div class="header__background-change">
                <div class="header__background-change-icon"></div>
            </div>
        </div>
        <!--FLEX-profile-->
        <div class="header__user-flex-profile">
            <!--USER_INFO-->
            <div class="header__user-info">
                <?php if (empty($_SESSION['user']['photo'])): ?>
                    <div class="header__user-photo-grad">
                        <div class="header__user-photo">
                            <div class="header__user-photo-change">
                                <div class="header__user-photo-change-icon">

                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif (empty($_SESSION['user']['photo'])): ?>
                    <div class="header__user-photo-grad">
                        <div class="header__user-photo">
                            <div class="header__user-photo-change">
                                <div class="header__user-photo-change-icon">

                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="header__user-photo-grad">
                        <div class="header__user-photo"
                             style='background: url("avatars/<?php echo $_SESSION['user']['photo'] . '?' . time(); ?>") no-repeat; background-size: 100% 100%'>
                            <div class="header__user-photo-change">
                                <div class="header__user-photo-change-icon">

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="header__user-flex">
                    <div class="header__user-name-div">
                        <div class="header__user-name-status-flex">
                            <p class="header__user-name"><?= $_SESSION['user']['name'] ?></p>
                            <div class="header__user-status"></div>
                        </div>
                    </div>
                    <div class="header__user-statistic">
                        <div class="header__user-statistic-flex">
                            <div class="header__user-statistic-text-flex">
                                <h2 class="header__user-statistic-title">
                                    <?= $_SESSION['user']['subscribes'] ?>
                                </h2>
                                <p class="header__user-statistic-text">
                                    Подписки
                                </p>
                            </div>
                            <div class="header__user-statistic-text-flex">
                                <h2 class="header__user-statistic-title">
                                    <?= $_SESSION['user']['subscribers'] ?>
                                </h2>
                                <p class="header__user-statistic-text">Подписчики</p>
                            </div>
                            <div class="header__user-statistic-text-flex">
                                <h2 class="header__user-statistic-title"><?= $_SESSION['user']['likes'] ?></h2>
                                <p class="header__user-statistic-text">Нравится</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--USER_INFO-->
            <div class="header__user-flex-edit">
                <div class="header__user-add-mod">
                    <div class="header__user-add-mod-bg">
                        <div class="header__user-add-mod-plus"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--FLEX-profile-->
    </div>
</header>
<?php include 'modal_change_photo.php'; ?>
<?php include 'modal_new_project.php'; ?>
<?php include 'modal_change_background.php'; ?>
<main class="main">
    <div class="menu-profile">
        <div class="menu-profile__container container">
            <div class="menu-profile__body">
                <div class="menu-profile__container">
                    <div class="menu-profile__wrapper">
                <div class="menu-profile__body-flex">
                    <a href="cabinet.php">
                        <div class="menu-profile__item">
                            <div class="menu-profile__item-icon item-icon__information"></div>
                            <p class="menu-profile__item-text">Информация</p>
                        </div>
                    </a>

                    <a href="cabinet-projects.php">
                        <div class="menu-profile__item">
                            <div class="menu-profile__item-icon item-icon__projects"></div>
                            <p class="menu-profile__item-text">Проекты</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="menu-profile__item">
                            <div class="menu-profile__item-icon item-icon__like"></div>
                            <p class="menu-profile__item-text">Избраное</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="menu-profile__item">
                            <div class="menu-profile__item-icon item-icon__organizations"></div>
                            <p class="menu-profile__item-text">Организации</p>
                        </div>
                    </a>
                    <a href="cabinet-settings.php">
                        <div class="menu-profile__item">
                            <div class="menu-profile__item-icon item-icon__settings"></div>
                            <p class="menu-profile__item-text">Настройка</p>
                        </div>
                    </a>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="edit-profile">
        <div class="edit-profile__container container" id="edit-profile__display">
            <h2 class="edit-profile__title">Редактирование профиля</h2>
            <div class="edit-profile__list-forms">
                <form class="edit-profile__form" action="#edit-name-f" method="post">
                    <h2 class="edit-profile__form-title"></h2>
                    <input type="text" class="edit-profile__input-text" name="edit-name" id="edit-name"
                           placeholder="Изменить имя">
                    <input type="submit" value="Сохранить" id="edit-profile-save" class="edit-profile__form-submit">
                </form>
                <form class="edit-profile__form" action="#edit-mail-f" method="post">
                    <h2 class="edit-profile__form-title"></h2>
                    <input type="text" class="edit-profile__input-text" name="edit-mail" id="edit-mail"
                           placeholder="Изменить адрес почты">
                    <input type="submit" value="Сохранить" id="edit-profile-save" class="edit-profile__form-submit">
                </form>
                <form class="edit-profile__form" action="#edit-pass-f" method="post">
                    <h2 class="edit-profile__form-title"></h2>
                    <input type="password" class="edit-profile__input-text" name="edit-pass" id="edit-pass"
                           placeholder="Изменить пароль">
                    <input type="submit" value="Сохранить" id="edit-profile-save" class="edit-profile__form-submit">
                </form>
            </div>
        </div>
    </section>
    <section class="edit-profile-submit" id="edit-profile-submit">
        <div class="edit-profile-submit__container container">
            <div class="edit-profile-submit__submit-window">
                <h2 class="edit-profile-submit__title">Подтвердите, что это вы.</h2>
                <div class="edit-profile-submit__close-window">
                    <div class="edit-profile-submit__close-window-cross"></div>
                </div>
                <form action="edit-profile.php" method="post" name="edit-profile-form" id="edit-profile-form"
                      class="edit-profile__form-submit-submit">
                    <div class="edit-profile__login-form-flex">
                        <div class="edit-profile__login-form">
                            <div class="edit-profile-input-text-inner-flex">

                                <input class="edit-profile-input-text" type="password" name="pass" id="pass_reg"
                                       placeholder="Пароль">
                                <div class="edit-profile-input-text-lock"></div>
                                <div class="edit-profile-input-text-eye" id="eye_pass_reg"></div>
                                <div class="edit-profile-input-text-eye-c" id="eye_c_pass_reg"></div>
                            </div>

                            <div class="edit-profile-input-text-inner-flex">
                                <input class="edit-profile-input-text submit" type="password" name="pass-confirm"
                                       id="pass_reg_confirm" placeholder="Подтверждение пароля">
                                <div class="edit-profile-input-text-lock"></div>
                                <div class="edit-profile-input-text-eye" id="eye_pass_reg_confirm"></div>
                                <div class="edit-profile-input-text-eye-c" id="eye_c_pass_reg_confirm"></div>
                            </div>
                            <input type="hidden" class="edit-profile__hidden-input" name="edit-mail-f" id="edit-mail-f">
                            <input type="hidden" class="edit-profile__hidden-input" name="edit-name-f" id="edit-name-f">
                            <input type="hidden" class="edit-profile__hidden-input" name="edit-pass-f" id="edit-pass-f">
                        </div>
                    </div>
                    <div class="edit-profile-submit__submit">
                        <div class="login__button-enter-border">
                            <input type="submit" id="register" name="register" class="login__button-enter"
                                   value="Сохранить изменения">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
    session_start();
    if (isset($_SESSION['alert_message'])) {
        echo "<script>alert('" . $_SESSION['alert_message'] . "');</script>";
        unset($_SESSION['alert_message']); // Очистка сообщения после вывода
    }
    ?>
</main>
<script src="js/modal_new_project.js"></script>
<script src="js/edit_profile.js"></script>
<script src="js/menu_profile_carusel.js"></script>
<script src="js/eye_reg.js"></script>
<script src="js/eye_confirm.js"></script>
<script src="js/change_photo_page_window.js"></script>
<script src="js/change_background_page_window.js"></script>
<script src="js/change_user_background.js"></script>
<script src="js/change_user_photo_icon.js"></script>
<script src="js/script.js"></script>
</body>
</html>