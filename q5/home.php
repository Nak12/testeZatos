<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>

  <style>
    a:link{
      text-decoration: none;
    }
  </style>

  <?php 
    //verifica se existe ou não sessão, impede o usuário de burlar a obrigatoriedade de login, pois poderia simplesmente digitar
    //o endereço do caminho no navegador
    session_start();

    if((!isset($_SESSION['username']) == true) && (!isset($_SESSION['password']) == true)){
      unset($_SESSION['username']);
      unset($_SESSION['password']);
      header('location: index.php');
    }

    $logado = $_SESSION['username'];
  ?>

</head>
<body>
  <?php
    echo "<h1>Bem-vindo $logado!</h1>";
  ?>
  <button>
    <a href="logout.php">Fazer logout</a>
  </button>
  
</body>
</html>