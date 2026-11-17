<html>
<head>
	<title>Ex 3.2 - Llengües per nom</title>
</head>
<body>
	<h1>Exercici 3.2: Filtrar llengües per nom</h1>
	<form method="post">
		<input type="text" name="filtre">
		<input type="submit" value="Enviar">
	</form>
	<?php
		if (!empty($_POST)) {
			$filtre = $_POST['filtre'];
		}
		$consulta = "SELECT DISTINCT Language, IsOfficial FROM countrylanguage WHERE Language like '%$filtre%' ORDER BY Language";
		require_once "../bbdd_utils.php";
		$resultat = consultarMySQL($consulta);
	?> 
	<table>
    <h4>Llistat de llengües</h4>
	<ul>
	<?php
		while( $registre = mysqli_fetch_assoc($resultat) )
		{
			echo "\t\t<li>".$registre["Language"];
			echo $registre["IsOfficial"] == "T" ? " [OFICIAL]" : "";
			echo "</li>\n";
		}
	?>
	</ul>
</body>
</html>