<?php 
  include("db.php");

  if(isset($_POST['operation'])){
    if($_POST['operation'] == "Add"){
      $stmt = $conn->prepare("insert into clientes (nome, cadastro, email, latitude, longitude) values (:nome, :cadastro, :email, :latitude, :longitude)");
      $result = $stmt->execute(
        array(
          ':nome' => $_POST['nome'],
          ':cadastro' => $_POST['cadastro'],
          ':email' => $_POST['email'],
          ':latitude' => $_POST['latitude'],
          ':longitude' => $_POST['longitude'],
          //':inputData' => $_POST['dataIn'],
        )
      );
      if(!empty($result)){
        echo "Dados inseridos!";
      }
    }

    if($_POST["operation"] == "Edit"){
      if(isset($_POST["user_id"])){
        $stmt = $conn->prepare("update clientes set nome = :nome, cadastro = :cadastro, email = :email, latitude = :latitude, longitude =:longitude where id = :id");
        $result = $stmt->execute(
          array(
            ':nome' => $_POST['nome'],
            ':cadastro' => $_POST['cadastro'],
            ':email' => $_POST['email'],
            ':latitude' => $_POST['latitude'],
            ':longitude' => $_POST['longitude'],
            ':id' => $_POST['user_id']
          )
        );
        if(!empty($result)){
          echo "Dados atualizados!";
        }
      }
    }
  }
?>