<?php
// Start or resume a session
session_start();
class Login
{
    public function __construct()
    {
        $this->authenticate();
    }
    // Check if the form is submitted
    private function authenticate()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Load users from the JSON file
            $jsonData = file_get_contents("users.json");
            $users = json_decode($jsonData, true);

            // Loop through stored users in the JSON data to find a match
            foreach ($users as $user) {
                // Validate email and password
                if ($user['email'] === $_POST['email'] && password_verify($_POST['password'], $user['password'])) {
                    // Set session and cookies for the logged-in user
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];

                    setcookie('logged_in_check', 'true', time() + (86400 * 30), "/");
                    setcookie('username', $user['username'], time() + (86400 * 30), "/");
                    setcookie('email', $user['email'], time() + (86400 * 30), "/");

                    // Redirect to homepage after successful login
                    header("Location: index.php");
                    exit();
                }
            }
            // Display error message if credentials are invalid
            echo "Invalid credentials!";
        }
    }

    public function accountCreationPage()
    {
        // Link for users to create a new account
        echo "<h3 style='display:inline;'><br><br><br>Not a user? </h3>
          <span><a href='creation.php'>Create an account now.</a></span>";
    }

    public function homePage()
    {
        // Link to the home page
        echo "<h3 style='display:inline;'><br><br><br>Home Page? </h3>
          <a href='index.php'>Go to Home</a>";
    }
}

$login = new Login();

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
    <?php
    $login->accountCreationPage();
    $login->homePage();
    ?>
</body>

</html>