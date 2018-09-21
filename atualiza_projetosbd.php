<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$nome_projeto = $_POST['nome_projetoupd'];
$nome_cliente = $_POST['nomecliupd'];
$tipo_projeto = $_POST['tipoproupd'];
$descricao = $_POST['descriproupd'];
$data_inicio = $_POST['datainiupd'];
$data_entrega = $_POST['datatermupd'];
$passos = $_POST['campo'];
$nome_etapa = $_POST['nome_etapa'];
$preco = $_POST['precoestupd'];
$andamento = isset($_POST['andamento']) ? $_POST['andamento'] : 1;
$idproj = $_POST['atualizando'];
$delete = isset($_POST['delete']) ? $_POST['delete'] : 0;
$idetapa = $_POST['etapa'];
$check = false;

if($delete == 0){

	$stmt = $link->prepare("UPDATE projeto SET nome_projeto=?, nome_cliente=?, tipo_projeto=?, descri_projeto=?, preco_estabelecido=?, data_inicio=?, data_entrega=?, andamento=? WHERE id_projeto=?");
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}

	$stmt->bind_param("ssssissii", $nome_projeto, $nome_cliente, $tipo_projeto, $descricao, $preco, $data_inicio, $data_entrega, $andamento, $idproj);
	if($stmt->execute()){
		$stmt->close();

		for ($i = 1; $i < count($nome_etapa) +1; $i++)
		{	
			if(isset($idetapa[$i])){
				$stmt = $link->prepare("UPDATE etapas SET etapa=?, ordem_etapa=? WHERE id_etapa=?");
				if ($stmt === false) {
					trigger_error($this->mysqli->error, E_USER_ERROR);
					return;
				}

				$stmt->bind_param("sii", $nome_etapa[$i], $i, $idetapa[$i]);
				if(!$stmt->execute()){
					echo 'Erro ao executar as etapas no banco de dados';
					die();
				}

			} else if (empty($idetapa[$i])){
				$stmt = $link->prepare("INSERT INTO etapas(etapa, ordem_etapa, id_projeto) VALUES(?, ?, ?)");
				if ($stmt === false) {
					trigger_error($this->mysqli->error, E_USER_ERROR);
					return;
				}

				$stmt->bind_param("sii", $nome_etapa[$i], $i, $idproj);
				if($stmt->execute()){
					$idetapa[$i] = mysqli_insert_id($link);
				} else{
					echo 'Erro ao executar as etapas no banco de dados';
					die();
				}
			}
			$stmt->close();
		}

		$i = 1;
		foreach ($passos as $array1 => $array2) {
			$numeroPassos[$i] = count($array2);
			$i++;
		}
		$i = 0;

	} else{
		echo 'Erro ao executar o formulário no banco de dados';
		die();
	}

	for($i = 1; $i <= count($idetapa); $i++){

		for($j = 1; $j <= $numeroPassos[$i]; $j++){
			$stmt = $link->prepare("SELECT passo FROM passos WHERE ordem_passo=? AND id_etapa=?");
			if ($stmt === false) {
				trigger_error($this->mysqli->error, E_USER_ERROR);
				return;
			}

			$stmt->bind_param('ii', $j, $idetapa[$i]);
			if(!$stmt->execute()){
				echo 'Erro ao executar a chamada no banco de dados';
				die();
			}

			$stmt->store_result();
			$stmt->bind_result($passo);
			$stmt->fetch();
			$stmt->close();

			if(empty($passo)){

				$stmt = $link->prepare("INSERT INTO passos(passo, ordem_passo, id_etapa) values(?, ?, ?)");
				if ($stmt === false) {
					trigger_error($this->mysqli->error, E_USER_ERROR);
					return;
				}

				$stmt->bind_param('sii', $passos[$i][$j], $j, $idetapa[$i]);
				if($stmt->execute()){
					$check = true;
				} else{
					echo 'Erro ao executar as atividades no banco de dados';
					die();
				}


			} else if(isset($passo)){

				$stmt = $link->prepare("UPDATE passos SET passo=? WHERE ordem_passo=? AND id_etapa=?");
				if ($stmt === false) {
					trigger_error($this->mysqli->error, E_USER_ERROR);
					return;
				}

				$stmt->bind_param('sii', $passos[$i][$j], $j, $idetapa[$i]);
				if($stmt->execute()){
					$check = true;
				} else{
					echo 'Erro ao executar as atividades no banco de dados';
					die();
				}
			}

			$stmt->free_result();
			$stmt->close();
		}

		echo 'Atualizado com sucesso';
	}

} else if($delete == 1){
	$stmt = $link->prepare('SELECT id_intermediario FROM projeto WHERE id_projeto=?');
	$stmt->bind_param('i', $idproj);
	if(!$stmt->execute()){
		echo 'Erro ao executar a chamada no banco de dados';
		die();
	}
	$stmt->store_result();
	$stmt->bind_result($id_intermediario);
	$stmt->fetch();
	$stmt->close();

	$stmt = $link->prepare('SELECT id_etapa FROM etapas WHERE id_projeto=?');
	$stmt->bind_param('i', $idproj);
	if(!$stmt->execute()){
		echo 'Erro ao executar a chamada no banco de dados';
		die();
	}

	$resultE = $stmt->get_result();
	$i=0;
	while($rowE = $resultE->fetch_assoc()){
		$id_etapadel[$i] = $rowE['id_etapa'];
		$i++;
	}

	$lenght = $i+1;
	$stmt->close();

	for($i = 0; $i < $lenght; $i++){
		$stmt = $link->prepare('DELETE FROM passos WHERE id_etapa=?');
		if ($stmt === false) {
			trigger_error($this->mysqli->error, E_USER_ERROR);
			return;
		}
		$stmt->bind_param('i', $id_etapadel[$i]);
		if(!$stmt->execute()){
			echo 'Erro ao executar a chamada no banco de dados';
			die();
		}

		$stmt->close();
	}

	$stmt = $link->prepare('DELETE FROM etapas WHERE id_projeto=?');
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}
	$stmt->bind_param('i', $idproj);
	if(!$stmt->execute()){
		echo 'Erro ao executar a chamada no banco de dados';
		die();
	}

	$stmt->close();

	$stmt = $link->prepare('DELETE FROM projeto WHERE id_projeto=?');
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}
	$stmt->bind_param('i', $idproj);
	if(!$stmt->execute()){
		echo 'Erro ao executar a chamada no banco de dados';
		die();
	}

	$stmt->close();

	$stmt = $link->prepare('DELETE FROM intermediario WHERE id_intermediario');
		if ($stmt === false) {
			trigger_error($this->mysqli->error, E_USER_ERROR);
			return;
		}
		$stmt->bind_param('i', $id_intermediario);
		if(!$stmt->execute()){
			echo 'Erro ao executar a chamada no banco de dados';
			die();
		}

		$stmt->close();

	echo 'Deletado com sucesso';
}
?>