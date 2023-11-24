<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Formulier</title>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  
    $naam = $_GET["naam"];
    $achternaam = $_GET["achternaam"];
    $leeftijd = $_GET["leeftijd"];
    $adres = $_GET["adres"];
    $email = $_GET["email"];

   
    echo "<h2>Ingevoerde gegevens (GET):</h2>";
    echo "<p><strong>Naam:</strong> $naam</p>";
    echo "<p><strong>Achternaam:</strong> $achternaam</p>";
    echo "<p><strong>Leeftijd:</strong> $leeftijd</p>";
    echo "<p><strong>Adres:</strong> $adres</p>";
    echo "<p><strong>Email:</strong> $email</p>";
}
?>


<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="naam">Naam:</label>
    <input type="text" name="naam" required><br>

    <label for="achternaam">Achternaam:</label>
    <input type="text" name="achternaam" required><br>

    <label for="leeftijd">Leeftijd:</label>
    <input type="number" name="leeftijd" required><br>

    <label for="adres">Adres:</label>
    <input type="text" name="adres" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <input type="submit" value="Verzenden">
</form>

</body>
</html>
