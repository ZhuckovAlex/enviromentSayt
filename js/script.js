const iconMenu=document.querySelector('.header__menu-icon');
const menuBody=document.querySelector('.header__menu');
if(iconMenu){
    iconMenu.addEventListener("click",function(e){
        document.querySelector('body').classList.toggle('_lock');
        iconMenu.classList.toggle('_active');
        menuBody.classList.toggle('_active');
    });
}
const filterBurger=document.querySelector('.mods-list__mods-filter-burger');
const filterBurgerButton=document.querySelector('.mod-list__mod-list-filter-burger');
if(filterBurger){
    filterBurgerButton.addEventListener("click",function(e){
        filterBurger.style.display="flex";
    });
}
const filterBurgerClose=document.querySelector('.mods-list__mods-filter-burger');
const filterBurgerButtonClose=document.querySelector('.mods-list__mods-filter-burger-close');
if(filterBurgerClose){
    filterBurgerButtonClose.addEventListener("click",function(e){
        filterBurgerClose.style.display="none";
    });
}
const header__account=document.querySelector('#header__account');
const header__account_menu=document.querySelector('#header__account-menu');
if(header__account){
    header__account.addEventListener("mouseenter",function(e){
        header__account_menu.style.display="block";
    });
}
    document.addEventListener("click", function(e) {
        // Проверяем, является ли цель события или один из его родителей элементом header__account или header__account_menu
        if (!e.target.closest("#header__account, #header__account-menu")) {
            // Если нет, скрываем header__account_menu
            header__account_menu.style.display = "none";
        }
    });

const header__account2=document.querySelector('#header__account2');
const header__account_menu2=document.querySelector('#header__account-menu2');
if(header__account2){
    header__account2.addEventListener("click",function(e){
        header__account_menu2.style.display="block";
    });
}

document.addEventListener("click", function(e) {
    // Проверяем, является ли цель события или один из его родителей элементом header__account или header__account_menu
    if (!e.target.closest("#header__account2, #header__account-menu2")) {
        // Если нет, скрываем header__account_menu
        header__account_menu2.style.display = "none";
    }
});


// Модальное окно при нажатии на Войти на сайте
document.getElementById('login').addEventListener('click', function() {
    document.getElementById('login__container').style.display = 'flex';
});
// Модальное окно при нажатии на Зарегистрируйся на окне
document.getElementById('get_register').addEventListener('click', function() {
        document.getElementById('login__container').style.display = 'none';
        document.getElementById('register__container').style.display = 'flex';
    }
);
// Модальное окно при нажатии на Войти на окне
document.getElementById('get_login').addEventListener('click', function() {
        document.getElementById('register__container').style.display = 'none';
        document.getElementById('login__container').style.display = 'flex';
    }
);
// Закрыть окно логина при щелчке в не окна
document.addEventListener('click', function(event) {
    var modal = document.getElementById('login__container'); // замените 'myModal' на ID вашего модального окна
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});
// Закрыть окно регистрации при щелчке в не окна
document.addEventListener('click', function(event) {
    var modal = document.getElementById('register__container'); // замените 'myModal' на ID вашего модального окна
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});

// Закрыть на крестик
var elements = document.getElementsByClassName('login__close');

for (var i =  0; i < elements.length; i++) {
    elements[i].addEventListener('click', function() {
        document.getElementById('register__container').style.display = 'none';
        document.getElementById('login__container').style.display = 'none';
    });
}


// Запомнить меня
// Получаем элементы формы
const rememberMeCheckbox = document.getElementById("rememberMe");
const mailInput = document.getElementById("mail");
const pass_logInput = document.getElementById("pass_log");

// Проверяем, запомнил ли пользователь данные
if (localStorage.getItem('rememberMe') === 'true') {
    rememberMeCheckbox.checked = true;
    mailInput.value = localStorage.getItem('mail');
    pass_logInput.value = localStorage.getItem('pass_log');
}

// Обработчик для события submit формы
document.getElementById("loginForm").addEventListener("submit", function(event) {
    // Если пользователь выбрал опцию "запомнить меня"
    if (rememberMeCheckbox.checked) {
        localStorage.setItem('rememberMe', 'true');
        localStorage.setItem('mail', mailInput.value);
        localStorage.setItem('pass_log', pass_logInput.value);
    } else {
        localStorage.setItem('rememberMe', 'false');
        localStorage.removeItem('mail');
        localStorage.removeItem('pass_log');
    }
});
