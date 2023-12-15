<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Formulier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        h2 {
            margin-top: 30px;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $naam = $_POST["naam"];
    $achternaam = $_POST["achternaam"];
    $leeftijd = $_POST["leeftijd"];
    $adres = $_POST["adres"];
    $email = $_POST["email"];

    
    echo "<h2>Ingevoerde gegevens (POST):</h2>";
    echo "<p><strong>Naam:</strong> $naam</p>";
    echo "<p><strong>Achternaam:</strong> $achternaam</p>";
    echo "<p><strong>Leeftijd:</strong> $leeftijd</p>";
    echo "<p><strong>Adres:</strong> $adres</p>";
    echo "<p><strong>Email:</strong> $email</p>";
}
?>


<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
