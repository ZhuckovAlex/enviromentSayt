<?php
session_start();

// Подключение к базе данных
// Замените значениями вашего хоста, имени пользователя, пароля и названия базы данных
$mysqli = new mysqli("localhost", "root", "", "mods");

// Проверка соединения
if ($mysqli->connect_errno) {
    $_SESSION['error_message'] = "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    header("Location: cabinet-settings.php");
    exit();
}

// Проверка, была ли установлена сессия пользователя
if(isset($_SESSION['user']['name']) && isset($_SESSION['user']['mail'])) {
    // Получение данных пользователя из сессии
    $user_id = $_SESSION['user']['name'];
    $user_mail = $_SESSION['user']['mail'];
    // Проверка, были ли отправлены данные формы
    if(isset($_POST['edit-mail-f']) || isset($_POST['edit-name-f']) || isset($_POST['edit-pass-f'])) {
        // Получение данных из скрытых полей
        $edit_mail = $_POST['edit-mail-f'];
        $edit_name = $_POST['edit-name-f'];
        $edit_pass = $_POST['edit-pass-f'];
        $old_pass = $_POST['pass']; // Старый пароль, введенный пользователем
        $pass_confirm = $_POST['pass-confirm']; // Подтверждение нового пароля

        // Проверка, является ли хотя бы одно из скрытых полей непустым
        if(!empty($edit_mail) || !empty($edit_name) || !empty($edit_pass)) {
            // Проверка, был ли введен старый пароль и совпадает ли он с текущим паролем пользователя
            $user_name = $_SESSION['user']['name'];
            $query_check_pass = "SELECT pass FROM users WHERE name = '$user_name'";
            $result = $mysqli->query($query_check_pass);
            if ($result) {
                $row = $result->fetch_assoc();
                $stored_pass = $row['pass'];
                if ($old_pass === $stored_pass) {
                    // Старый пароль верный, можно обновлять данные пользователя
                    if($old_pass === $pass_confirm) {
                        // Создание запроса на обновление данных пользователя в базе данных
                        $query = "UPDATE users SET ";
                        if (!empty($edit_mail)) {
                            $query .= "mail = '$edit_mail', ";
                            $_SESSION['success_message'][] = "Адрес электронной почты успешно обновлен";
                            $_SESSION['user']['mail'] = $edit_mail; // Обновляем значение в сессии
                        }
                        if (!empty($edit_name)) {
                            $query .= "name = '$edit_name', ";
                            $_SESSION['success_message'][] = "Имя пользователя успешно обновлено";
                            $_SESSION['user']['name'] = $edit_name; // Обновляем значение в сессии
                        }
                        if (!empty($edit_pass)) {
                            $query .= "pass = '$edit_pass', ";
                        }
                        $query = rtrim($query, ", ");
                        $query .= " WHERE name = '$user_name'";
                        if ($mysqli->query($query) === TRUE) {
                            $_SESSION['success_message'][] = "Данные пользователя успешно обновлены";
                        } else {
                            $_SESSION['error_message'] = "Ошибка при обновлении данных пользователя: " . $mysqli->error;
                        }
                    } else {
                        $_SESSION['error_message'] = "Новый пароль и подтверждение пароля не совпадают";
                    }
                } else {
                    $_SESSION['error_message'] = "Старый пароль введен неверно";
                }
            } else {
                $_SESSION['error_message'] = "Ошибка при получении старого пароля: " . $mysqli->error;
            }
        } else {
            $_SESSION['error_message'] = "Не было передано ни одного значения для обновления";
        }
    } else {
        $_SESSION['error_message'] = "Данные формы не были отправлены";
    }
} else {
    $_SESSION['error_message'] = "Пользователь не авторизован";
}

// Закрытие соединения с базой данных
$mysqli->close();

// Перенаправление обратно на страницу настроек
header("Location: cabinet-settings.php");
exit();
?>