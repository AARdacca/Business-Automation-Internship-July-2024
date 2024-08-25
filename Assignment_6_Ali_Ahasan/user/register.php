<?php
// Start or resume a session
session_start();
class Register
{
    public function registerApply()
    {
        // Process the form data if the form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Create a user array with escaped data and hashed password
            $user = [
                "username" => $_POST['username'],
                "email" => $_POST['email'],
                "address" => $_POST['address'],
                "password" => password_hash($_POST['password'], PASSWORD_DEFAULT) // Hash the password for security
            ];

            // Append the new user to the session user array
            $_SESSION['users'][] = $user;

            // Store the users array in a cookie that expires in 30 days
            setcookie('user_data', serialize($_SESSION['users']), time() + (86400 * 30), "/");

            // Also save the user data to a JSON file
            file_put_contents("users.json", json_encode($_SESSION['users'], JSON_PRETTY_PRINT));

            // Redirect to the users list page after registration
            header("Location: users.php");
            exit();
        }
    }
}

$register = new Register;
$register->registerApply();

?>

<?
