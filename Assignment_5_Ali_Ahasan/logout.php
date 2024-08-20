<?php
// Start or resume a session
session_start();

// Unset all session variables related to user login
unset($_SESSION['logged_in'], $_SESSION['username'], $_SESSION['email']);
$_SESSION['logged_in'] = "false";

// Set logged_in status to "false" and store in a cookie
$_SESSION['logged_in_check'] = "false";
setcookie('logged_in_check', "false", time() + (86400 * 30), "/"); // Cookie expires in 30 days

// Redirect to the homepage after logout
header("Location: index.php");
exit;
?>
<?