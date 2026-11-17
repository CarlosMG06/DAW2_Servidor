<html>
<head>
  <title>Exemple de lectura de dades a MySQL (PDO)</title>
  <style>
    table,td {
      border: 1px solid black;
      border-spacing: 0px;
    }
  </style>
</head>
<body>
  <h1>Exemple de lectura de dades a MySQL (PDO)</h1>

  <?php
    //connexió dins block try-catch:
    //  prova d'executar el contingut del try
    //  si falla executa el catch
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
      $query = $pdo->prepare("SELECT name,code FROM country");
      $query->execute();
    } catch (PDOException $e) {
      // alternativa: obtenim missatge d'error de $query
      $err = $query->errorInfo();
      if ($err[0]!='00000') {
        echo "\nPDO::errorInfo():\n";
        die("Error accedint a dades: " . $err[2]);
      }  
    }
    
    //anem agafant les fileres una a una
    $row = $query->fetch();
    while ( $row ) {
      echo $row['code']." - " . $row['name']. "<br/>";
      $row = $query->fetch();
    }

    //versió alternativa amb foreach
    /*foreach ($query as $row) {
      echo $row['i']." - " . $row['a']. "<br/>";
    }*/

    //eliminem els objectes per alliberar memòria 
    unset($pdo); 
    unset($query) 
  ?>
  </body>
</html>