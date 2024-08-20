<?php
session_start();

// Unset all of the session variables related to user login
unset($_SESSION['logged_in']);
$_SESSION['logged_in'] = "false";
unset($_SESSION['username']);
unset($_SESSION['email']);

// Set logged_in status to "false" and store in a cookie
$_SESSION['logged_in_check'] = "false";
setcookie('logged_in_check', "false", time() + (86400 * 30), "/"); // expire in 30 days

// Optionally reset other user-specific session variables if needed
// unset($_SESSION['another_variable']);

// Redirect to the login page
header("Location: index.php");
exit;
?>
<?