<?php

require_once('db.class.php');

$objdb = new db();
$link = $objdb->connect();
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$confirmaEmail = $_POST['confirma-email'];
$confirmaSenha = $_POST['confirma-senha'];
$razao_social = $_POST['razaos'];
$fixo = $_POST['tel-fixo'];
$nome_fantasia = $_POST['nomef'];
$cel = $_POST['tel-cel'];
$cnpj = $_POST['cnpj'];
$comercial = $_POST['tel-com'];
$cidade = $_POST['cidade'];
$estado = $_POST['uf'];
$segmento = $_POST['res-negocio'];
$descricao = $_POST['descricao'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$site = $_POST['site1'];
$email_existe = false;
$cnpj_existe = false;
$senha_diferente = false;
$email_diferente = false;
$campo_vazio = false;

if(!isset($email, $senha, $razao_social, $cel, $nome_fantasia, $cnpj, $cidade, $estado, $segmento, $descricao)){
	$campo_vazio = true;
}

if($email != $confirmaEmail){
	$email_diferente = true;
}

if($_POST['senha'] != $confirmaSenha){
	$senha_diferente = true;
}

$stmt = "select cnpj from usuariopj where cnpj = '$cnpj'";

if ($resultado = mysqli_query($link, $stmt)){

	$dadosUsuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
	if(isset($dadosUsuario['cnpj'])){
		$cnpj_existe = true;
	}

}else{
	echo 'Erro ao executar a busca por usuario';
}

	//verifica se o email já existe no bd

$stmt = "select email from usuariopj where email = '$email'";

if ($resultado = mysqli_query($link, $stmt)){

	$dadosEmail = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

	if(isset($dadosEmail['email'])){
		$email_existe = true;
	}

}else{
	echo 'Erro ao executar a busca por email';
}

if($cnpj_existe || $email_existe || $email_diferente || $senha_diferente || $campo_vazio){

	$retorno_get = '';

	if($cnpj_existe){
		$retorno_get.= "erro_cnpj=1&"; 
	}

	if($email_existe){
		$retorno_get.= "erro_email=1&"; 
	}

	if($email_diferente){
		$retorno_get.="erro_emaildif=1&";
	}

	if($senha_diferente){
		$retorno_get.="erro_senhadif=1&";
	}

	if($campo_vazio){
		$retorno_get.="erro_camvazio=1&";
	}

	header('Location: cadastro-PJ.php?'.$retorno_get);

	die();
}

$stmt->prepare("insert into usuariopj(senha, razaosoci, nomefant, cnpj, cel, descr, site, estado, cidade, email, fixo, comercial, segmento, facebook, instagram) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssiisssssiisss", $senha, $razao_social, $nome_fantasia, $cnpj, $cel, $descricao, $site, $estado, $cidade, $email, $fixo, $comercial, $segmento, $facebook, $instagram);

if($stmt->execute()){
	echo 'Usuário registrado com sucesso';
}else{
	echo 'Erro ao cadastrar usuário';
}

$stmt->close();

/* $stmt = "insert into usuariopj(senha, razaosoci, nomefant, cnpj, cel, descr, site, estado, cidade, email, fixo, comercial, segmento, facebook, instagram) values('$senha', '$razao_social', '$nome_fantasia', '$cnpj', '$cel', '$descricao', '$site', '$estado', '$cidade', '$email', '$fixo', '$comercial', '$segmento', '$facebook', '$instagram')";

if(mysqli_query($link, $stmt)){
	echo 'Usuário registrado com sucesso';
}else{
	echo 'Erro ao cadastrar usuário';
}*/

?>