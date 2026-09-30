<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="ex25pg4.php" method="post">
        <?php
        foreach ($_POST["texts"] as $i => $text) {
            echo '<input type="checkbox" id="check'.$i.'" name="checks[]" value="'.$text.'">';
            echo '<label for="check'.$i.'">'.$text.'</label><br>';
        }
        ?>        
        <input type="submit" value="Enviar">
    </form>

</body>
</html>
