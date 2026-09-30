<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Exercici 1.2 - Batalla Naval</h2>
    <h4>Ex1 (Copiar 1.1.4)</h4>

    <?php
    $rows = 10;
    $cols = 10;
    echo "<table>";
    for ($j = 0; $j <= $rows; $j++) {
        echo "<tr>";
        for ($i = 0; $i <= $cols; $i++) {
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

    <h4>Ex2. submari fixe</h4>

    <?php
    function generar_pos_submari($start_row, $start_col, $vertical) {
        $vaixell = [[$start_row,$start_col]];

        $length = 2; # submari

        if ($vertical) {
            for ($i = 1; $i < $length; $i++) {
                $vaixell[] = [$start_row+$i, $start_col];
            } 
        } else {
            for ($i = 1; $i < $length; $i++) {
                $vaixell[] = [$start_row, $start_col+$i];
            } 
        }
        return $vaixell;
    };

    $submari = generar_pos_submari(3,4,true);

    $rows = 10;
    $cols = 10;
    echo "<table>";
    for ($i = 0; $i <= $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j <= $cols; $j++) {
            echo "<td>";
            # noms de files i columnes
            if ($i == 0 && $j != 0) {
                echo "$j";
            } elseif ($i != 0 && $j == 0) {
                echo chr(64+$i);
            }

            # submari
            if (in_array([$i,$j],$submari)) {
                echo "o";
            } 
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h4>Ex3. vaixells fixes de cada tipus</h4>

    <?php
    function generar_vaixell($start_row, $start_col, $length, $vertical) {
        $vaixell = [[$start_row, $start_col]];
        if ($length == 1) return $vaixell;

        if ($vertical) {
            for ($i = 1; $i < $length; $i++) {
                $vaixell[] = [$start_row+$i, $start_col];
            } 
        } else {
            for ($i = 1; $i < $length; $i++) {
                $vaixell[] = [$start_row, $start_col+$i];
            } 
        }
        return $vaixell;
    };

    $fragata = generar_vaixell(6,1,1,true);
    $submari = generar_vaixell(2,3,2,true);
    $destructor = generar_vaixell(1,5,3,false);
    $portaavions = generar_vaixell(6,4,4,false);

    $vaixells = [$fragata,$submari,$destructor,$portaavions];

    $rows = 10;
    $cols = 10;
    echo "<table>";
    for ($i = 0; $i <= $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j <= $cols; $j++) {
            echo "<td>";
            # noms de files i columnes
            if ($i == 0 && $j != 0) {
                echo "$j";
            } elseif ($i != 0 && $j == 0) {
                echo chr(64+$i);
            }

            # vaixells
            foreach ($vaixells as $vaixell) {
                if (in_array([$i,$j],$vaixell)) {
                    echo "o";
                } 
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h4>Ex4. partida amb vaixells random (permet solapats, adjacents i sortint-se fora)</h4>

    <?php
    $rows = 10;
    $cols = 20;

    $partida = generar_partida();

    function generar_partida() {
        $partida = [];
        # fragates
        for ($n = 0; $n < 4; $n++){
            $partida[] = generar_vaixell_random(1);
        }
        # submarins
        for ($n = 0; $n < 3; $n++){
            $partida[] = generar_vaixell_random(2);
        }
        # destructors
        for ($n = 0; $n < 2; $n++){
            $partida[] = generar_vaixell_random(3);
        }
        # portaavions
        $partida[] = generar_vaixell_random(4);
        return $partida;
    }
    function generar_vaixell_random($length) {
        global $rows, $cols;
        $start_row = random_int(1,$rows);
        $start_col = random_int(1,$cols);
        $vertical = random_int(0,1);

        $vaixell = [[$start_row, $start_col]];
        if ($length == 1) return $vaixell;

        if (boolval($vertical)) {
            for ($i = 1; $i < $length; $i++) {
                $vaixell[] = [$start_row+$i, $start_col];
            } 
        } else {
            for ($i = 1; $i < $length; $i++) {
                $vaixell[] = [$start_row, $start_col+$i];
            } 
        }
        return $vaixell;
    };

    echo "<table>";
    for ($i = 0; $i <= $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j <= $cols; $j++) {
            echo "<td>";
            # noms de files i columnes
            if ($i == 0 && $j != 0) {
                echo "$j";
            } elseif ($i != 0 && $j == 0) {
                echo chr(64+$i);
            }

            # vaixells
            foreach ($partida as $vaixell) {
                if (in_array([$i,$j],$vaixell)) {
                    echo "o";
                } 
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h4>Ex5. Partida sense vaixells solapats, tocant-se o sortint fora del taulell</h4>

    <?php
    $rows = 10;
    $cols = 10;

    $posicions_emplenades = [];
    $partida = generar_partida_v2();

    function generar_partida_v2() {
        $partida = [];
        # fragates
        for ($n = 0; $n < 4; $n++){
            $partida[] = generar_vaixell_random_v2(1);
        }
        # submarins
        for ($n = 0; $n < 3; $n++){
            $partida[] = generar_vaixell_random_v2(2);
        }
        # destructors
        for ($n = 0; $n < 2; $n++){
            $partida[] = generar_vaixell_random_v2(3);
        }
        # portaavions
        $partida[] = generar_vaixell_random_v2(4);
        return $partida;
    }
    function generar_vaixell_random_v2($length) {
        global $rows, $cols, $posicions_emplenades;

        do {
            $vertical = random_int(0,1);
            
            # assegurar-se que no es surt fora del taulell
            if ($vertical) {
                $start_row = random_int(1,$rows - $length + 1);
                $start_col = random_int(1,$cols);
            } else {
                $start_row = random_int(1,$rows);
                $start_col = random_int(1,$cols - $length + 1);
            }

            $vaixell = [[$start_row, $start_col]];
            if ($length != 1) {
                if (boolval($vertical)) {
                    for ($i = 1; $i < $length; $i++) {
                        $vaixell[] = [$start_row+$i, $start_col];
                    } 
                } else {
                    for ($i = 1; $i < $length; $i++) {
                        $vaixell[] = [$start_row, $start_col+$i];
                    } 
                }
            }
        } while (es_vaixell_incorrecte($vaixell));
        
        foreach ($vaixell as $pos) {
            $posicions_emplenades[] = $pos;
        }
        return $vaixell;
    };
    function es_vaixell_incorrecte($vaixell) {
        global $posicions_emplenades;

        foreach ($vaixell as $pos) {
            # comprovar que no solapa
            if (in_array($pos,$posicions_emplenades)) {
                return true;
            }
            
            # comprovar que no és adjacent a cap altra posició
            $adjacents = get_posicions_adjacents($pos);
            foreach ($adjacents as $pos_adjacent) {
                if (in_array($pos_adjacent, $posicions_emplenades)) {
                    return true;
                };
            }
        }
        
        return false;
    }
    function get_posicions_adjacents($pos) {
        $adjacents = [];
        $adjacents[] = [$pos[0]+1,$pos[1]];
        $adjacents[] = [$pos[0]-1,$pos[1]];
        $adjacents[] = [$pos[0],$pos[1]+1];
        $adjacents[] = [$pos[0],$pos[1]-1];
        return $adjacents;
    }

    echo "<table>";
    for ($i = 0; $i <= $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j <= $cols; $j++) {
            echo "<td>";
            # noms de files i columnes
            if ($i == 0 && $j != 0) {
                echo "$j";
            } elseif ($i != 0 && $j == 0) {
                echo chr(64+$i);
            }

            # vaixells
            foreach ($partida as $vaixell) {
                if (in_array([$i,$j],$vaixell)) {
                    echo "o";
                } 
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
