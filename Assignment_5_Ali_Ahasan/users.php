<?php
session_start();

// Initialize $_SESSION['users'] as an array if not already set
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array();
}

// Load users from session or cookie
if (!isset($_SESSION['users']) && isset($_COOKIE['user_data'])) {
    $_SESSION['users'] = unserialize($_COOKIE['user_data']);
}

// Function to save session data back to the cookie
function saveDataToCookie() {
    setcookie('user_data', serialize($_SESSION['users']), time() + (86400 * 30), "/"); // 30 days expiration
}

// Delete a specific user
if (isset($_GET['delete_id'])) {
    array_splice($_SESSION['users'], $_GET['delete_id'], 1);
    saveDataToCookie();
    header("Location: users.php");
    exit();
}

// Delete all users
if (isset($_GET['delete_all'])) {
    $_SESSION['users'] = [];
    setcookie('user_data', '', time() - 3600, "/"); // Expire the cookie
    header("Location: users.php");
    exit();
}

echo "<h1>Registered Users</h1>";
echo "<ul>";
foreach ($_SESSION['users'] as $index => $user) {
    echo "<li>" . htmlspecialchars($user['username']) . " - " . htmlspecialchars($user['email']) . " - " . htmlspecialchars($user['address']) .
    " <a href='users.php?delete_id=$index'>Delete</a></li>";
}
echo "</ul>";
echo "<a href='users.php?delete_all=true'>Delete All Users</a>";
?>

<br><br><br>
<?php
echo    "   <h3 style='display:inline;'>Home Page? </h3>
            <a href='index.php'>Go to Home</a>
        ";
?>

<?