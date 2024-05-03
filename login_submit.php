<?
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost","root","","mods");
$user_flag = mysqli_query($link, "SELECT * FROM `users`");


$pass = $_POST['pass'];
$mail = $_POST['mail'];

$check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `pass` = '$pass' AND `mail` = '$mail'");
if (mysqli_num_rows($check_user) > 0) {

    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "mail" => $user['mail'],
        "pass" => $user['pass'],
        "photo" => $user['photo'],
        "background" => $user['background'],
        "subscribes" => $user['subscribes'],
        "subscribers" => $user['subscribers'],
        "likes" => $user['likes']
    ];
    header('Location: cabinet.php');
} else {
    $_SESSION['message'] = 'Неверная почта или телефон';
    header('Location: mods.php');
}
?>