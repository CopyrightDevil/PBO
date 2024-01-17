<?php
// Start sessie (
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['userid'])) {
    // niet ingelogd, dan verwijst het naar index.php
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>

<head>
    <title>Home</title>
</head>
<body>

    <h2>Welkom op de homepagina</h2>

    <?php
    // Toont de gebruiker
    echo "Userid: " . $_SESSION['userid'] . "<br>";
    echo "Gebruikersnaam: " . $_SESSION['username'];
    ?>

</body>
</html>

