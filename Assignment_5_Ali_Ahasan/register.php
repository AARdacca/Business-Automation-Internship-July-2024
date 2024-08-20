<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = [
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "address" => $_POST['address'],
        "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)  // Hash password
    ];

    $_SESSION['users'][] = $user;
    setcookie('user_data', serialize($_SESSION['users']), time() + (86400 * 30), "/");
    header("Location: users.php");
    exit();
}
?>

<?