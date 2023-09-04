<?php
// Inclusie van databaseverbinding
include "database_conn.php";

// Definieer de huidige pagina als 'landtoevoegen' voor de navigatiebalk
$pagina = 'landtoevoegen';

// Inclusie van de navigatiebalk
include "navbar.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclusie van CSS-bestanden -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Land toevoegen</title>
</head>
<body>
    <!-- Titel van de pagina en zoekbalk -->
    <h1 class="header">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Zoek een landnaam of landcode...">
            <button onclick="searchCountries()">Zoeken</button>
        </div>
    </h1>

    <!-- Grid voor landen -->
    <div class="grid">
        <?php
        // URL om landgegevens op te halen via de Restcountries API
        $url = 'https://restcountries.com/v3.1/all';

        // Haal de API-response op en decodeer deze naar een array
        $response = file_get_contents($url);
        $countries = json_decode($response, true);

        // Loop door de landen en toon de informatie
        foreach ($countries as $country) {
            $countryName = $country['name']['common'];
            $countryCode = $country['cca2'];
            $flagUrl = $country['flags']['png'];

            echo '<div class="country">';
            echo '<img src="' . $flagUrl . '" alt="' . $countryName . ' flag">';
            echo '<h2>' . $countryName . '</h2>';
            echo '<p class="country-code">Landcode: ' . $countryCode . '</p>';
            echo '<button class="country-info" onclick="toggleInfo(this)"><i class="fa-solid fa-circle-info fa-xl" style="color: #1d2d49;"></i></button>';
            echo '<div class="info">';
            echo '<p>Landnaam: ' . $countryName . '</p>';
            echo '<p>Landcode: ' . $countryCode . '</p>';

            // Formulier voor het verzenden van landinformatie naar de 'addCountry.php'-pagina voor toevoeging aan de database
            echo '<form method="post" action="create/addCountry.php">';
            echo '<input type="hidden" name="countryName" value="' . $countryName . '">';
            echo '<input type="hidden" name="flagUrl" value="' . $flagUrl . '">';
            echo '<input type="hidden" name="countryCode" value="'. $countryCode .'">';
            echo '<button type="submit">Toevoegen</button>';
            echo '</form>';

            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <!-- Inclusie van JavaScript-bestand -->
    <script src="info.js"></script>
</body>
</html>
