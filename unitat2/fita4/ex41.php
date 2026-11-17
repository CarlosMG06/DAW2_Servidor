<html>
<head>
	<title>Ex 4.1 - Països per continent</title>
</head>
<body>
	<h1>Exercici 4.1: Filtrar països per continent</h1>
	<form method="post">
		<select name="continent" id="continent">
            <option value="">--- Tria ---</option>
            <?php
                require_once "../bbdd_utils.php";

                $consulta = "SELECT DISTINCT Continent FROM country";
		        $resultat = consultarMySQL($consulta);
                while( $registre = mysqli_fetch_assoc($resultat) )
		        {
                    $c = $registre['Continent'];
                    echo "\t\t\t<option value='$c'>$c</option>";
                }
            ?>
        </select>
		<input type="submit" value="Enviar">
	</form>
	<?php
		if (!empty($_POST['continent'])) {
		    $continent = $_POST['continent'];
		}
		$consulta = "SELECT Name from country WHERE country.Continent like '%$continent%'";
		$resultat = consultarMySQL($consulta);
	?> 
	<h4>Llistat de països</h4>
    <ul>
	<?php
		while( $registre = mysqli_fetch_assoc($resultat) )
		{
			echo "\t\t<li>".$registre["Name"]."</li>\n";
		}
	?>
	</ul>
</body>
</html>