<html>
<head>
	<title>Ex 4.2 - Països per un o més continents</title>
</head>
<body>
	<h1>Exercici 4.2: Filtrar països per continent (selecció múltiple)</h1>
	<form method="post">
		<?php
			require_once "../bbdd_utils.php";

			$consulta = "SELECT DISTINCT Continent FROM country";
			$resultat = consultarBBDD($consulta);
			while( $registre = mysqli_fetch_assoc($resultat) )
			{
				$c = $registre['Continent'];
				echo "\t\t<input type='checkbox' name='continents[]' value='$c'>$c</input>";
			}
		?>
		<input type="submit" value="Enviar">
	</form>
	<?php
		$where = "";
		if (!empty($_POST['continents'])) {
		    $continents = $_POST['continents'];
			$continents = array_map(fn($c) => ("'$c'"), $continents);
			$continentsStr = implode(",",$continents);
			$where = "WHERE country.Continent IN ($continentsStr)";
		}
		$consulta = "SELECT Name from country $where";
		$resultat = consultarBBDD($consulta);
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