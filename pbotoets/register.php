<?php
// zorgt ervoor dat register php word verbonden met mijn database
require_once 'dbconn.php';

// Start de sessie 
session_start();

// Controleerd de post 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ontvang gebruikersnaam en wachtwoord uit de post
    $gebruikersnaam = trim($_POST['gebruikersnaam']);
    $wachtwoord = trim($_POST['wachtwoord']);

    try {
        // Hash het wachtwoord voordat het wordt opgeslagen voor beveiliging
        $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

        // een SQL-query om de user toe te voegen
        $query = "INSERT INTO Users (Username, Password) VALUES (:gebruikersnaam, :wachtwoord)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
        $stmt->bindParam(':wachtwoord', $hashedWachtwoord);
        $stmt->execute();

        // Haal de automatisch gegenereerde AI Userid op
        $userid = $pdo->lastInsertId();

        // Sla user gegevens op in de sessie
        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $gebruikersnaam;

        // verwijst naar index.php
        header('Location: index.php');
        exit();
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
    <title>Registratie</title>
</head>
<body>

    <h2>Registratie</h2>

    <form action="register.php" method="post">
        <label for="gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>

        <br>

        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" id="wachtwoord" name="wachtwoord" required>

        <br>

        <input type="submit" value="Register">
    </form>

</body>
</html>
