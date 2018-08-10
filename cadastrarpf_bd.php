<?php

require_once('db.class.php');

$objdb = new db();
$link = $objdb->connect();
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$nome = $_POST['nome'];
$fixo = $_POST['tel-fixo'];
$sobrenome = $_POST['sobrenome'];
$cel = $_POST['tel-cel'];
$cpf = $_POST['cpf'];
$comercial = $_POST['tel-com'];
$cidade = $_POST['cidade'];
$estado = $_POST['uf'];
$segmento = $_POST['res-negocio'];
$descricao = $_POST['descricao'];
$site = $_POST['site1'];

$sql = "insert into usuariopf(senha, nome, sobrenome, cpf, cel, descr, site, estado, cidade, email, fixo, comercial, segmento) values('$senha', '$nome', '$sobrenome', '$cpf', '$cel', '$descricao', '$site', '$estado', '$cidade', '$email', '$fixo', '$comercial', '$segmento')";

if(mysqli_query($link, $sql)){
	echo 'Usuário registrado com sucesso';
}else{
	echo 'Erro ao cadastrar usuário';
}

?>