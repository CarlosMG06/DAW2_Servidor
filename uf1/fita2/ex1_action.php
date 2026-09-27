
<html>
<body>

<?php
$users = [
    ["Amelia","P4ssw0rd!"],
    ["Boris","I<3NewYork"],
    ["Christine","Getting$$$"]
];

$data = [$_POST["name"], $_POST["password"]];

if (in_array($data, $users)) {
    echo "<p>Login correcte!</p>";
    echo "<p>Bon dia, ".$_POST[name]."!</p>";
} else {
    echo "<p>Login incorrecte.</p>";
    echo "<a href='ex1_form.html'>Torna</a>";
}

?>

</body>
</html