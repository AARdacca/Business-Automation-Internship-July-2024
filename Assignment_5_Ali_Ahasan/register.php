<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = [
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "address" => $_POST['address']
    ];

    // Store user data in session
    $_SESSION['users'][] = $user;

    // Store the session data into a cookie
    setcookie('user_data', serialize($_SESSION['users']), time() + (86400 * 30), "/"); // 30 days expiration

    // Redirect to user list page
    header("Location: users.php");
    exit();
}
?>

<?