<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 2.4 - Correcció de contrasenya</title>
</head>
<body>

<?php
    echo "<p>";
    if ($_POST["contrasenya1"] !== $_POST["contrasenya2"]) {
        echo "ERROR: les contrasenyes han de coincidir";
    } else if (!preg_match("/[0-9]/", $_POST["contrasenya1"])) {
        echo "ERROR: la contrasenya ha de tenir al menys un número.";
    } else {
        echo "Contrasenya segura!";
    }
    echo "</p>";
?>

</body>
</html>
