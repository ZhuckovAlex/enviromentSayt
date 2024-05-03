// Код скрыть-показать пароль

// Получаем элементы по их идентификаторам
const passConfirmInput2 = document.getElementById('pass_reg');
const eyeEye2 = document.getElementById('eye_pass_reg');
const eyeCEye2 = document.getElementById('eye_c_pass_reg');

// Устанавливаем начальные стили для eye_c_pass_reg_confirm и eye_pass_reg_confirm
eyeCEye2.style.display = 'none';
eyeEye2.style.display = 'block';

// Функция для переключения отображения элементов
function toggleDisplay(element1, element2) {
    element1.style.display = element1.style.display === 'none' ? 'block' : 'none';
    element2.style.display = element2.style.display === 'none' ? 'block' : 'none';
}

// Функция для переключения типа ввода пароля
function toggleInputType(inputElement) {
    const type = inputElement.getAttribute('type');
    inputElement.setAttribute('type', type === 'password' ? 'text' : 'password');
}

// Добавляем обработчики событий клика на элементы eye_pass_reg_confirm и eye_c_pass_reg_confirm
eyeEye2.addEventListener('click', function() {
    toggleDisplay(eyeEye2, eyeCEye2);
    toggleInputType(passConfirmInput2);
});

eyeCEye2.addEventListener('click', function() {
    toggleDisplay(eyeEye2, eyeCEye2);
    toggleInputType(passConfirmInput2);
});