const userBackground = document.querySelector('.header__background-user');
const userBackgroundChange = document.querySelector('.header__background-change');

userBackground.addEventListener('mouseenter', function() {
    userBackgroundChange.style.display = 'flex';
});

userBackground.addEventListener('mouseleave', function() {
    userBackgroundChange.style.display = 'none';
});