<?php
  //variaveis para conexao com o BD
  $servername = "localhost";
	$usernameDB = "user";
	$passwordDB = "suaSenha";
  $database = "seuDatabase"; 

  try{
    //cria uma conexao
    $conn = new PDO("mysql:host=$servername; dbname=$database", $usernameDB, $passwordDB);

    //cria uma consulta e a executa
    $stmt = $conn->prepare('select * from clientes');
    $stmt->execute();
    
    //retorno do resultado, neste caso virá no formato associativo key->value
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  catch(PDOException $e){
    echo "Falha: " . $e->getMessage();
  }
?>

