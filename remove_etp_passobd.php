<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$idproj = $_POST['atualizando'];
$delete = isset($_POST['delete']) ? $_POST['delete'] : 0;
$idetapa = $_POST['etapa'];
$passos = $_POST['campo'];
$check = false;

if($delete == 0){ // exclui etapas
	$key = end($idetapa);

	$stmt = $link->prepare('DELETE FROM passos WHERE id_etapa=?');
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}
	$stmt->bind_param('i', $key);
	if(!$stmt->execute()){
		echo 'Erro ao executar a chamada no banco de dados';
		die();
	}

	$stmt->close();

	$stmt = $link->prepare('DELETE FROM etapas WHERE id_etapa=?');
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}
	$stmt->bind_param('i', $key);
	if(!$stmt->execute()){
		echo 'Erro ao executar a chamada no banco de dados';
		die();
	}

	$stmt->close();

	echo 'ok';

} else if($delete == 1){ // exclui passos

}

?>