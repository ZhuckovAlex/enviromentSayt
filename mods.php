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

<div class="mods-list__mods-filter-burger">
    <div class="mods-list__mods-filter-burger-close">
        <div class="mods-list__mods-filter-burger-cross"></div>
    </div>
    <div class="mods-list__mob-flex">
        <h2 class="mods-list__label">Поиск</h2>
        <div class="mod-list__search-container_mob">
            <input type="text" class="mod-list__search" placeholder="По моду или автору">
            <div class="mod-list__search-img"></div>
        </div>
        <h2 class="mods-list__label">Сортировать по</h2>
        <select name="sorting_filter" id="sorting_filter" class="mods-list__select-sorting_mob">
            <option class="mods-list__option" value="Популярности">Популярности</option>
            <option class="mods-list__option" value="Имени">Имени</option>
            <option class="mods-list__option" value="Автору">Автору</option>
        </select>
        <h2 class="mods-list__mods-filter-downloads">Загрузчики</h2>
        <div class="mods-list__mods-filter-downloads-flex">

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="forge" id="forge"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="forge" class="mods-list__mods-filter-downloads-flex-title">Forge</label>
            </div>

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="fabric" id="fabric"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="fabric" class="mods-list__mods-filter-downloads-flex-title">Fabric</label>
            </div>

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="quilt" id="quilt"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="quilt" class="mods-list__mods-filter-downloads-flex-title">Quilt</label>
            </div>

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="neoforge" id="neoforge"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="neoforge" class="mods-list__mods-filter-downloads-flex-title">NeoForge</label>
            </div>

        </div>
        <h2 class="mods-list__label">Версия minecraft</h2>
        <select name="sorting_ver" id="sorting_ver" class="mods-list__select-sorting_mob">
            <option class="mods-list__option" value="">1.16.5</option>
            <option class="mods-list__option" value="">1.19.2</option>
            <option class="mods-list__option" value="">1.20.1</option>
        </select>
        <h2 class="mods-list__label">Категории</h2>
        <div class="mods-list__mods-filter-downloads-flex">

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="adventures" id="adventures"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="adventures" class="mods-list__mods-filter-downloads-flex-title">Приключение</label>
            </div>
            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="adventures" id="rpg"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="rpg" class="mods-list__mods-filter-downloads-flex-title">RPG</label>
            </div>
            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="adventures" id="magic"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="magic" class="mods-list__mods-filter-downloads-flex-title">Магия</label>
            </div>
            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="library" id="library"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="library" class="mods-list__mods-filter-downloads-flex-title">Библиотека</label>
            </div>
            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="adventures" id="industrial"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="industrial" class="mods-list__mods-filter-downloads-flex-title">Индустриальные</label>
            </div>
            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="library" id="interface"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="interface" class="mods-list__mods-filter-downloads-flex-title">Интерфейсы</label>
            </div>
            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="decoration" id="decoration"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="decoration" class="mods-list__mods-filter-downloads-flex-title">Оформление</label>
            </div>

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="optimization" id="optimization"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="optimization" class="mods-list__mods-filter-downloads-flex-title">Оптимизация</label>
            </div>

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="generation" id="generation"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="generation" class="mods-list__mods-filter-downloads-flex-title">Генерация мира</label>
            </div>

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="mobs" id="mobs"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="mobs" class="mods-list__mods-filter-downloads-flex-title">Мобы</label>
            </div>

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="utilities" id="utilities"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="utilities" class="mods-list__mods-filter-downloads-flex-title">Утилиты</label>
            </div>

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="communication" id="communication"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="communication" class="mods-list__mods-filter-downloads-flex-title">Общение</label>
            </div>
        </div>

        <h2 class="mods-list__label">Среда выполнения</h2>
        <div class="mods-list__mods-filter-downloads-flex">

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="client" id="client"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="client" class="mods-list__mods-filter-downloads-flex-title">Клиент</label>
            </div>

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="server" id="server"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="server" class="mods-list__mods-filter-downloads-flex-title">Сервер</label>
            </div>
        </div>
        <h2 class="mods-list__label">Показывать на странице</h2>
        <select name="sorting_ver" id="sorting_ver" class="mods-list__select-sorting_mob">
            <option class="mods-list__option" value="">5</option>
            <option class="mods-list__option" value="">10</option>
            <option class="mods-list__option" value="">15</option>
        </select>
        <h2 class="mods-list__label">Другое</h2>
        <div class="mods-list__mods-filter-downloads-flex">

            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="open_code" id="open_code"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="open_code" class="mods-list__mods-filter-downloads-flex-title">Открытый исходный код</label>
            </div>
            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="environment_studios" id="environment_studios"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="environment_studios" class="mods-list__mods-filter-downloads-flex-title">От Eniroment
                    Studios</label>
            </div>
            <div class="mods-list__mods-filter-downloads-flex-check">
                <input type="checkbox" name="environment_studios_partners" id="environment_studios_partners"
                       class="mods-list__mods-filter-downloads-flex-check-box">
                <label for="environment_studios_partners" class="mods-list__mods-filter-downloads-flex-title">От
                    партнёров
                    Eniroment Studios</label>
            </div>
        </div>
    </div>
