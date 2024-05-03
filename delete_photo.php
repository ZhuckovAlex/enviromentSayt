<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем, авторизован ли пользователь
    if (!isset($_SESSION['user']['id'])) {
        exit(json_encode(['error' => 'Пользователь не авторизован']));
    }

    // Подключение к базе данных
    $pdo = new PDO('mysql:host=localhost;dbname=mods', 'root', '');

    // Удаление фото из базы данных
    $userId = $_SESSION['user']['id'];
    $statement = $pdo->prepare("UPDATE users SET photo = NULL WHERE id = :id");
    $success = $statement->execute(array(':id' => $userId));

    if ($success) {
        // Удаляем фото из папки
        $photoPath = 'avatars/' . $_SESSION['user']['photo'];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
        exit(json_encode(['success' => true]));
    } else {
        exit(json_encode(['error' => 'Ошибка при удалении фото из базы данных']));
    }
}
?>