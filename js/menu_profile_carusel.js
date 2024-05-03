// Для автоматического прокручивания меню при загрузке страницы и изменении размеров окна
window.addEventListener('resize', function() {
    document.querySelector('.menu-profile__container').scrollLeft = 0;
});

// Добавляем прокрутку при клике на кнопки навигации (если нужно)
// Например, для кнопки "Влево"
document.querySelector('.scroll-left-button').addEventListener('click', function() {
    document.querySelector('.menu-profile__container').scrollLeft -= 100; // Прокрутка влево на 100 пикселей
});

// Например, для кнопки "Вправо"
document.querySelector('.scroll-right-button').addEventListener('click', function() {
    document.querySelector('.menu-profile__container').scrollLeft += 100; // Прокрутка вправо на 100 пикселей
});