<html>
<head>
	<title>Ex 5.2 - Llengües per nom del país</title>
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
	<h1>Exercici 5.2: Filtrar llengües per nom del país</h1>
	<form method="post">
		<input type="text" name="pais">
		<input type="submit" value="Enviar">
	</form>
	<?php
		require_once "../bbdd_utils.php";

		if (!empty($_POST['pais'])) {
		    $pais = $_POST['pais'];
		}
		$consulta = "SELECT co.Name CountryName, lang.Language, lang.IsOfficial, lang.Percentage from country co JOIN countrylanguage lang ON co.Code = lang.CountryCode WHERE co.Name like '%$pais%'";
		$resultat = consultarPDO($consulta);
	?> 
	<table>
	<thead><td colspan="4">Llistat de llengües</td></thead>
	<?php
        $registre = $resultat->fetch();
		while( $registre )
		{
			echo "\t<tr>\n";
			echo "\t\t<td>".$registre['CountryName']."</td>\n";
			echo "\t\t<td>".$registre['Language']."</td>\n";
			echo "\t\t<td>".$registre['IsOfficial']."</td>\n";
			echo "\t\t<td>".$registre['Percentage']."</td>\n";
			echo "\t</tr>\n";
            $registre = $resultat->fetch();
		}
	?>
	</table>
</body>
</html>