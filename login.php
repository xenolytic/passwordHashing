<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>

    <?php
    // Controleer of het formulier is ingediend
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Inclusief database en user bestanden
        include_once 'database.php';
        include_once 'user.php';

        // Maak een nieuwe database verbinding
        $database = new Database();
        $db = $database->getConnection();

        // Maak een nieuwe gebruiker
        $user = new User($db);
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];

        // Probeer de gebruiker in te loggen
        if ($user->login()) {
            echo "Login successful!";
        } else {
            echo "Login failed.";
        }
    }
    ?>
</body>

</html>