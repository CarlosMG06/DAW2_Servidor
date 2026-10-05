<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 4.3 - Teclat en pantalla</title>
    <style>
        div {
            background-color: powderblue;
            height: 8em;
            margin: 1em 0;
        }
        button {
            width: 2em;
            height: 1.8em;
            margin: 2px 0;
            font-size: 1em;
        }
        #shift { width: 3em; }
        #space { width: 12em; }
    </style>
</head>
<body>
    <h1>Teclat en pantalla</h1>
      
    <?php
    session_start();
    
    echo "<div>\n";
    
    if ($_GET) {
        $tecla = $_GET["tecla"];
        if ($tecla === "^") {
            $_SESSION["shift"] = true;
        } else if ($_SESSION["shift"]) {
            $_SESSION["text"] .= $tecla;
            $_SESSION["shift"] = false;
        } else 
            $_SESSION["text"] .= strtolower($tecla);
    }
    if ($_SESSION["text"] === null) {
        $_SESSION["text"] = "";
    } else {
        echo $_SESSION["text"]."\n";
    }

    echo "</div>\n";

    $teclatStr = "QWERTYUIOPASDFGHJKLZXCVBNM,.^ ";
    for ($i=0; $i < strlen($teclatStr); $i++) {
        $char = $teclatStr[$i];

        echo "<button onclick='document.location=\"?tecla=";
        if ($char === " ") 
            echo "%20\"' id='space'>Space";
        else if ($char === "^") 
            echo "^\"' id='shift'>Shift";
        else 
            echo $char."\"'>".$char;
        echo "</button>\n";
        
        if($char === "P" || $char === "L" || $char === ".") {
            echo "<br>";
            echo "<span style='margin-left: ".($i/9)."em;'></span>\n"; // P -> i=9  ·  L -> i=18  · . -> i=27;
        }
    };    
    ?>
    
</body>
</html>