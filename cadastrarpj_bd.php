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
$num_errado = false;
$cnpj_errado = false;
$senha_insegura = false;

//verifica se os campos estão do jeito desejado e envia erros para a página caso contrário

if(!isset($email, $senha, $razao_social, $cel, $nome_fantasia, $cnpj, $cidade, $estado, $segmento, $descricao)){
	$campo_vazio = true;
}

if(strlen($cel) != 11){
	$num_errado = true;
} elseif(!is_numeric($cel)){
	$num_errado = true;
}

if(strlen($_POST['senha']) < 8){
	$senha_insegura = true;
}

if(isset($comercial) && strlen($comercial) != 11){
	$num_errado = true;
}elseif(!is_numeric($comercial)){
	$num_errado = true;
}

if(strlen($cnpj) != 14){
	$cnpj_errado = true;
} elseif(!is_numeric($cnpj)){
	$cnpj_errado = true;
}

if(isset($fixo) && strlen($fixo) != 10){
	$num_errado = true;
}elseif(!is_numeric($cel)){
	$num_errado = true;
}

if($email != $confirmaEmail){
	$email_diferente = true;
}

if($_POST['senha'] != $confirmaSenha){
	$senha_diferente = true;
}

$stmt = $link->prepare("select cnpj from usuariopj where cnpj = ?");
$stmt->bind_param("i", $cnpj);

if($stmt->execute()){
	$stmt->bind_result($buscacnpj);

	if(isset($buscacnpj)){
		$cnpj_existe = true;
	}
}else{
	echo 'Erro ao executar a busca por usuario';
}

$stmt->close();

	//verifica se o email já existe no bd

$stmt = $link->prepare("select email from usuariopj where email = ?");
$stmt->bind_param("s", $email);
if($stmt->execute()){
	$stmt->bind_result($buscaEmail);

	if(isset($buscaEmail)){
		$email_existe = true;
	}
}else{
	echo 'Erro ao executar a busca por email';
}

$stmt->close();

if($cnpj_existe || $email_existe || $email_diferente || $senha_diferente || $campo_vazio || $num_errado || $cnpj_errado || $senha_insegura){

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

	if($num_errado){
		$retorno_get.="erro_numerrado=1&";
	}

	if($cnpj_errado){
		$retorno_get.="erro_cnpjerrado=1&";
	}

	if($senha_insegura){
		$retorno_get.="erro_senhainseg=1&";
	}

	header('Location: cadastro-PJ.php?'.$retorno_get);

	die();
}

$stmt = $link->prepare("insert into usuariopj(senha, razaosoci, nomefant, cnpj, cel, descr, site, estado, cidade, email, fixo, comercial, segmento, facebook, instagram) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssiisssssiisss", $senha, $razao_social, $nome_fantasia, $cnpj, $cel, $descricao, $site, $estado, $cidade, $email, $fixo, $comercial, $segmento, $facebook, $instagram);

if($stmt->execute()){
	echo 'Usuário registrado com sucesso';
}else{
	echo 'Erro ao cadastrar usuário';
}

$stmt->close();

?>