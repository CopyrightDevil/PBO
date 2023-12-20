<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=winkel", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $conn->query("SELECT * FROM producten");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    if (count($products) > 0) {
        echo "<h2>Producten:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Product Naam</th><th>Prijs per Stuk</th><th>Omschrijving</th></tr>";
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>{$product['product_naam']}</td>";
            echo "<td>{$product['prijs_per_stuk']}</td>";
            echo "<td>{$product['omschrijving']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Geen producten gevonden.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
