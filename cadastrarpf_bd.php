<?php

require_once('db.class.php');

$objdb = new db();
$link = $objdb->connect();
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$confirmaEmail = $_POST['confirma-email'];
$confirmaSenha = $_POST['confirma-senha'];
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
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$site = $_POST['site1'];
$email_existe = false;
$cpf_existe = false;
$senha_diferente = false;
$email_diferente = false;
$campo_vazio = false;
$num_errado = false;
$cpf_errado = false;
$senha_insegura = false;

//verifica se os campos estão do jeito desejado e envia erros para a página caso contrário

if(!isset($email, $senha, $nome, $cel, $sobrenome, $cpf, $cidade, $estado, $segmento, $descricao)){
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

if(strlen($cpf) != 11){
	$cpf_errado = true;
} elseif(!is_numeric($cpf)){
	$cpf_errado = true;
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

$stmt = $link->prepare("select cpf from usuariopf where cpf = ?");
$stmt->bind_param("i", $cpf);

if($stmt->execute()){
	$stmt->bind_result($buscaCpf);

	if(isset($buscaCpf)){
		$cpf_existe = true;
	}
}else{
	echo 'Erro ao executar a busca por usuario';
}

$stmt->close();

	//verifica se o email já existe no bd

$stmt = $link->prepare("select email from usuariopf where email = ? UNION select email from usuariopj where email = ?");
$stmt->bind_param("ss", $email, $email);
if($stmt->execute()){
	$stmt->bind_result($buscaEmailPF, $buscaEmailPJ);

	if(isset($buscaEmailPF) || isset($buscaEmailPJ) ){
		$email_existe = true;
	}
}else{
	echo 'Erro ao executar a busca por email';
}

$stmt->close();

if($cpf_existe || $email_existe || $email_diferente || $senha_diferente || $campo_vazio || $num_errado || $cpf_errado || $senha_insegura){

	$retorno_get = '';

	if($cpf_existe){
		$retorno_get.= "erro_cpf=1&"; 
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

	if($cpf_errado){
		$retorno_get.="erro_cpferrado=1&";
	}

	if($senha_insegura){
		$retorno_get.="erro_senhainseg=1&";
	}

	header('Location: cadastro-PF.php?'.$retorno_get);

	die();
}

$stmt = $link->prepare("insert into usuariopf(senha, nome, sobrenome, cpf, cel, descr, site, estado, cidade, email, fixo, comercial, segmento, facebook, instagram) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssiisssssiisss", $senha, $nome, $sobrenome, $cpf, $cel, $descricao, $site, $estado, $cidade, $email, $fixo, $comercial, $segmento, $facebook, $instagram);

if($stmt->execute()){
	echo 'Usuário registrado com sucesso';
}else{
	echo 'Erro ao cadastrar usuário';
}

$stmt->close();

?>