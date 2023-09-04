<?php
include "../database_conn.php";

if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $merk = mysqli_real_escape_string($connection, $_POST['merk']);
    $soort = mysqli_real_escape_string($connection, $_POST['soort']);
    $beschrijving = mysqli_real_escape_string($connection, $_POST['beschrijving']);
    $voorraad = $_POST['voorraad'];
    

    // Voer een UPDATE-query uit om de productinformatie bij te werken
    $updateQuery = "UPDATE product SET merk = '$merk', soort = '$soort', beschrijving = '$beschrijving', aantal = $voorraad WHERE product_id = $product_id";

    if (mysqli_query($connection, $updateQuery)) {
        // Productinformatie succesvol bijgewerkt
        echo '<script>';
        echo 'window.location.href = "../products.php?locatie_id=' .$_POST['locatieid'].  '&landCode=' . $_POST['landCode'] . '&landNaam=' . $_POST['land'] . '";';
        echo '</script>';
    } else {
        // Fout bij het bijwerken van de productinformatie
        echo "Fout bij het bijwerken van de productinformatie: " . mysqli_error($connection);
    }
} else {
    echo "Geen gegevens ontvangen om bij te werken.";
}

mysqli_close($connection);
?>
