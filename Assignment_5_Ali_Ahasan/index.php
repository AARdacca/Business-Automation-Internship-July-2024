<?php
// Start or resume a session
session_start();

// Function to find a user by email from session data
function findUserByEmail($email)
{
    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $email) {
            return $user; // Return the user if found
        }
    }
    return false; // Return false if no user is found
}

// Load users from cookie to session if session users are not set
if (!isset($_SESSION['users']) && isset($_COOKIE['user_data'])) {
    $_SESSION['users'] = unserialize($_COOKIE['user_data']);
}

// Set or update logged-in status from cookie
$_SESSION['logged_in_check'] = $_COOKIE['logged_in_check'];

// Automatically log in the first user if no one is logged in but users exist
if (isset($_SESSION['logged_in_check']) && $_SESSION['logged_in_check'] == 1) {
    if (!isset($_SESSION['logged_in']) && !empty($_SESSION['users'])) {
        $user = reset($_SESSION['users']); // Get the first user
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
</head>

<body>
    <?php
    // Display welcome message based on login status
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        echo "<h1>Welcome back, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
        echo "<a href='logout.php'>Logout</a>";
    } else {
        echo "<h1>Welcome to Our Site!</h1>";
        echo "<a href='login.php'>Login</a> | <a href='creation.php'>Register</a>";
    }
    ?>
</body>

</html>

<?php
// Link to the users list page
echo "<h3 style='display:inline;'><br><br><br>All Users Check: </h3>
      <a href='users.php'>Users</a>";
?>