<?php
// Start or resume a session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through stored users in the session to find a match
    foreach ($_SESSION['users'] as $user) {
        // Validate email and password
        if ($user['email'] === $_POST['email'] && password_verify($_POST['password'], $user['password'])) {
            // Set session and cookie for the logged-in user
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $user['username'];
            setcookie('logged_in_check', true, time() + (86400 * 30), "/"); // 30-day cookie
            // Redirect to homepage after successful login
            header("Location: index.php");
            exit();
        }
    }
    // Display error message if credentials are invalid
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
    <!-- Login form that posts data to the same script -->
    <form action="login.php" method="post">
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>

<?php
// Link for users to create a new account
echo "<h3 style='display:inline;'><br><br><br>Not a user? </h3>
      <span><a href='creation.php'>Create an account now.</a></span>";
?>

<?php
// Link to the home page
echo "<h3 style='display:inline;'><br><br><br>Home Page? </h3>
      <a href='index.php'>Go to Home</a>";
?>