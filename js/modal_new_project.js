const newProjectWindow = document.querySelector('.header__account-menu-item');
const newProjectWindowPlus = document.querySelector('.header__user-add-mod');
const newProjectWindowClose = document.querySelector('.new-project__close');
const newProjectWindowChange = document.querySelector('.new-project__container');
const newProjectWindowChangeWindow = document.querySelector('.new-project__window');
let shouldHideNewProject = true;

newProjectWindow.addEventListener('click', function() {
    if (shouldHideNewProject) {
        newProjectWindowChange.style.display = 'flex';
        shouldHideNewProject = false;
    }
});
newProjectWindowPlus.addEventListener('click', function() {
    if (shouldHideNewProject) {
        newProjectWindowChange.style.display = 'flex';
        shouldHideNewProject = false;
    }
});
function isClickOutside(element, event) {
    return !element.contains(event.target);
}

document.addEventListener('click', function(event) {
    if (isClickOutside(newProjectWindowChangeWindow, event)) {
        setTimeout(() => {
            if (shouldHideNewProject) {
                newProjectWindowChange.style.display = 'none';
            }
            shouldHideNewProject = true;
        }, 0); // Adjust the delay as needed
    }
});
newProjectWindowClose.addEventListener('click', function() {
    newProjectWindowChange.style.display = 'none';
});