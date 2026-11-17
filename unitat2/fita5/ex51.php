<html>
<head>
	<title>Ex 5.1 - Ciutats per nom del país</title>
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
	<h1>Exercici 5.1: Filtrar ciutats per nom del país</h1>
	<form method="post">
		<input type="text" name="pais">
		<input type="submit" value="Enviar">
	</form>
	<?php
		require_once "../bbdd_utils.php";

		if (!empty($_POST['pais'])) {
		    $pais = $_POST['pais'];
		}
		$consulta = "SELECT ci.Name CityName, co.Name CountryName from city ci JOIN country co ON ci.CountryCode = co.Code WHERE co.Name like '%$pais%'";
		$resultat = consultarPDO($consulta);
	?> 
	<table>
	<thead><td colspan="4">Llistat de ciutats</td></thead>
	<?php
        $registre = $resultat->fetch();
		while( $registre )
		{
			echo "\t<tr>\n";
			echo "\t\t<td>".$registre['CityName']."</td>\n";
			echo "\t\t<td>".$registre['CountryName']."</td>\n";
			echo "\t</tr>\n";
            $registre = $resultat->fetch();
		}
	?>
	</table>
</body>
</html>