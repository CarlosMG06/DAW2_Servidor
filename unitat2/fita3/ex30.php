<html>
<head>
	<title>Ex 3.0 - Ciutats per nom</title>
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
	<h1>Exercici 3.0: Filtrar ciutats per nom</h1>
	<form method="post">
		<input type="text" name="filtre">
		<input type="submit" value="Enviar">
	</form>
	<?php
		if (!empty($_POST['filtre'])) {
		$filtre = $_POST['filtre'];
		}
		$consulta = "SELECT * FROM city where name like '%$filtre%' ";
		require_once "../bbdd_utils.php";
		$resultat = consultarMySQL($consulta);
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