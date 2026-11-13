<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 4.4 - Notes de text</title>
    <style>
        pre {background-color: khaki; }
        textarea {resize: none; width: 30%; height: 6em; }
    </style>
</head>
<body>
    <h1>Notes de text</h1>
    <form action="" method="post">
        <textarea name="nota" id=""></textarea>
        <input type="submit" value="Anotar">
    </form>
    <pre>
<?php
session_start();
if ($_SESSION["notes"] === null)
    $_SESSION["notes"] = ""; 
if ($_POST) 
    $_SESSION["notes"] .= $_POST["nota"]."\n\n";
echo "<p>\n".$_SESSION["notes"]."</p>"
?>
    </pre>
</body>
</html>