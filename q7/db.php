<?php 
  $servername = "localhost";
	$usernameDB = "root";
	$passwordDB = "";
  $database = "teste1"; //Verificar o database
  
  try{
    $conn = new PDO("mysql:host=$servername; dbname=$database", $usernameDB, $passwordDB);
  }
  catch(PDOException $e){
    echo "Falha: " . $e->getMessage();
  }
  
?>