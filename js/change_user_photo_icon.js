const userPhoto = document.querySelector('.header__user-photo');
const userPhotoChange = document.querySelector('.header__user-photo-change');

userPhoto.addEventListener('mouseenter', function() {
    userPhotoChange.style.display = 'flex';
});

userPhoto.addEventListener('mouseleave', function() {
    userPhotoChange.style.display = 'none';
});