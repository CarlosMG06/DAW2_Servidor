<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 3.4 - Conversor d'article de wiki</title>
</head>
<body>
<?php
    $articleStr = file_get_contents("ex34.txt");
    $linies = explode("\n",$articleStr);
    for ($i=0; $i < count($linies); $i++) { 
        $linia = $linies[$i];
        if (substr($linia, 0, 3) == "## ") {
            $linia = str_replace("## ", "<h1>", $linia)."</h1>";
        }
        echo $linia."\n";
    }  
?>
</body>
</html>