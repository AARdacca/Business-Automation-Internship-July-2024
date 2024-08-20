<?php
// Start a new session or resume the existing one
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
</head>

<body>
    <h1>User Registration Form</h1>
    <!-- Registration form that posts data to register.php -->
    <form action="register.php" method="post">
        Name: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Address: <input type="text" name="address" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>

<?php
// Link for existing users to log in
echo "<h3 style='display:inline;'><br><br><br>Already a user? </h3> 
      <span><a href='login.php'>Log In</a></span>";
?>

<?php
// Link to the home page
echo "<h3 style='display:inline;'><br><br><br>Home Page? </h3>
      <a href='index.php'>Go to Home</a>";
?>