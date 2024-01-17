<?php

$host = 'localhost'; 
$dbname = 'login'; 
$username = 'root'; 
$password = ''; 

try {
    // PDO-verbinding aan maken
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Instellen van PDO foutmeldingen naar uitzonderingen
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // toon de foutmelding
    die("Fout bij verbinden met de database: " . $e->getMessage());
}
?>

