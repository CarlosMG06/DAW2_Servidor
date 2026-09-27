<html>
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