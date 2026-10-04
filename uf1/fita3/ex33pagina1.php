<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 3.3 - Afegir i mostrar comentaris</title>
    <style>
        pre {background-color: powderblue; }
        textarea {resize: none; width: 30%; height: 6em; }
    </style>
</head>
<body>
    <h2>Afegeix comentari</h2>
    <form action="" method="post">
        <textarea name="comment" id=""></textarea>
        <input type="submit" value="Enviar">
    </form>

    <pre>
<?php
if ($_POST) file_put_contents("ex33.txt", $_POST["comment"]."\n\n", FILE_APPEND);
echo file_get_contents("ex33.txt");
?>
    </pre>
</body>
</html>