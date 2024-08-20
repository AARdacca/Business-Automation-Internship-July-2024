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
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>

<br><br><br>
<?php
echo    "   <h3 style='display:inline;'>Already a user? </h3> 
            <span><a href='login.php'>Log In</a></span>
        ";
?>

<br><br><br>
<?php
echo    "   <h3 style='display:inline;'>Home Page? </h3>
            <a href='index.php'>Go to Home</a>
        ";
?>