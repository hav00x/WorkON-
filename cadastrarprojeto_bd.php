<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$nome_projeto = $_POST['nome_projeto'];
$nome_cliente = $_POST['nomecli'];
$tipo_projeto = $_POST['tipopro'];
$descricao = $_POST['descripro'];
$data_inicio = $_POST['dataini'];
$data_entrega = $_POST['dataterm'];
$passos = $_POST['campo'];
$nome_etapa = $_POST['nome_etapa'];
$preco = $_POST['precoest'];
$check = false;
$usuariopj = 0;
$usuariopf = 0;
$idetapa = array();
$numeroPassos = array();

$stmt = $link->prepare("INSERT INTO intermediario(id_pfusu, id_pjusu) VALUES(?, ?)");
if ($stmt === false) {
	trigger_error($this->mysqli->error, E_USER_ERROR);
	return;
}

if($_SESSION['id_fusuario'])
{
	$usuariopf = $_SESSION['id_fusuario'];
	$usuariopj = null;
} else if($_SESSION['id_jusuario']){
	$usuariopj = $_SESSION['id_jusuario'];
	$usuariopf = null;
}

$stmt->bind_param("ii", $usuariopf, $usuariopj);
if($stmt->execute()){
	$idquery = mysqli_insert_id($link);
} else{
	echo 'Ocorreu um erro no banco de dados';
	die();
}

$stmt->close();

$stmt = $link->prepare("INSERT INTO projeto(nome_projeto, nome_cliente, tipo_projeto, descri_projeto, preco_estabelecido, data_inicio, data_entrega, id_intermediario, andamento) VALUES(?, ?, ?, ?, ?, ?, ?, ?, 1)");
if ($stmt === false) {
	trigger_error($this->mysqli->error, E_USER_ERROR);
	return;
}

$stmt->bind_param("ssssissi", $nome_projeto, $nome_cliente, $tipo_projeto, $descricao, $preco, $data_inicio, $data_entrega, $idquery);
if($stmt->execute()){
	$idprojeto = mysqli_insert_id($link);
} else{
	echo 'Erro ao executar o formulário no banco de dados';
	die();
}

$stmt->close();

for ($i = 1; $i < count($nome_etapa) +1; $i++)
{
	$stmt = $link->prepare("INSERT INTO etapas(etapa, ordem_etapa, id_projeto) VALUES(?, ?, ?)");
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}

	$stmt->bind_param("sii", $nome_etapa[$i], $i, $idprojeto);
	if($stmt->execute()){
		$idetapa[$i] = mysqli_insert_id($link);
	} else{
		echo 'Erro ao executar as etapas no banco de dados';
		die();
	}

	$stmt->close();
}

$i = 1;
foreach ($passos as $array1 => $array2) {
	$numeroPassos[$i] = count($array2);
	$i++;
}
$i = 0;

for($i = 1; $i <= count($idetapa); $i++){

	for($j = 1; $j <= $numeroPassos[$i]; $j++){
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
	}

}

$stmt->close();

if($check){
	header('Location: projetos.php?projeto=1&');
}

?>