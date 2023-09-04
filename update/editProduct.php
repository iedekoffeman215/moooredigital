<?php
include "../database_conn.php";

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $landnaam = $_GET['landNaam'];
    $landCode = $_GET['landCode'];
    $locatieid = $_GET['locatieid'];

    // Haal de productinformatie op basis van het product_id
    $productQuery = "SELECT * FROM product WHERE product_id = '$product_id'";
    $productResult = mysqli_query($connection, $productQuery);

    if ($productResult && mysqli_num_rows($productResult) > 0) {
        $productRow = mysqli_fetch_assoc($productResult);
        $merk = $productRow['merk'];
        $soort = $productRow['soort'];
        $beschrijving = $productRow['beschrijving'];
        $voorraad = $productRow['aantal'];

        ?>


        <html lang="en">
        <link rel="stylesheet" href="../css/editproduct.css">
        <head>
        </head>
        <body>
        <div class="back-icon">
             <a href="#" onclick="history.go(-1); return false;"><i class="fas fa-arrow-left"></i> Terug</a>
        </div>


            <form method="post" action="updateProduct.php"> 
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <input type="hidden" name="landCode" value="<?php echo $landCode; ?>">
                <input type="hidden" name="land" value="<?php echo  $landnaam; ?>">
                <input type="hidden" name="locatieid" value="<?php echo  $locatieid; ?>">
                <div class="form-group">
                    <label for="merk">Merk:</label>
                    <input type="text" id="merk" name="merk" value="<?php  echo $merk; ?>" required>
                </div>
                <div class="form-group">
                    <label for="soort">Soort:</label>
                    <input type="text" id="soort" name="soort" value="<?php  echo $soort; ?>" required>
                </div>
                <div class="form-group">
                    <label for="beschrijving">Beschrijving:</label>
                    <input type="text" id="beschrijving" name="beschrijving" value="<?php  echo $beschrijving; ?> " required>
                </div>
                <div class="form-group">
                    <label for="voorraad">Voorraad:</label>
                    <input type="number" id="voorraad" name="voorraad" value="<?php  echo $voorraad; ?>" required>
                </div>
                <input type="submit" name="submit" value="Opslaan">
            </form>
        </body>
        </html>
    <?php
    } else {
        echo "Geen product gevonden.";
    }
} else {
    echo "Geen product_id ontvangen.";
}

mysqli_close($connection);
?>
