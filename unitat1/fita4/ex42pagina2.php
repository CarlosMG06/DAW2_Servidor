<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 4.2 - Coincidències de frases</title>
</head>
<body>
    <h1>ENREGISTRA FRASE</h1>
    <form action="ex42pagina3.php" method="post">
        <label for="frase2">Frase 2: </label>
        <input type="text" name="frase2" id="frase2">
        <input type="submit" value="Enviar">
    </form>
    <?php
    session_start();
    $_SESSION["frase1"] = $_POST["frase1"];
    ?>
</body>
</html>