</div>
<?php include 'modal_login_register.php'; ?>
<?php include 'modal_new_project.php'; ?>
<header class="header">
    <div class="header__container container">
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
            <? if (empty($_SESSION['user']['name'])) { ?>
                <div class="header__login-menu">
                    <div class="header__login" id="login">
                        Войти
                    </div>
                    <div class="header__menu-icons">
                        <div class="header__menu-icon">
                            <span></span>
                        </div>
                    </div>
                </div>
            <? } ?>
            <? if (!empty($_SESSION['user']['name'])) { ?>
            <?php if (empty($_SESSION['user']['photo'])): ?>
            <div class="header__account" id="header__account">
                <?php endif; ?>
                <?php if (!empty($_SESSION['user']['photo'])): ?>
                <div class="header__account" style='background: url("avatars/<?php echo $_SESSION['user']['photo']; ?>") no-repeat; background-size: 100% 100%' id="header__account" >
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
            <? } ?>
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
    </div>
</header>

<main class="main">
    <section class="mods-list">
        <div class="mods-list__container container">
            <div class="mods-list__flex-main-divs">
                <div class="mod__list-filter-burger-flex">
                    <input class="mod-list__filter-search" type="text" placeholder="Поиск">
                    <div class="mod-list__mod-list-filter-burger">
                        <div class="mod-list__mod-list-filter-img"></div>
                    </div>
                </div>
                <div class="mods-list__mods-list-mod-card">
                    <div class="mods-list__mods-card-flex">
                        <h1 class="mods-list__mods-card-name">
                            Keepers of the Stones II
                        </h1>
                        <img src="images/mods-card__img.png" alt="mods-card__img" class="mods-list__mods-card-img">
                    </div>
                    <div class="mods-list__mods-card-user">
                        <p class="mods-list__mods-card-user-date">
                            26.01.2024 от
                        </p>
                        <img src="images/mods-card__user-img.svg" alt="mods-card__user-img"
                             class="mods-list__mods-card-user-img">
                        <a href="#" class="mods-list__mods-card-user-link">
                            magicalalexey
                        </a>
                    </div>
                    <p class="mods-list__mods-card-text">
                        Keepers of the Stones II — мод, созданный как продолжение
                        оригинальной версии мода Keepers of the Stones. В котором были
                        улучшены системы прокачки и крафта,что сделало игру еще более
                        интересной.
                    </p>
                    <div class="mods-list__mods-card-footer">
                        <div class="mods-list__mods-card-footer-filter">
                            <p class="mods-list__mods-card-footer-text">
                                🛠️Forge,
                            </p>
                            <p class="mods-list__mods-card-footer-text">
                                ✅MC 1.20,
                            </p>
                            <p class="mods-list__mods-card-footer-text">
                                ☑️BETA.
                            </p>
                        </div>

                        <div class="mods-list__mods-card-footer-favorites-gap">
                            <a href="cabinet.php" class="mods-list__mods-card-footer-favorites-button">
                                <img src="images/mods-card__footer-download.svg" alt="mods-card__footer-favorites"
                                     class="mods-list__mods-card-footer-favorites-img">
                            </a>
                            <a href="#" class="mods-list__mods-card-footer-favorites-button">
                                <img src="images/mods-card__footer-favorites.svg" alt="mods-card__footer-favorites"
                                     class="mods-list__mods-card-footer-favorites-img">
                            </a>
                            <a href="#" class="mods-list__mods-card-footer-favorites-button">
                                <img src="images/mods-card__footer-like.svg" alt="mods-card__footer-like"
                                     class="mods-list__mods-card-footer-favorites-img">
                            </a>
                        </div>
                    </div>
                </div>
                <!--                Фильтр-->
                <div>
                    <div class="mods-list__mods-filter">
                        <h2 class="mods-list__label">Поиск</h2>
                        <div class="mod-list__search-container">
                            <input type="text" class="mod-list__search" placeholder="По моду или автору">
                            <div class="mod-list__search-img"></div>
                        </div>
                        <h2 class="mods-list__label">Сортировать по</h2>
                        <select name="sorting_filter" id="sorting_filter" class="mods-list__select-sorting">
                            <option class="mods-list__option" value="Популярности">Популярности</option>
                            <option class="mods-list__option" value="Имени">Имени</option>
                            <option class="mods-list__option" value="Автору">Автору</option>
                        </select>
                        <h2 class="mods-list__mods-filter-downloads">Загрузчики</h2>
                        <div class="mods-list__mods-filter-downloads-flex">

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="forge" id="forge"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="forge" class="mods-list__mods-filter-downloads-flex-title">Forge</label>
                            </div>

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="fabric" id="fabric"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="fabric" class="mods-list__mods-filter-downloads-flex-title">Fabric</label>
                            </div>

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="quilt" id="quilt"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="quilt" class="mods-list__mods-filter-downloads-flex-title">Quilt</label>
                            </div>

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="neoforge" id="neoforge"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="neoforge"
                                       class="mods-list__mods-filter-downloads-flex-title">NeoForge</label>
                            </div>

                        </div>
                        <h2 class="mods-list__label">Версия minecraft</h2>
                        <select name="sorting_ver" id="sorting_ver" class="mods-list__select-sorting">
                            <option class="mods-list__option" value="">1.16.5</option>
                            <option class="mods-list__option" value="">1.19.2</option>
                            <option class="mods-list__option" value="">1.20.1</option>
                        </select>
                        <h2 class="mods-list__label">Категории</h2>
                        <div class="mods-list__mods-filter-downloads-flex">

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="adventures" id="adventures"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="adventures"
                                       class="mods-list__mods-filter-downloads-flex-title">Приключение</label>
                            </div>
                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="adventures" id="rpg"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="rpg" class="mods-list__mods-filter-downloads-flex-title">RPG</label>
                            </div>
                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="adventures" id="magic"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="magic" class="mods-list__mods-filter-downloads-flex-title">Магия</label>
                            </div>
                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="library" id="library"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="library"
                                       class="mods-list__mods-filter-downloads-flex-title">Библиотека</label>
                            </div>
                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="adventures" id="industrial"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="industrial" class="mods-list__mods-filter-downloads-flex-title">Индустриальные</label>
                            </div>
                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="library" id="interface"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="interface"
                                       class="mods-list__mods-filter-downloads-flex-title">Интерфейсы</label>
                            </div>
                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="decoration" id="decoration"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="decoration"
                                       class="mods-list__mods-filter-downloads-flex-title">Оформление</label>
                            </div>

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="optimization" id="optimization"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="optimization" class="mods-list__mods-filter-downloads-flex-title">Оптимизация</label>
                            </div>

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="generation" id="generation"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="generation" class="mods-list__mods-filter-downloads-flex-title">Генерация
                                    мира</label>
                            </div>

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="mobs" id="mobs"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="mobs" class="mods-list__mods-filter-downloads-flex-title">Мобы</label>
                            </div>

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="utilities" id="utilities"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="utilities"
                                       class="mods-list__mods-filter-downloads-flex-title">Утилиты</label>
                            </div>

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="communication" id="communication"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="communication"
                                       class="mods-list__mods-filter-downloads-flex-title">Общение</label>
                            </div>

                        </div>
                        <h2 class="mods-list__label">Среда выполнения</h2>
                        <div class="mods-list__mods-filter-downloads-flex">

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="client" id="client"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="client" class="mods-list__mods-filter-downloads-flex-title">Клиент</label>
                            </div>

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="server" id="server"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="server" class="mods-list__mods-filter-downloads-flex-title">Сервер</label>
                            </div>
                        </div>
                        <h2 class="mods-list__label">Показывать на странице</h2>
                        <select name="sorting_ver" id="sorting_ver" class="mods-list__select-sorting">
                            <option class="mods-list__option" value="">5</option>
                            <option class="mods-list__option" value="">10</option>
                            <option class="mods-list__option" value="">15</option>
                        </select>
                        <h2 class="mods-list__label">Другое</h2>
                        <div class="mods-list__mods-filter-downloads-flex">

                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="open_code" id="open_code"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="open_code" class="mods-list__mods-filter-downloads-flex-title">Открытый
                                    исходный код</label>
                            </div>
                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="environment_studios" id="environment_studios"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="environment_studios" class="mods-list__mods-filter-downloads-flex-title">От
                                    Eniroment Studios</label>
                            </div>
                            <div class="mods-list__mods-filter-downloads-flex-check">
                                <input type="checkbox" name="environment_studios_partners"
                                       id="environment_studios_partners"
                                       class="mods-list__mods-filter-downloads-flex-check-box">
                                <label for="environment_studios_partners"
                                       class="mods-list__mods-filter-downloads-flex-title">От партнёров Eniroment
                                    Studios</label>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!--Конец фильтра-->
        </div>
        </div>
    </section>

</main>
<script src="js/modal_new_project_common.js"></script>
<script src="js/script.js"></script>
<script src="js/eye_confirm.js"></script>
<script src="js/eye_reg.js"></script>
<script src="js/eye_pass.js"></script>
</body>
</html>