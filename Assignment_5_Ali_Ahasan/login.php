<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $_POST['email'] && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['logged_in_check'] = true;
            setcookie('logged_in_check', true, time() + (86400 * 30), "/"); // expire in 30 days
            header("Location: index.php");
            exit();
        }
    }
    echo "Invalid credentials!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
<br><br><br>
<?php
echo    "   <h3 style='display:inline;'>Not a user? </h3> 
            <span><a href='creation.php'>Create an account now.</a></span>
        ";
?>

<br><br><br>
<?php
echo    "   <h3 style='display:inline;'>Home Page? </h3>
            <a href='index.php'>Go to Home</a>
        ";
?>