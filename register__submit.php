<?php
// Database configuration
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mods';

// Connect to the database
$connection = mysqli_connect($host, $user, $pass, $db);
if (!$connection) {
    die('Could not connect: ' . mysqli_error($connection));
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = mysqli_real_escape_string($connection, trim($_POST["name"]));
    $mail = mysqli_real_escape_string($connection, trim($_POST["mail"]));
    $pass = mysqli_real_escape_string($connection, trim($_POST["pass"]));
    $passConfirm = mysqli_real_escape_string($connection, trim($_POST["pass-confirm"]));
    
    // Check if passwords match
    if ($pass !== $passConfirm) {
        echo "Passwords do not match.";
        exit;
    }
    

    
    // Insert the new user into the database
    $sql = "INSERT INTO users (name, mail, pass) VALUES ('$name','$mail', '$pass')";
    if (mysqli_query($connection, $sql)) {
        header('Location: mods.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    
    // Close the database connection
    mysqli_close($connection);
}
?>