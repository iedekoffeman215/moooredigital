<?php
// Inclusie van de databaseverbinding
include "database_conn.php"; 

// Definieer de huidige pagina als 'actievelanden' voor de navigatiebalk
$pagina = 'actievelanden';

// Inclusie van de navigatiebalk
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclusie van CSS-bestanden -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Actieve landen</title>
</head>
<body>
    <!-- Titel van de pagina -->
    <h1 class="header">
        <span>Actieve landen</span>
    </h1>

    <!-- Grid voor de landen -->
    <div class="grid">
    <?php
    // Query om landgegevens op te halen
    $query = "SELECT naam, vlag, landcode FROM land";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $countryName = $row['naam'];
            $flagUrl = $row['vlag'];
            $landcode = $row['landcode'];

            // Weergave van landinformatie en knoppen
            echo '<div class="country">';
            echo '<img src="' . $flagUrl . '" alt="' . $countryName . ' flag">';
            echo '<h2>' . $countryName . '</h2>';
            echo '<button class="country-info" onclick="toggleInfo(this)"><i class="fa-solid fa-circle-info fa-xl" style="color: #1d2d49;"></i></button>';
            echo '<div class="info">';
            echo '<p>Landnaam: ' . $countryName . '</p>';
            echo '<p>Landcode: ' . $landcode . '</p>';

            // Formulier voor het verzenden van landinformatie naar de 'locations.php'-pagina
            echo '<form method="get" action="locations.php">';
            echo '<input type="hidden" name="landCode" value="' . $landcode . '">';
            echo '<input type="hidden" name="landNaam" value="' . $countryName . '">';
            echo '<button class="meerinfo" type="submit">Meer informatie</button>';
            echo '</form>';

            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "Geen landen gevonden in de database.";
    }

    // Sluit de databaseverbinding
    mysqli_close($connection);
    ?>
    </div>

    <!-- Inclusie van JavaScript-bestand -->
    <script src="js/info.js"></script>
</body>
</html>
