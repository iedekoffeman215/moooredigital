<?php
// Inclusie van databaseverbinding
include "../database_conn.php";

// Controleer of het verzoek een POST-verzoek is
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Haal de gegevens op uit het POST-verzoek
    $countryName = $_POST['countryName'];
    $flagUrl = $_POST['flagUrl'];
    $countryCode = $_POST['countryCode'];

    // Bouw de SQL-query om een nieuw land toe te voegen aan de database
    $query = "INSERT INTO land (naam, vlag, landcode) VALUES ('$countryName', '$flagUrl','$countryCode')";
    
    // Voer de query uit en sla het resultaat op
    $result = mysqli_query($connection, $query);

    // Controleer of de query succesvol is uitgevoerd
    if ($result) {
        // Als het toevoegen van het land is gelukt, stuur de gebruiker terug naar de index.php pagina
        echo '<script>';
        echo 'window.location.href = "../index.php";'; 
        echo '</script>';
    } else {
        // Als er een fout is opgetreden, geef een foutmelding weer met behulp van mysqli_error
        echo "Fout bij het toevoegen van het land: " . mysqli_error($connection);
    }

    // Sluit de databaseverbinding (dit is momenteel uitgeschakeld)
    // mysqli_close($connection);
}
?>
