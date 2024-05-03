// Код скрыть-показать пароль

// Получаем элементы по их идентификаторам
const passConfirmInput = document.getElementById('pass_reg_confirm');
const eyeEye = document.getElementById('eye_pass_reg_confirm');
const eyeCEye = document.getElementById('eye_c_pass_reg_confirm');

// Устанавливаем начальные стили для eye_c_pass_reg_confirm и eye_pass_reg_confirm
eyeCEye.style.display = 'none';
eyeEye.style.display = 'block';

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
eyeEye.addEventListener('click', function() {
    toggleDisplay(eyeEye, eyeCEye);
    toggleInputType(passConfirmInput);
});

eyeCEye.addEventListener('click', function() {
    toggleDisplay(eyeEye, eyeCEye);
    toggleInputType(passConfirmInput);
});