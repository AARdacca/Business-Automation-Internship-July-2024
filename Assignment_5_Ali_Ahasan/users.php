<?php
// Start or resume a session
session_start();

// Ensure $_SESSION['users'] is initialized as an array if not already set
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array();
}

// Load users from a cookie if session is not set but cookie exists
if (!isset($_SESSION['users']) && isset($_COOKIE['user_data'])) {
    $_SESSION['users'] = unserialize($_COOKIE['user_data']);
}

// Function to save session data back to a cookie
function saveDataToCookie()
{
    setcookie('user_data', serialize($_SESSION['users']), time() + (86400 * 30), "/"); // Cookie expires in 30 days
}

// Delete a specific user by index
if (isset($_GET['delete_id'])) {
    array_splice($_SESSION['users'], $_GET['delete_id'], 1);
    saveDataToCookie(); // Save the updated users array to the cookie
    header("Location: users.php"); // Redirect to users page
    exit();
}

// Delete all users
if (isset($_GET['delete_all'])) {
    $_SESSION['users'] = []; // Empty the session array
    setcookie('user_data', '', time() - 3600, "/"); // Expire the user_data cookie
    header("Location: users.php"); // Redirect to users page
    exit();
}

// Display all registered users with a delete option
echo "<h1>Registered Users</h1>";
echo "<ul>";
foreach ($_SESSION['users'] as $index => $user) {
    echo "<li>" . htmlspecialchars($user['username']) . " - " . htmlspecialchars($user['email']) . " - " . htmlspecialchars($user['address']) .
        " <a href='users.php?delete_id=$index'>Delete</a></li>";
}
echo "</ul>";
echo "<a href='users.php?delete_all=true'>Delete All Users</a>";
?>

<?php
// Link to the home page
echo "<h3 style='display:inline;'><br><br><br>Home Page? </h3>
      <a href='index.php'>Go to Home</a>";
?>

<?