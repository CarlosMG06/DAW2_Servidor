<html>
<body>
    <form action="ex5_pg4.php" method="post">
        <?php
        foreach ($_POST["texts"] as $i => $text) {
            echo '<input type="checkbox" id="check'.$i.'" name="checks[]" value="'.$text.'">';
            echo '<label for="check'.$i.'">'.$text.'</label><br>';
        }
        ?>        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>