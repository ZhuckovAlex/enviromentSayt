document.addEventListener("DOMContentLoaded", function () {
    // Находим формы
    var forms = document.querySelectorAll('.edit-profile__form');

    // Добавляем обработчик на каждую форму
    forms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            // Предотвращаем стандартное поведение отправки формы
            event.preventDefault();

            // Показываем окно с идентификатором "edit-profile-submit"
            var editProfileSubmit = document.getElementById('edit-profile-submit');
            editProfileSubmit.style.display = 'block';
        });
    });
});
// Получаем элементы формы, окна и крестика
var profileSubmitForm = document.getElementById('edit-profile-submit');
var submitWindow = document.querySelector('.edit-profile-submit__submit-window');
var closeButton = document.querySelector('.edit-profile-submit__close-window');

// Скрываем форму при нажатии на крестик
closeButton.addEventListener('click', function(event) {
    event.stopPropagation(); // Предотвращаем всплытие события
    profileSubmitForm.style.display = 'none';
});

// Скрываем форму при нажатии вне области формы или ее окна
window.addEventListener('click', function(event) {
    if (!submitWindow.contains(event.target)) {
        profileSubmitForm.style.display = 'none';
    }
});
document.addEventListener("DOMContentLoaded", function() {
    const editMailInput = document.getElementById("edit-mail");
    const editNameInput = document.getElementById("edit-name");
    const editPassInput = document.getElementById("edit-pass");

    const editMailHiddenInput = document.getElementById("edit-mail-f");
    const editNameHiddenInput = document.getElementById("edit-name-f");
    const editPassHiddenInput = document.getElementById("edit-pass-f");

    const editProfileForm = document.getElementById("edit-profile-form");

    editProfileForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Set the values of hidden inputs to match the values of visible inputs
        editMailHiddenInput.value = editMailInput.value;
        editNameHiddenInput.value = editNameInput.value;
        editPassHiddenInput.value = editPassInput.value;

        // Submit the form
        editProfileForm.submit();
    });
});