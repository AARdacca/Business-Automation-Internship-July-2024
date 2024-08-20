<?php
session_start()
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration Form</h1>
    <form action="register.php" method="post">
        Name: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Address: <input type="text" name="address" required><br>
        <input type="submit" value="Register">
    </form>

    <br><br>
    
    <h1>All Users</h1>
    <form action="users.php" method="get">
        <input type="submit" value="Users">
    </form>

</body>
</html>
