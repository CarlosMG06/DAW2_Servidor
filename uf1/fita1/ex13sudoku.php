<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            width: 1.8em;
            height: 1.8em;
            text-align: center;
        }
        colgroup, tbody { border: 3px solid black }

        textarea {
            width: 1.2em;
            height: 1.2em;
            text-align: center;
            resize: none;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>

    <h2>Exercici 1.3 - Sudoku</h2>
    <h4>Ex1. Taulell</h4>

    <table>
        <colgroup><col/><col/><col/></colgroup>
        <colgroup><col/><col/><col/></colgroup>
        <colgroup><col/><col/><col/></colgroup>
<?php
    for ($i = 0; $i < 9; $i++) {
        if ($i % 3 == 0) echo "    <tbody>\n";
        echo "    <tr>\n";
        for ($j = 0; $j < 9; $j++) {
            echo "      <td> </td>\n";
        }
        echo "    </tr>\n";
    }
?>
    </table>

    <h4>Ex2. 20 números aleatoris en coordenades aleatòries</h4>

    <table>
        <colgroup><col/><col/><col/></colgroup>
        <colgroup><col/><col/><col/></colgroup>
        <colgroup><col/><col/><col/></colgroup>
<?php 

    $n = 20;
    $coordPairs = [];
    for ($i = 0; $i < $n; $i++) {    
        do {
            $coordPair = [random_int(0,8), random_int(0,8)];
        } while (in_array($coordPair, $coordPairs));
        $coordPairs[] = $coordPair;
    }

    for ($i = 0; $i < 9; $i++) {
        if ($i % 3 == 0) echo "    <tbody>\n";
        echo "    <tr>\n";
        for ($j = 0; $j < 9; $j++) {
            echo "      <td>";
            if (in_array([$j,$i], $coordPairs)) echo random_int(1,9);
            echo "</td>\n";
        }
        echo "    </tr>\n";
    }
?>
    </table>

    <h4>Ex3. Cel·les amb camps de formulari - "jugable" (emplenable)</h4>

    <form>
    <table>
        <colgroup><col/><col/><col/></colgroup>
        <colgroup><col/><col/><col/></colgroup>
        <colgroup><col/><col/><col/></colgroup>
<?php

    $n = 20;
    $coordPairs = [];
    for ($i = 0; $i < $n; $i++) {    
        do {
            $coordPair = [random_int(0,8), random_int(0,8)];
        } while (in_array($coordPair, $coordPairs));
        $coordPairs[] = $coordPair;
    }

    for ($i = 0; $i < 9; $i++) {
        if ($i % 3 == 0) echo "    <tbody>\n";
        echo "    <tr>\n";
        for ($j = 0; $j < 9; $j++) {
            echo "      <td id='td".$j."_".$i."'>\n";
            if (in_array([$j,$i], $coordPairs)) {
                echo "        ".random_int(1,9)."\n";
            } else {
                echo "        <textarea id='ta".$j."_".$i."'></textarea>\n";
            }
            echo "      </td>\n";
        }
        echo "    </tr>\n";
    }

?>
    </table>
    </form>

</body>
</html>
