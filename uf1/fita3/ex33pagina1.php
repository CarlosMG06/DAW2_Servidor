<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Afegeix comentari</h2>
    <form action="" method="post">
        <textarea name="comment" id=""></textarea>
        <input type="submit" value="Enviar">
    </form>

    
    <pre>
        <?php
        echo file_get_contents("ex33.txt");
        ?>
    </pre>
</body>
</html>