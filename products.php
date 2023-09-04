<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
    <title>Landinformatie</title>
</head>
<body>
<div class="header-container">
    <div class="back-icon">
        <a href="#" onclick="history.go(-1); return false;"><i class="fas fa-arrow-left"></i> Terug</a>
    </div>
</div>

<?php
    include "database_conn.php";

    if (isset($_GET['locatie_id'])) {
        $landCode = $_GET['landCode'];
        $landNaam = $_GET['landNaam'];
        $locatieId = $_GET['locatie_id'];
        
        $query = "SELECT * FROM land WHERE landcode = '$landCode'";
        $result = mysqli_query($connection, $query);

        $locationQuery = "SELECT * FROM locatie WHERE locatie_id = '$locatieId'";
        $locationResult = mysqli_query($connection, $locationQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            $locationRow = mysqli_fetch_assoc($locationResult);
            $row = mysqli_fetch_assoc($result);
            $countryName = $row['naam'];
            $flagUrl = $row['vlag'];
            $landcode = $row['landcode'];
            $landid = $row["land_id"];
            $locatieName = $locationRow['naam'];
            $locatieid = $locationRow['locatie_id'];


            echo '<div class="country-details">';
            echo '<img src="' . $flagUrl . '" alt="' . $countryName . ' flag">';
            echo '<h2>' . $countryName . '</h2>';
            echo '<p>Landcode: ' . $landcode . '</p>';
            echo '<h2>' . $locatieName . '</h2>';
            echo '</div>';


                echo '<table class="location-table">';
                echo '<th>Locatie</th><th>Producten</th>';

                mysqli_data_seek($locationResult, 0);


                while ($locationRow = mysqli_fetch_assoc($locationResult)) {
                    echo '<tr class="location-row">';
                    echo '<td class="location-name">' . $locationRow['naam'] . '</td>';
                    echo '<td><i class="fas fa-caret-down"></i></td>';
                    echo '</tr>';
                    echo '<tr class="hidden-row">';
                    echo '<td colspan="2" class="location-details">';
                    echo '<table>'; // Nieuwe tabel binnen uitklapbare inhoud
                    echo '<tr><th>Merk</th><th>Soort</th><th>Beschrijving</th><th>Voorraad</th><th>Opties</th></tr>';
                    
                    // Nieuwe query om productgegevens op te halen
                    $productQuery = "SELECT * FROM product WHERE locatie_id = '" . $locationRow['locatie_id'] . "'";
                    $productResult = mysqli_query($connection, $productQuery);
                    
                    if ($productResult && mysqli_num_rows($productResult) > 0) {
                        while ($productRow = mysqli_fetch_assoc($productResult)) {
                            echo '<tr>';
                            echo '<input type="hidden" name="locatieid" value="' . $locatieid . '">';
                            echo '<input type="hidden" name="landCode" value="' . $landCode . '">';
                            echo '<input type="hidden" name="land" value="' . $landNaam . '">';
                            echo '<td>' . $productRow['merk'] . '</td>';
                            echo '<td>' . $productRow['soort'] . '</td>';
                            echo '<td>' . $productRow['beschrijving'] . '</td>';
                            echo '<td>';
                            echo '<span class="quantity-controls">';
                            echo '<span id="voorraad-' . $productRow['product_id'] . '">' . $productRow['aantal'] . '</span>';
                            echo '</span>';
                            echo '</td>';
                            // Voeg het bewerk-icoontje toe aan elke productrij
                            echo '<td><a href="update/editProduct.php?product_id=' . $productRow['product_id'] .  '&landNaam=' . $landNaam. '&landCode=' . $landCode .  '&locatieid=' .$locatieid . '"><i class="fas fa-edit edit-icon"></i></a></td>';
                            
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Geen producten gevonden</td></tr>';
                    }
                    
                    echo '</table>';
                    echo '</td>';
                    echo '</tr>';
                }

    
        
                
        echo '<form method="post" action="create/addProduct.php">';
        echo '<input type="hidden" name="locatieid" value="' . $locatieid . '">';
        echo '<input type="hidden" name="landCode" value="' . $landCode . '">';
        echo '<input type="hidden" name="land" value="' . $landNaam . '">';
        echo '<div class="form-group">';
        echo '<label for="locatienaam">Product toevoegen:</label>';
        echo '<input type="text" id="merk" name="merk" placeholder="Voer merknaam in" required>';
        echo '<input type="text" id="soort" name="soort" placeholder="Voer soort in" required>';
        echo '<input type="text" id="beschrijving" name="beschrijving" placeholder="Voer beschrijving in" required>';
        echo '<input type="number" id="voorraad" name="voorraad" placeholder="Selecteer voorraad" required>';
        echo '</div>';
        echo '<input type="submit" name="submit" value="Product toevoegen">';
        echo '</form>';

        echo '</table>';


        } else {
            echo "Geen land gevonden in de database.";
        }
    } else {
        echo "Geen sadasd ontvangen.";
    }

    mysqli_close($connection);
?>

<script src="js/locatieinfo.js"></script>

</body>
</html>
