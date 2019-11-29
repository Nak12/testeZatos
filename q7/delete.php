<?php
  include("db.php");

  if(isset($_POST["user_id"])){
    $stmt = $conn->prepare("delete from clientes where id = :id");
    $result = $stmt->execute(
      array(
        ':id' => $_POST['user_id']
      )
    );
    if(!empty(result)){
      echo "Registro deletado com sucesso!";
    }
  }
?>