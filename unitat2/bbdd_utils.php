<?php
function consultarMySQL($consulta) {
    // Conectar, escollir BBDD, executar consulta
    $env = parse_ini_file('.db.env');
    $conn = mysqli_connect($env["HOST"], $env["USER"], $env["PASS"]);
    mysqli_select_db($conn, $env["DBNAME"]);
    $resultat = mysqli_query($conn, $consulta);
    // Gestió d'errors
    if (!$resultat) {
        $message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
        $message .= 'Consulta realitzada: ' . $consulta;
        die($message);
    }

    return $resultat;
}

function consultarPDO($consulta) {
    // connexió dins block try-catch:
    try {
        $env = parse_ini_file('.db.env');
        $hostname = $env['HOST'];
        $dbname = $env['DBNAME'];
        $username = $env['USER'];
        $pw = $env['PASS'];
        $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
    } catch (PDOException $e) {
        // obtenim missatge d'error de l'excepció llançada
        echo "Error connectant a la BD: " . $e->getMessage() . "<br>\n";
        exit;
    }
    
    try {
        //preparem i executem la consulta
        $query = $pdo->prepare($consulta);
        $query->execute();
    } catch (PDOException $e) {
        // alternativa: obtenim missatge d'error de $query
        $err = $query->errorInfo();
        if ($err[0]!='00000') {
        echo "\nPDO::errorInfo():\n";
        die("Error accedint a dades: " . $err[2]);
        }  
    }
    return $query;
}
?>