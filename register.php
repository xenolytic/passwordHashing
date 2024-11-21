<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <form action="register.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Register">
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

        // Probeer de gebruiker te registreren
        if ($user->register()) {
            echo "Registration successful!";
        } else {
            echo "Registration failed.";
        }
    }
    ?>
</body>

</html>