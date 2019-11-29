<?php
  include("db.php");

  if(isset($_POST["user_id"])){
    $stmt = $conn->prepare("select * from clientes where id = '".$_POST["user_id"]."' limit 1 ");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $output = array();

    foreach($result as $row){
      $output["nome"] = $row["nome"];
      $output["cadastro"] = $row["cadastro"];
      $output["email"] = $row["email"];
      $output["latitude"] = $row["latitude"];
      $output["longitude"] = $row["longitude"];
      $output["data_cadastro"] = $row["data_cadastro"];
      $output["data_modificacao"] = $row["data_modificacao"];
      $output["ultima_atividade"] = $row["ultima_atividade"];
    }
    echo json_encode($output);

  }

  

?>