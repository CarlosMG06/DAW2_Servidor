<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botiga</title>
</head>
<body>
    <form action="" method="post">
        <?php
        $productesStr = file_get_contents("ex35productes.txt");
        $productes = explode("\n", $productesStr);
        for ($i=0; $i < count($productes); $i++) { 
            $prod = $productes[$i];
            echo '<input type="checkbox" id="check'.$i.'" name="prods[]" value="'.$prod.'">'."\n";
            echo '<label for="check'.$i.'">'.$prod.'</label><br>'."\n";
        }
        ?>
        <label for="username">Nom d'usuari: </label>
        <input type="text" name="username" id="username">
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_POST) {
        var_dump($_POST["prods"]);
        $comanda = $_POST["username"];
        if ($_POST["prods"]) {
            $comanda .= ",";
            $comanda .= join(",", $_POST["prods"]);
        }
        $comanda .= "\n";
        file_put_contents("ex35comandes.txt", $comanda, FILE_APPEND);
    }
    ?>
</body>
</html>