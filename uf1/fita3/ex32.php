<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 3.2 - Afegir dades amb separador</title>
    <style>
        textarea {resize: none; width: 30%; height: 6em; }

    </style>
</head>
<body>
    <h1>INTRODUEIX DADES</h1>
    <form action="" method="post">
        <textarea name="comentari" id="comentari"></textarea><br>
        <label for="separador">separador: </label>
        <input type="text" name="separador" id="separador"><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_POST) {
        $file = "comentaris.txt"; 
        $msg = str_replace(" ", $_POST["separador"], $_POST["comentari"])."\n";
        $flag = file_exists($file) ? FILE_APPEND : 0;
        file_put_contents($file, $msg, $flag);
    }
    ?>
</body>
</html>