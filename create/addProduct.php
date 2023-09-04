<?php

// Inclusie van databaseverbinding
include "../database_conn.php";

// Controleer of het huidige verzoek een POST-verzoek is en of 'submit' is ingesteld in de POST-gegevens
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    // Haal de waarden op uit het POST-verzoek
    $merk = $_POST['merk'];
    $soort = $_POST['soort'];
    $beschrijving = $_POST['beschrijving'];
    $voorraad = $_POST['voorraad'];
    $locatie_id = $_POST['locatieid'];
    $landCode = $_POST['landCode'];
    $landNaam = $_POST['land'];

    // Voeg een nieuw product toe aan de database met behulp van een SQL-query
    $insertQuery = "INSERT INTO product (merk, soort, beschrijving, aantal, locatie_id) VALUES ('$merk', '$soort', '$beschrijving', '$voorraad', '$locatie_id')";
    $insertResult = mysqli_query($connection, $insertQuery);

    // Controleer of de invoeging van het product succesvol was
    if ($insertResult) {
        // Als de invoeging is gelukt, stuur de gebruiker door naar de "products.php" pagina met relevante parameters
        echo '<script>';
        echo 'window.location.href = "../products.php?locatie_id=' . $locatie_id . '&landNaam=' . $landNaam . '&landCode=' . $_POST['landCode'] . '";';
        echo '</script>';
    } else {
        // Als er een fout is opgetreden, geef een foutmelding weer met behulp van mysqli_error
        echo "Fout bij het toevoegen van het product: " . mysqli_error($connection);
    }
}

?>
