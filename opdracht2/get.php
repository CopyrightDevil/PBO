<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Formulier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        h2 {
            margin-top: 20px;
        }

        p {
            margin: 0;
        }
    </style>
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
