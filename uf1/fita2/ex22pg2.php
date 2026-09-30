<html>
<body>
    
<?php
for ($i=0; $i < $_POST["amount"]; $i++) { 
    echo "<a href='ex22pg3.php?cmd=".$i."'>Comanda ".$i."</a><br>";
}
?>

</body>
</html>