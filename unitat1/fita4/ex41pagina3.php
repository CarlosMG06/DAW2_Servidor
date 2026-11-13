<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 4.1 - Endevina el número</title>
</head>
<body>
    <h1>ENDEVINA EL NOMBRE</h1>
    <?php
    session_start();

    if (!$_SESSION["ocult"]) {
        echo "<p>ERROR: Cap número ocult enregistrat.</p>";
        echo "<a href='ex41pagina1.php'>Enregistra'n un aquí</a>\n";
    } else if ($_SESSION["ocult"] == $_POST["endevina"]) {
        echo "<p>El número ocult és igual a l'endevinat! Felicitats!</p>\n";
        echo "<a href='ex41pagina1.php'>Juga de nou</a>\n";
    } else {
        if ($_POST["endevina"]) {
            $comparacio = $_SESSION["ocult"] > $_POST["endevina"] ? "major" : "menor";
            echo "<p>El número ocult és ".$comparacio."</p>\n";
        }
        echo "<form action='' method='post'>\n";
        echo "<label for='endevina'>Endevina: </label>\n";
        echo "<input type='number' name='endevina' id='endevina'>\n";
        echo "<input type='submit' value='Enviar'>\n";
        echo "</form>";
    }
    ?>
</body>
</html>