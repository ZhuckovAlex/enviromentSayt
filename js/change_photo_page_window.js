const userPhotoWindow = document.querySelector('.header__user-photo-change');
const userPhotoWindowCloseDel = document.querySelector('.change-photo-page__window-download-delete');
const userPhotoWindowClose = document.querySelector('.change-photo-page__window-close-div');
const userPhotoWindowChange = document.querySelector('.change-photo-page__container');
const userPhotoWindowChangeWindow = document.querySelector('.change-photo-page__window');
let shouldHide = true;

userPhotoWindow.addEventListener('click', function() {
    if (shouldHide) {
        userPhotoWindowChange.style.display = 'flex';
        shouldHide = false;
    }
});

function isClickOutside(element, event) {
    return !element.contains(event.target);
}

document.addEventListener('click', function(event) {
    if (isClickOutside(userPhotoWindowChangeWindow, event)) {
        setTimeout(() => {
            if (shouldHide) {
                userPhotoWindowChange.style.display = 'none';
            }
            shouldHide = true;
        }, 0); // Adjust the delay as needed
    }
});
userPhotoWindowClose.addEventListener('click', function() {
    userPhotoWindowChange.style.display = 'none';
});
userPhotoWindowCloseDel.addEventListener('click', function() {
    userPhotoWindowChange.style.display = 'none';
});