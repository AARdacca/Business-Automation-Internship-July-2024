<?php
// Start or resume a session
session_start();
class Users
{
    public function __construct()
    {
        $this->loadJSON();
        $this->loadSessionCookie();
        $this->deleteSpecefic();
        $this->deleteAll();
        $this->displayAll();
        $this->deleteAllApply();
        $this->homePage();
    }
    // Ensure $_SESSION['users'] is initialized as an array if not already set
    public function loadJSON()
    {
        if (!isset($_SESSION['users'])) {
            // Load users from the JSON file
            if (file_exists('users.json')) {
                $_SESSION['users'] = json_decode(file_get_contents('users.json'), true);
            } else {
                $_SESSION['users'] = array();
            }
        }
    }

    public function loadSessionCookie()
    {
        // Load users from a cookie if session is not set but cookie exists
        if (!isset($_SESSION['users']) && isset($_COOKIE['user_data'])) {
            $_SESSION['users'] = unserialize($_COOKIE['user_data']);
        }
    }

    // Function to save session data back to a cookie and to the JSON file
    private function saveData()
    {
        setcookie('user_data', serialize($_SESSION['users']), time() + (86400 * 30), "/"); // Cookie expires in 30 days
        file_put_contents('users.json', json_encode($_SESSION['users'], JSON_PRETTY_PRINT)); // Save to JSON file
    }

    public function deleteSpecefic()
    {
        // Delete a specific user by index
        if (isset($_GET['delete_id'])) {
            array_splice($_SESSION['users'], $_GET['delete_id'], 1);
            $this->saveData(); // Save the updated users array to the cookie and JSON file
            header("Location: users.php"); // Redirect to users page
            exit();
        }
    }
    public function deleteAll()
    {
        // Delete all users
        if (isset($_GET['delete_all'])) {
            $_SESSION['users'] = []; // Empty the session array
            $this->saveData(); // Save the empty array to the cookie and JSON file
            header("Location: users.php"); // Redirect to users page
            exit();
        }
    }

    public function displayAll()
    {
        // Display all registered users with a delete option
        echo "<h1>Registered Users</h1>";
        echo "<ul>";
        foreach ($_SESSION['users'] as $index => $user) {
            echo "<li>" . htmlspecialchars($user['username']) . " - " . htmlspecialchars($user['email']) . " - " . htmlspecialchars($user['address']) .
                " <a href='users.php?delete_id=$index'>Delete</a></li>";
        }
    }

    public function deleteAllApply()
    {
        echo "</ul>";
        echo "<a href='users.php?delete_all=true'>Delete All Users</a>";
    }


    public function HomePage()
    {
        // Link to the home page
        echo "<h3 style='display:inline;'><br><br><br>Home Page? </h3>
      <a href='index.php'>Go to Home</a>";
    }
}

$allUsers = new Users;

?> <?
