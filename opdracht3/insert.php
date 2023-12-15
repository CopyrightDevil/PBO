<?php
// Databaseconfiguratie
$servername = "localhost";
$username = "root";
$password = "";


// Maak verbinding met de database
try {
    $conn = new PDO("mysql:host=$servername;dbname=winkel", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbonden met de database<br>";
} catch (PDOException $e) {
    echo "Fout bij het verbinden met de database: " . $e->getMessage();
}

// Verwerk het formulier
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang de gegevens uit het formulier
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    try {
        // Voeg het product toe aan de tabel 'producten'
        $stmt = $conn->prepare("INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)");
        $stmt->bindParam(':product_naam', $product_naam);
        $stmt->bindParam(':prijs_per_stuk', $prijs_per_stuk);
        $stmt->bindParam(':omschrijving', $omschrijving);
        $stmt->execute();

        echo "Product succesvol toegevoegd!<br>";
    } catch (PDOException $e) {
        echo "Fout bij toevoegen van product: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Toevoegen</title>
</head>
<body>
    <h2>Voeg een nieuw product toe</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="product_naam">Product Naam:</label>
        <input type="text" name="product_naam" required><br>

        <label for="prijs_per_stuk">Prijs per Stuk:</label>
        <input type="number" step="0.01" name="prijs_per_stuk" required><br>

        <label for="omschrijving">Omschrijving:</label>
        <textarea name="omschrijving" rows="4" required></textarea><br>

        <button type="submit">Voeg Product Toe</button>
    </form>
</body>
</html>
