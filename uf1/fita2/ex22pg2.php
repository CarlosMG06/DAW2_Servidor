<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 2.2 - Generador de links</label></title>
</head>
<body>
    
<?php
for ($i=0; $i < $_POST["amount"]; $i++) { 
    echo "<a href='ex22pg3.php?cmd=".$i."'>Comanda ".$i."</a><br>";
}
?>

</body>
</html>
