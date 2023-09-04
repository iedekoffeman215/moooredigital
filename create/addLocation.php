<?php
    // Inclusie van databaseverbinding
    include "../database_conn.php";

    // Controleer of het huidige verzoek een POST-verzoek is
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Haal de waarden op uit het POST-verzoek
        $landCode = $_POST['landCode'];
        $locatienaam = $_POST['locatienaam'];
        $landid = $_POST['landid'];

        // Voeg een nieuwe locatie toe aan de database met behulp van een SQL-query
        $insertQuery = "INSERT INTO locatie (naam, land_id) VALUES ('$locatienaam', '$landid')";
        $insertResult = mysqli_query($connection, $insertQuery);

        // Controleer of de invoeging van de locatie succesvol was
        if ($insertResult) {
            // Als de invoeging is gelukt, stuur de gebruiker door naar de "locations.php" pagina met relevante parameters
            echo '<script>';
            echo 'window.location.href = "../locations.php?landCode=' . $_POST['landCode'] . '&landNaam=' . $_POST['landNaam'] . '";';
            echo '</script>';
        } else {
            // Als er een fout is opgetreden, geef een foutmelding weer met behulp van mysqli_error
            echo "Fout bij het toevoegen van de locatie: " . mysqli_error($connection);
        }
    }

    // Sluit de databaseverbinding
    mysqli_close($connection);
?>
