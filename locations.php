<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclusie van CSS-bestanden -->
    <link rel="stylesheet" href="css/locations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Landinformatie</title>
</head>
<body>
<div class="header-container">
    <!-- Terugknop om terug te gaan naar de vorige pagina -->
    <div class="back-icon">
        <a href="#" onclick="history.go(-1); return false;"><i class="fas fa-arrow-left"></i> Terug</a>
    </div>
</div>
<?php
// Inclusie van databaseverbinding
include "database_conn.php";

if (isset($_GET['landCode'])) {
    $landCode = $_GET['landCode'];
    $landNaam = $_GET['landNaam'];
    
    // Query om landinformatie op te halen op basis van landcode
    $query = "SELECT * FROM land WHERE landcode = '$landCode'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $countryName = $row['naam'];
        $flagUrl = $row['vlag'];
        $landcode = $row['landcode'];
        $landid = $row["land_id"];

        // Toon landinformatie
        echo '<div class="country-details">';
        echo '<img src="' . $flagUrl . '" alt="' . $countryName . ' flag">';
        echo '<h2>' . $countryName . '</h2>';
        echo '<p>Landcode: ' . $landcode . '</p>';
        echo '</div>';

        // Query om locaties op te halen die aan dit land zijn gekoppeld
        $locationQuery = "SELECT * FROM locatie WHERE land_id = '$landid'";
        $locationResult = mysqli_query($connection, $locationQuery);
        
        echo '<table class="location-table">';
        echo '<th>Locatie</th><th>Opties</th>';

        if ($locationResult && mysqli_num_rows($locationResult) > 0) {
            while ($locationRow = mysqli_fetch_assoc($locationResult)) {
                $locatieId = $locationRow['locatie_id'];
                echo '<tr>';
                echo '<td>' . $locationRow['naam'] . '</td>';
                // Link naar de pagina met productinformatie voor deze locatie
                echo '<td><a href="products.php?locatie_id=' . $locatieId . '&landCode=' . $landCode . '&landNaam=' . $landNaam . '"><i class="fa-solid fa-circle-info fa-xl" style="color: #1d2d49;"></i></a></td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td>Geen locaties</td></tr>';
        }

        // Formulier voor het toevoegen van nieuwe locaties aan dit land
        echo '<form method="post" action="create/addLocation.php">';
        echo '<input type="hidden" name="landCode" value="' . $landCode . '">';
        echo '<input type="hidden" name="landNaam" value="' . $landNaam . '">';
        echo '<input type="hidden" name="landid" value="' . $landid . '">';
        echo '<div class="form-group">';
        echo '<label for="locatienaam">Locatienaam:</label>';
        echo '<input type="text" id="locatienaam" name="locatienaam" placeholder="Voer locatienaam in" required>';
        echo '</div>';
        echo '<input type="submit" value="Locatie toevoegen">';
        echo '</form>';

        echo '</table>';
    } else {
        echo "Geen land gevonden in de database.";
    }
} else {
    echo "Geen landcode ontvangen.";
}

// Sluit de databaseverbinding
mysqli_close($connection);
?>
</body>
</html>
