<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Register</h2>
    <form action="register.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <input type="submit" name="register" value="Register">
    </form>
</body>

</html>

<?php
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];

    if ($user->register()) {
        echo "Registration successful!";
    } else {
        echo "Registration failed.";
    }
}
?>