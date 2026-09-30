<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<?php
    if ($_POST["skin"] !== "" && $_POST["skin"] !== "Cap") {
        echo '<link rel="stylesheet" href="'.$_POST["skin"].'">';
    }
?>

</head>
<body>
    
<form action="ex3_pagina1.php" method="post">
Escull skin:
<select name="skin">
    <option value="Cap" selected>-- Cap skin --</option>
    <option value="ex23_foc.css">FOC!</option>
    <option value="ex23_aigua.css">~aIGuA~</option>
    <option value="ex23_terra.css">terra</option>
</select>
<br>
<input type="submit" value="Canviar skin">   
</form>

</body>
</html>
