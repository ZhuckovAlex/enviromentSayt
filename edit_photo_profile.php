<?php
session_start();

// Проверяем, загружен ли файл
if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    // Получаем имя пользователя из сессии
    $username = $_SESSION['user']['name'];

    // Путь для сохранения изображения
    $uploadDirectory = 'avatars/';

    // Получаем расширение загруженного файла
    $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

    // Удаляем старое изображение пользователя, если оно существует
    if (isset($_SESSION['user']['photo'])) {
        $oldFilePath = $uploadDirectory . $_SESSION['user']['photo'];
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }
    }

    // Генерируем новое имя файла на основе имени пользователя и расширения файла
    $newFileName = $username . '.' . $extension;

    // Полный путь к загруженному файлу
    $uploadFilePath = $uploadDirectory . $newFileName;

    // Перемещаем загруженный файл в указанную директорию
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFilePath)) {
        // Обновляем информацию о пользователе в сессии
        $_SESSION['user']['photo'] = $newFileName;

        // Обновляем информацию в базе данных
        try {
            // Подключение к базе данных
            $pdo = new PDO('mysql:host=localhost;dbname=mods', 'root', '');

            // Устанавливаем режим обработки ошибок
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Подготовленный запрос для обновления информации о пользователе
            $statement = $pdo->prepare("UPDATE users SET photo = :photo WHERE id = :id");
            $statement->execute(array(':photo' => $newFileName, ':id' => $_SESSION['user']['id']));

            // Выводим сообщение об успешной загрузке
            header('Location: cabinet.php');
        } catch(PDOException $e) {
            // Выводим сообщение об ошибке при подключении к базе данных
            echo 'Ошибка при подключении к базе данных: ' . $e->getMessage();
        }
    } else {
        echo 'Ошибка при загрузке изображения.';
    }
} else {
    echo 'Произошла ошибка при загрузке файла.';
}
?>