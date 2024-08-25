<?php
// Start or resume a session
session_start();
class Logout
{
    public function __construct()
    {
        $this->unsetAllSessionVariable();
        $this->setStatFalseStoreCookie();
        $this->homePage();
    }
    public function unsetAllSessionVariable()
    {
        // Unset all session variables related to user login
        unset($_SESSION['logged_in'], $_SESSION['username'], $_SESSION['email']);
        $_SESSION['logged_in'] = "false";
    }
    public function setStatFalseStoreCookie()
    {
        // Set logged_in status to "false" and store in a cookie
        $_SESSION['logged_in_check'] = "false";
        setcookie('logged_in_check', "", time() - 3600, "/");  // Expire the cookie
        setcookie('username', "", time() - 3600, "/");
        setcookie('email', "", time() - 3600, "/");
    }

    public function homePage()
    {
        // Redirect to the homepage after logout
        header("Location: index.php");
        exit;
    }
}

$logout = new Logout();

?> <?