<?php
// Start or resume a session
session_start();
class Index
{
    public function __construct()
    {
        $this->loadCookieToSession();
        $this->setLoggedInStatus();
        $this->automaticLogInOut();
    }
    // Function to find a user by email from session data
    private function findUserByEmail($email)
    {
        foreach ($_SESSION['users'] as $user) {
            if ($user['email'] === $email) {
                return $user; // Return the user if found
            }
        }
        return false; // Return false if no user is found
    }

    public function loadCookieToSession()
    {
        // Load users from cookie to session if session users are not set
        if (!isset($_SESSION['users']) && isset($_COOKIE['user_data'])) {
            $cookieData = json_decode($_COOKIE['user_data'], true);
            if (is_array($cookieData)) { // Ensure the decoded data is an array
                $_SESSION['users'] = $cookieData;
            } else {
                // Handle error or log issue
                error_log('Invalid cookie data format');
            }
        }
    }

    public function setLoggedInStatus()
    {
        // Check if the logged_in_check cookie is set and true
        if (isset($_COOKIE['logged_in_check']) && $_COOKIE['logged_in_check'] == 'true') {
            if (!isset($_SESSION['logged_in']) && isset($_COOKIE['username']) && isset($_COOKIE['email'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $_COOKIE['username'];
                $_SESSION['email'] = $_COOKIE['email'];
            }
        } else {
            $_SESSION['logged_in'] = false;
            unset($_SESSION['username']);
            unset($_SESSION['email']);
        }
    }


    public function automaticLogInOut()
    {
        // Automatically log in the first user if no one is logged in but users exist
        if (isset($_SESSION['logged_in_check']) && $_SESSION['logged_in_check'] == 1) {
            if (!isset($_SESSION['logged_in']) && !empty($_SESSION['users'])) {
                $user = reset($_SESSION['users']); // Get the first user
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
            }
        }
    }

    public function displayMessageOnLogInStatus()
    {
        // Display welcome message based on login status
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            echo "<h1>Welcome back, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
            echo "<a href='logout.php'>Logout</a>";
        } else {
            echo "<h1>Welcome to Our Site!</h1>";
            echo "<a href='login.php'>Login</a> | <a href='creation.php'>Register</a>";
        }
    }

    public function allUserList()
    {
        // Link to the users list page
        echo "  <h3 style='display:inline;'><br><br><br>All Users Check: </h3>
                <a href='users.php'>Users</a>";
    }

    public function e_commercePage()
    {
        // Link to the e-commerce page
        echo "  <h3 style='display:inline;'><br><br><br>Online Shop: </h3>
                <a href='/assignment_6/e-commerce/'>Shop</a>";
    }
}

$indexUser = new Index();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
</head>

<body>
    <?php
    $indexUser->displayMessageOnLogInStatus();
    ?>
</body>

</html>

<?php
$indexUser->e_commercePage();
$indexUser->allUserList();
?>