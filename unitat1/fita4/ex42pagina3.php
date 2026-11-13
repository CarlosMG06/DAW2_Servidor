<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 4.2 - Coincidències de frases</title>
</head>
<body>
    <h1>COINCIDÈNCIES</h1>
    <?php
    session_start();
    $frase1 = strtolower($_SESSION["frase1"]);
    $frase2 = strtolower($_POST["frase2"]); 
    $paraules1 = explode(" ", str_replace(".", "", $frase1));
    $paraules2 = explode(" ", str_replace(".", "", $frase2));
    $coincidencies = [];
    for ($i=0; $i < count($paraules1); $i++) { 
        $p1 = $paraules1[$i];
        if ((in_array($p1, $paraules2) && !in_array($p1, $coincidencies))) {
            $recompte = 0;
            for ($j=0; $j < count($paraules1); $j++) { 
                if ($paraules1[$j] == $p1)
                    $recompte++;
            }
            for ($j=0; $j < count($paraules2); $j++) { 
                if ($paraules1[$j] == $p1)
                    $recompte++;
            }
            echo "<p>La paraula \"".$p1."\" s'ha repetit ".$recompte." vegades</p>";
            $coincidencies[] = $p1;
        }
    }
    ?>
    <a href="ex42pagina1.php">Tornar a inici</a>
</body>
</html>