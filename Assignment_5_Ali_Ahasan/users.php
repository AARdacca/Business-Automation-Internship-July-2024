<?php
session_start();

// Load users from session or cookie
if (!isset($_SESSION['users']) && isset($_COOKIE['user_data'])) {
    $_SESSION['users'] = unserialize($_COOKIE['user_data']);
}

// Function to save session data back to the cookie
function saveDataToCookie() {
    setcookie('user_data', serialize($_SESSION['users']), time() + (86400 * 30), "/"); // 30 days expiration
}

// Function to clear cookie data
function clearCookie() {
    setcookie('user_data', '', time() - 3600, "/"); // Expire the cookie
}

// Delete a specific user from session
if (isset($_GET['delete_id_session'])) {
    array_splice($_SESSION['users'], $_GET['delete_id_session'], 1);
    saveDataToCookie();
    header("Location: users.php");
    exit();
}

// Delete a specific user from cookie
if (isset($_GET['delete_id_cookie'])) {
    $users = unserialize($_COOKIE['user_data']);
    array_splice($users, $_GET['delete_id_cookie'], 1);
    $_SESSION['users'] = $users; // Update session to reflect cookie change
    saveDataToCookie();
    header("Location: users.php");
    exit();
}

// Delete all users from session
if (isset($_GET['delete_all_session'])) {
    $_SESSION['users'] = [];
    saveDataToCookie(); // Update cookie to reflect session change
    header("Location: users.php");
    exit();
}

// Delete all users from cookie
if (isset($_GET['delete_all_cookie'])) {
    clearCookie();
    $_SESSION['users'] = []; // Clear session as well
    header("Location: users.php");
    exit();
}

echo "<h1>Registered Users</h1>";
echo "<ul>";
foreach ($_SESSION['users'] as $index => $user) {
    echo "<li>" . htmlspecialchars($user['username']) . " - " . htmlspecialchars($user['email']) . " - " . htmlspecialchars($user['address']) .
    " <a href='users.php?delete_id_session=$index'>Delete from Session</a> | <a href='users.php?delete_id_cookie=$index'>Delete from Cookie</a></li>";
}
echo "</ul>";

if (!empty($_SESSION['users'])) {
    echo "<a href='users.php?delete_all_session=true'>Delete All Users from Session</a><br>";
}

if (isset($_COOKIE['user_data'])) {
    echo "<a href='users.php?delete_all_cookie=true'>Delete All Users from Cookie</a>";
}
?>

<?