<?php
	include("db.php");
	
		$stmt = $conn->prepare('select * from clientes');
		$stmt->execute();
	//$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();

		$data = array();
  	foreach($result as $row){
    // echo $row['nome'] . '<br>';
    // echo $row['sobrenome'] . '<br>';
    // echo $row['cargo'] . '<br>';
    // echo $row['data'] . '<br>';
    // echo "<hr>";
    $item = array(
			'id' => $row['id'], 
			'nome' => $row['nome'], 
			'cadastro' => $row['cadastro'], 
			'email' => $row['email'], 
			'latitude' => $row['latitude'],
			'longitude' => $row['longitude'],
			'data_cadastro' => $row['data_cadastro'],
			'data_modificacao' => $row['data_modificacao'],
			'ultima_atividade' => $row['ultima_atividade'],
			'update' => '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-sm update">Atualizar</button>', 
			'delete' => '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Deletar</button>',
		);

    $data[] = $item;
  }

		$output = array(
			"draw" => intval($_POST['draw']),
			'recordsTotal' => $count,
			'data' => $data,
		);

		echo json_encode($output);
		

?>