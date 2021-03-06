<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$id_usuario = is_null($_SESSION['id_fusuario']) ? $_SESSION['id_jusuario'] : $_SESSION['id_fusuario'];
$cli_ou_dev = $_SESSION['clidev'];
$email_logado = $_SESSION['email'];

if($cli_ou_dev == 2){
	$stmt = $link->prepare("SELECT COUNT(id_intermediario) FROM intermediario WHERE (id_pfusu = ? OR id_pjusu = ?)");
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}

	$stmt->bind_param('ii', $id_usuario, $id_usuario);
	if($stmt->execute()){
		$stmt->bind_result($contaProjetos);
		$stmt->fetch();

		echo $contaProjetos;

	} else{
		echo 'Ocorreu um ao recuperar os projetos';
	}

	$stmt->close();
} else if($cli_ou_dev == 1){
	$stmt = $link->prepare("SELECT COUNT(id_projeto) FROM projeto WHERE email=?");
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}

	$stmt->bind_param('s', $email_logado);
	if($stmt->execute()){
		$stmt->bind_result($contaProjetos);
		$stmt->fetch();

		echo $contaProjetos;

	} else{
		echo 'Ocorreu um ao recuperar os projetos';
	}

	$stmt->close();
}

?>