<html>
<body>
    <form action="ex25pg3.php" method="post">
        <?php
        for ($i=0; $i < $_GET["items"]; $i++) {
            echo '<label for="text'.$i.'">Text '.$i.'</label>';
            echo '<input type="text" id="text'.$i.'" name="texts[]"><br>';
        }
        ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>