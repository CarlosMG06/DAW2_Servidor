<?php
function consultarBBDD($consulta) {
    // Conectar, escollir BBDD, executar consulta
    $env = parse_ini_file('.db.env');
    $conn = mysqli_connect($env["HOST"], $env["USER"], $env["PASS"]);
    mysqli_select_db($conn, 'world');
    $resultat = mysqli_query($conn, $consulta);
    // Gestió d'errors
    if (!$resultat) {
        $message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
        $message .= 'Consulta realitzada: ' . $consulta;
        die($message);
    }

    return $resultat;
}
?>