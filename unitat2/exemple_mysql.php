<html>
<head>
  <title>Exemple de lectura de dades a MySQL</title>
  <style>
    table,td {
      border: 1px solid black;
      border-spacing: 0px;
    }
  </style>
</head>

<body>
  <h1>Exemple de lectura de dades a MySQL</h1>

  <?php
    $env = parse_ini_file('.db.env');
    $conn = mysqli_connect($env['HOST'],$env['USER'], $env['PASS']); // connectar a MySQL
    mysqli_select_db($conn, $env['DBNAME']);                       // seleccionar la BD
    $consulta = "SELECT * FROM city;";                      // query string
    $resultat = mysqli_query($conn, $consulta);             // executar consulta

    // Control d'errors 
    if (!$resultat) {
      $message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
      $message .= 'Consulta realitzada: ' . $consulta;
      die($message);
    }
  ?>
 
  <!-- Mostrem dades en una taula -->
  <table>
    <!-- capçalera de la taula -->
    <thead>
      <td colspan="4" align="center" bgcolor="cyan">Llistat de ciutats</td>
    </thead>
    
    <?php
      // llegim les dades amb un fetch que ens retorna un diccionari (=array associatiu)
      while( $registre = mysqli_fetch_assoc($resultat) )
      {
        // els \t (tabulador) i els \n (salt de línia) son perquè el codi font quedi llegible
        echo "\t<tr>\n";

        // volquem les dades del registre
        echo "\t\t<td>".$registre["Name"]."</td>\n";
        echo "\t\t<td>".$registre['CountryCode']."</td>\n";
        echo "\t\t<td>".$registre["District"]."</td>\n";
        echo "\t\t<td>".$registre['Population']."</td>\n";
 
        echo "\t</tr>\n";
      }
    ?>
  </table>
</body>
</html>