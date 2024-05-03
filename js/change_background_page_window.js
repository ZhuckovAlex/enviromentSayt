const userBackgroundWindow = document.querySelector('.header__background-change');
const userBackgroundWindowCloseDel = document.querySelector('.change-background-page__window-download-delete');
const userBackgroundWindowClose = document.querySelector('.change-background-page__window-close-div');
const userBackgroundWindowChange = document.querySelector('.change-background-page__container');
const userBackgroundWindowChangeWindow = document.querySelector('.change-background-page__window');
let shouldHideBackground = true;

userBackgroundWindow.addEventListener('click', function() {
    if (shouldHideBackground) {
        userBackgroundWindowChange.style.display = 'flex';
        shouldHideBackground = false;
    }
});

function isClickOutside(element, event) {
    return !element.contains(event.target);
}

document.addEventListener('click', function(event) {
    if (isClickOutside(userBackgroundWindowChangeWindow, event)) {
        setTimeout(() => {
            if (shouldHideBackground) {
                userBackgroundWindowChange.style.display = 'none';
            }
            shouldHideBackground = true;
        }, 0); // Adjust the delay as needed
    }
});
userBackgroundWindowClose.addEventListener('click', function() {
    userBackgroundWindowChange.style.display = 'none';
});
userBackgroundWindowCloseDel.addEventListener('click', function() {
    userBackgroundWindowChange.style.display = 'none';
});