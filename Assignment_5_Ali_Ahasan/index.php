<?php
session_start();

function findUserByEmail($email) {
    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $email) {
            return $user;
        }
    }
    return false;
}

// Only load users from cookie if session users are not set
if (!isset($_SESSION['users']) && isset($_COOKIE['user_data'])) {
    $users = unserialize($_COOKIE['user_data']);
    $_SESSION['users'] = $users;
}

//---------------------------------------------------------------------------

    $_SESSION['logged_in_check'] = $_COOKIE['logged_in_check'];

// Check if the 'logged_in' session variable is set and true

echo $_SESSION['logged_in_check'];


if (isset($_SESSION['logged_in_check']) && $_SESSION['logged_in_check'] == 1) {
    
    if (!isset($_SESSION['logged_in']) && !empty($_SESSION['users'])) {
        $user = reset($_SESSION['users']); // Get the first user
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
    }

    echo "You are logged in.";
} else {
    // Code to execute if the user is not logged in
    echo "You are not logged in.";
    // Set logged_in status to "false" and store in a cookie
    // $_SESSION['logged_in'] = "false";
    // setcookie('logged_in', "false", time() + (86400 * 30), "/"); // expire in 30 days
}


//---------------------------------------------------------------------------

// if (!isset($_SESSION['logged_in']) && !empty($_SESSION['users'])) {
//     $user = reset($_SESSION['users']); // Get the first user
//     $_SESSION['logged_in'] = true;
//     $_SESSION['username'] = $user['username'];
//     $_SESSION['email'] = $user['email'];
// }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
<?php
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


<br><br><br>
<?php
echo    "   <h3 style='display:inline;'>All Users Check: </h3>
            <a href='users.php'>Users</a>
        ";
?>

</body>
</html>