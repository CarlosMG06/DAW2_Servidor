<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 1.1 - Taules</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            width: 2em;
            height: 1em;
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>Exercici 1.1 - Taules</h2>
    <h4>Ex1</h4>

    <?php

    $n = 10;
    echo "<table>\n  <tr>";
    for ($i = 0; $i <= $n; $i++) {
        echo "    <td>$i</td>";
    }
    echo "  </tr>\n</table>";

    ?>

    <h4>Ex2</h4>

    <?php

    $n = 25;
    echo "<table>";
    # 1a fila
    echo "<tr>";
    for ($i = 0; $i <= $n; $i++) {
        echo "<td>".chr(65+$i)."</td>";
    }
    echo "</tr>";
    # 2a fila
    echo "<tr>";
    for ($i = 0; $i <= $n; $i++) {
        echo "    <td>$i</td>";
    }
    echo "</tr>";
    echo "</table>";

    ?>
    <h4>Ex3</h4>

    <?php

    $n = 12;
    $m = 8;
    echo "<table>";
    for ($i = 0; $i <= $m; $i++) {
        echo "<tr>";
        for ($j = 0; $j <= $n; $j++) {
            echo "<td>".$i+$j."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    ?>
    <h4>Ex4</h4>

    <?php
    $n = 9;
    $m = 6;
    echo "<table>";
    for ($j = 0; $j <= $m; $j++) {
        echo "<tr>";
        for ($i = 0; $i <= $n; $i++) {
            echo "<td>";
            if ($j == 0 && $i != 0) {
                echo "$i";
            } elseif ($j != 0 && $i == 0) {
                echo chr(64+$j);
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h4>Ex5</h4>

    <?php
    $n = 6;
    $m = 10;
    echo "<table>";
    for ($j = 0; $j <= $m; $j++) {
        echo "<tr>";
        for ($i = 0; $i <= $n; $i++) {
            echo "<td>";
            if ($j == $m && $i != $n) {
                echo "$i";
            } elseif ($i == $n && $j != $m) {
                echo chr(65+$j);
            } elseif (($j + $i) % 2 == 0) {
                echo "X";
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

</body>
</html>
