<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$id_msg = isset($_POST['msg']) ? $_POST['msg'] : 0;
$estado = isset($_POST['estado']) ? $_POST['estado'] : 0;

if($estado == 2){
	$stmt = $link->prepare('DELETE FROM solicitacao WHERE id_mensagem=?');
	$stmt->bind_param('i', $id_msg);
	if($stmt->execute()){
		echo 'O projeto foi recusado';
	} else{
		echo 'Houve um erro ao recusar o projeto';
	}
}

?>