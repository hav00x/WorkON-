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
				if($stmt->execute()){
					attPassos();
				} else{
					echo 'Erro ao executar as etapas no banco de dados';
					die();
				}

			} else if (empty($idetapa[$i])){
				$stmt = $link->prepare("INSERT INTO etapas(etapa, ordem_etapa, id_projeto) VALUES(?, ?, ?)");
				$stmt->bind_param("sii", $nome_etapa[$i], $i, $idproj);
				if($stmt->execute()){
					attPassos();
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

	public function attPassos(){
		for($i = 1; $i <= count($idetapa); $i++){

			for($j = 1; $j <= $numeroPassos[$i]; $j++){
				$stmt = $link->prepare("INSERT INTO passos(passo, ordem_passo, id_etapa) values(?, ?, ?)");
				$stmt->bind_param('sii', $passos[$i][$j], $j, $idetapa[$i]);
				if($stmt->execute()){
					$check = true;
				} else{
					echo 'Erro ao executar as atividades no banco de dados';
					die();
				}
			}

		}

		$stmt->close();
	}

	for($i = 1; $i <= count($idetapa); $i++){

		for($j = 1; $j <= $numeroPassos[$i]; $j++){
			$stmt = $link->prepare("INSERT INTO passos(passo, ordem_passo, id_etapa) values(?, ?, ?)");
			$stmt->bind_param('sii', $passos[$i][$j], $j, $idetapa[$i]);
			if($stmt->execute()){
				$check = true;
			} else{
				echo 'Erro ao executar as atividades no banco de dados';
				die();
			}
		}

	}

	$stmt->close();

	if($check){
		header('Location: projetos.php?projeto=1&');
	}

} else if($delete == 1){

}

?>