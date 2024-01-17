<?php
// Inclusief de databaseconnectie
require_once 'dbconn.php';

// Start de sessie (indien nog niet gestart)
session_start();

// Controleer of de post is ingediend
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ontvang gebruikersnaam en wachtwoord uit de post
    $gebruikersnaam = trim($_POST['gebruikersnaam']);
    $wachtwoord = trim($_POST['wachtwoord']);

    try {
        // Bereid SQL-query om de user op te halen
        $query = "SELECT * FROM users WHERE username = :gebruikersnaam";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
        $stmt->execute();

        // Haalt de gegevens op
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // als de gebruiker bestaat, controleer dan het wachtwoord
            if (password_verify($wachtwoord, $user['Password'])) {
                // Inloggen is geslaagd, sla de gebruikersgegevens op in de sessie
                $_SESSION['userid'] = $user['Userid'];
                $_SESSION['username'] = $user['Username'];

                // verwijst het naar home.php
                header('Location: home.php');
                exit();
            } else {
                // foutmelding voor als de wachtwoord verkeerd is
                $foutmelding = "Onjuist wachtwoord. Probeer het opnieuw.";
            }
        } else {
            // Gebruiker bestaat niet, verwijs de gebruiker naar register.php
            header('Location: register.php');
            exit();
        }
    } catch (PDOException $e) {
        die("Fout bij het uitvoeren van de query: " . $e->getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>
    
    <?php if (isset($foutmelding)): ?>
        <p><?php echo $foutmelding; ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>

        <br>

        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" id="wachtwoord" name="wachtwoord" required>

        <br>

        <input type="submit" value="Login">
    </form>

</body>
</html>
