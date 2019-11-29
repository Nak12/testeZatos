<?php
  //inicia a sessão
  session_start();

  //conecta com o BD
  $servername = "localhost";
  $usernameDB = "root";
  $passwordDB = "";
  $database = "teste1";

  
  if(isset($_POST['submitBtn'])){
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $_SESSION['message'] = "";

    if($username != "" && $password != ""){
      try{
        $conn = new PDO("mysql:host=$servername; dbname=$database", $usernameDB, $passwordDB);
        $stmt = $conn->prepare("select * from sistemaTable where nome = '$username' and senha = '$password'");
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        //debug
        //var_dump($row);
        //echo "<br>count: $count";

        if($count == 1 && !empty($row)){
          $_SESSION['username'] = $row['nome'];
          $_SESSION['password'] = $row['senha'];
          header('location: home.php');
        }else{
          unset($_SESSION['username']);
          unset($_SESSION['password']);
          $_SESSION['message'] = "Nome do usuário e/ou senha inválido!";
          header('location: index.php');
        }
      }
      catch(PDOException $e){
        echo "Falha: " . $e->getMessage();
      }
    }
  }
  
?>