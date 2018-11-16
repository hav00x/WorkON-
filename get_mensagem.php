<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$email = $_SESSION['email'];

$stmt = $link->prepare("SELECT COUNT(id_mensagem) FROM solicitacao WHERE email_usurecebe=?");
if ($stmt === false) {
	trigger_error($this->mysqli->error, E_USER_ERROR);
	return;
}

$stmt->bind_param('s', $email);
if($stmt->execute()){
	$stmt->bind_result($contaMensagens);
	$stmt->fetch();
} else{
	echo 'Ocorreu um ao recuperar as solicitações';
}

$stmt->close();

$stmt = $link->prepare('SELECT id_mensagem, mensagem, email_usuenvia, data_envio, nomeusu_solicitacao FROM solicitacao WHERE email_usurecebe=?');
if ($stmt === false) {
	trigger_error($this->mysqli->error, E_USER_ERROR);
	return;
}

$stmt->bind_param('s', $email);
if($stmt->execute()){
	$i = 0;
	$stmt->store_result();
	$stmt->bind_result($id_msg, $mensagem, $email_cli, $data_envio, $nome_cli);
	while($stmt->fetch()){

		$i++;

		if($i % 2 == 0){
			$date = DateTime::createFromFormat('Y-m-d', $data_envio);

			echo '<div class="col-md-5 col-half-margin-right col-md-offset-1 divisor-pedidos alinha-meio">
			<form id="form'.$id_msg.'">
			<h3>'.$nome_cli.'</h3>
			<h5>'.$date->format('d-m-Y').'</h5>
			<p max-lenght="200" class="area-txt">'.$mensagem.'</p>
			</form>
			<button class="button-hp btn-abremsg" data-toggle="modal" data-value="'.$id_msg.'">Mais Informações</button>
			</div>';
		} else{
			$date = DateTime::createFromFormat('Y-m-d', $data_envio);

			echo '<div class="col-md-5 col-half-margin-left divisor-pedidos alinha-meio">
			<form id="form'.$id_msg.'">
			<h3>'.$nome_cli.'</h3>
			<h5>'.$date->format('d-m-Y').'</h5>
			<p max-lenght="200" class="area-txt">'.$mensagem.'</p>
			</form>
			<button class="button-hp btn-abremsg" data-toggle="modal" data-value="'.$id_msg.'">Mais Informações</button>
			</div>';
		}
	}
} else{
	echo 'Erro';
}

?>