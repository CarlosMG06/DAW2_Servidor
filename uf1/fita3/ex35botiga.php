<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botiga</title>
</head>
<body>
    <form action="ex35botiga.php" method="post">
        <?php
        $productesStr = file_get_contents("ex35productes.txt");
        $productes = explode("\n", $productesStr);
        for ($i=0; $i < count($productes); $i++) { 
            $prod = $productes[$i];
            echo '<input type="checkbox" id="check'.$i.'" name="checks[]" value="'.$prod.'">';
        }
        ?>
        <input type="checkbox" name="" id="">
        <label for="username"></label>
        <input type="text" name="username" id="username">
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_POST) {

    }
    ?>
</body>
</html>