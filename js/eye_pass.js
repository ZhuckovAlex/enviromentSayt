// Код скрыть-показать пароль

// Получаем элементы по их идентификаторам
const passConfirmInput3 = document.getElementById('pass_log');
const eyeEye3 = document.getElementById('eye_pass_log');
const eyeCEye3 = document.getElementById('eye_c_pass_log');

// Устанавливаем начальные стили для eye_c_pass_log_confirm и eye_pass_log_confirm
eyeCEye3.style.display = 'none';
eyeEye3.style.display = 'block';

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

// Добавляем обработчики событий клика на элементы eye_pass_log_confirm и eye_c_pass_log_confirm
eyeEye3.addEventListener('click', function() {
    toggleDisplay(eyeEye3, eyeCEye3);
    toggleInputType(passConfirmInput3);
});

eyeCEye3.addEventListener('click', function() {
    toggleDisplay(eyeEye3, eyeCEye3);
    toggleInputType(passConfirmInput3);
});