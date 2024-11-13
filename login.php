<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>

<?php
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];

    if ($user->login()) {
        echo "<div class='message'>Login successful!</div>";
    } else {
        echo "<div class='message'>Login failed.</div>";
    }
}
?>