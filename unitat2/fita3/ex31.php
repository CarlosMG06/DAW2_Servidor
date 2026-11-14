<html>
<head>
	<title>Ex 3.1 - Ciutats per habitants</title>
	<style>
		table,td {
			border: 1px solid black;
			border-spacing: 0px;
		}
		thead {
			text-align: center;
			background-color: cyan;
		}
	</style>
</head>
<body>
	<h1>Exercici 3.1: Filtrar ciutats per nombre d'habitants</h1>
	<form method="post">
		<label for="min">Min: </label>
		<input type="number" name="min" id="min">
		<label for="max">Max: </label>
		<input type="number" name="max" id="max">
		<input type="submit" value="Enviar">
	</form>
	<?php
		$where = "";
		if (!empty($_POST)) {
			$min = $_POST['min'] ?? 0;
			$max = $_POST['max'] ?? pow(10,9);
			$where = "WHERE population BETWEEN $min AND $max";
		}
		$consulta = "SELECT * FROM city $where ORDER BY population desc";
		require_once "../bbdd_utils.php";
		$resultat = consultarBBDD($consulta);
	?> 
	<table>
	<thead><td colspan="4">Llistat de ciutats</td></thead>
	<?php
		while( $registre = mysqli_fetch_assoc($resultat) )
		{
			echo "\t<tr>\n";
			echo "\t\t<td>".$registre["Name"]."</td>\n";
			echo "\t\t<td>".$registre['CountryCode']."</td>\n";
			echo "\t\t<td>".$registre["District"]."</td>\n";
			echo "\t\t<td>".$registre['Population']."</td>\n";
			echo "\t</tr>\n";
		}
	?>
	</table>
</body>
</html>