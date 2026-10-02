<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquina d'escriure</title>
    <style>
        div {
            background-color: powderblue;
            height: 8em;
            margin: 1em 0;
        }
        button {
            width: 2em;
            height: 1.5em;
        }
        #space {
            width: 12em;
        }
    </style>
</head>
<body>
    <h1>Maquina d'escriure</h1>
      
    <?php
    session_start();
    
    echo "<div>\n";
    
    if ($_GET) 
        $_SESSION["text"] .= $_GET["tecla"];
    if ($_SESSION["text"] === null) {
        $_SESSION["text"] = "";
    } else {
        echo $_SESSION["text"]."\n";
    }

    echo "</div>\n";

    $teclatStr = "QWERTYUIOPASDFGHJKLZXCVBNM ";
    for ($i=0; $i < strlen($teclatStr); $i++) {
        $char = $teclatStr[$i];

        echo "<button onclick='document.location=\"?tecla=";
        if ($char === " ") {echo "%20\"' id='space'>";}
        else {echo $char."\"'>";}
        echo $char."</button>\n";

        if($char === "P" || $char === "L" || $char === "M") {
            echo "<br>";
            echo "<span style='margin-left: ".($i/9)."em;'></span>\n"; // P -> i=9  ·  L -> i=18  · M -> i=25;
        }
    };    
    ?>
    
</body>
</html>