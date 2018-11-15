<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$mensagem = $_POST['mensagem'];
$email_dev = $_POST['email'];
$email_cli = $_SESSION['email'];
$data = date('Y/m/d');

$stmt = $link->prepare("INSERT INTO solicitacao (email_usuenvia, email_usurecebe, mensagem, data_envio) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $email_cli, $email_dev, $mensagem, $data);
if($stmt->execute()){
	echo 'Mensagem enviada com sucesso!';
} else{
	echo 'Não foi possível enviar a mensagem';
}

$stmt->close();

?>