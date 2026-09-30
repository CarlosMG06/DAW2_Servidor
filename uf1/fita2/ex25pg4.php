<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    echo "<p>Has seleccionat: ";
    
    echo join(", ", $_POST["checks"]);
    
    echo "</p>";
    ?>

</body>
</html>
