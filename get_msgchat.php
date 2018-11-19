<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$id_proj = isset($_POST['chat']) ? $_POST['chat'] : 0;
$email_logado = $_SESSION['email'];

$stmt = $link->prepare('SELECT COUNT(id_mensagem) FROM chat WHERE id_projeto = ?');
$stmt->bind_param('i', $id_proj);
if($stmt->execute()){
	$stmt->bind_result($contaMsg);
	$stmt->fetch();
} else{
	echo 'Erro ao consultar o banco de dados';
	die();
}

$stmt->close();

if($contaMsg <= 0){
	echo '<p class="alinha-meio" style="margin-top: 50px;">Você não possui nenhuma mensagem recebida ou escrita</p>';
	die();
}

$stmt = $link->prepare('SELECT mensagem, autor_msg, nome_envia FROM chat WHERE id_projeto = ?');
$stmt->bind_param('i', $id_proj);
if($stmt->execute()){

	$stmt->store_result();
	$stmt->bind_result($msg, $autor_msg, $nome_envia);
	while($stmt->fetch()){
		if($autor_msg == $email_logado){
			echo '<div class="row">
			<div class="col-md-12">
			<p class="usernamedev">Você:</p>
			<div class="chatdev">
			<p class="chatinside">'.$msg.'</p>
			</div>
			</div>
			</div>';
		} else{
			echo '<div class="row">
			<div class="col-md-12">
			<p class="usernamecli">'.$nome_envia.'</p>
			<div class="chatcli">
			<p class="chatinside">'.$msg.'</p>
			</div>
			</div>
			</div>';
		}
	}
} else{
	echo 'Erro ao recuperar as mensagens';
}

$stmt->close();

?>