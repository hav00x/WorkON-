<?php

require_once('db.class.php');

$objdb = new db();
$link = $objdb->connect();
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
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
$site = $_POST['site1'];
$email_existe = false;
$cnpj_existe = false;

$sql = "select cnpj from usuariopj where cnpj = '$cnpj'";

	if ($resultado = mysqli_query($link, $sql)){

		$dadosUsuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		if(isset($dadosUsuario['cnpj'])){
			$cnpj_existe = true;
		}

	}else{
		echo 'Erro ao executar a busca por usuario';
	}

	//verifica se o email já existe no bd

	$sql = "select email from usuariopj where email = '$email'";

	if ($resultado = mysqli_query($link, $sql)){

		$dadosEmail = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

		if(isset($dadosEmail['email'])){
			$email_existe = true;
		}

	}else{
		echo 'Erro ao executar a busca por email';
	}

	if($cnpj_existe || $email_existe){

		$retorno_get = '';

		if($cnpj_existe){
			$retorno_get.= "erro_cnpj=1&"; 
		}

		if($email_existe){
			$retorno_get.= "erro_email=1&"; 
		}

		header('Location: cadastro-PJ.php?'.$retorno_get);

		die();
	}

$sql = "insert into usuariopj(senha, razaosoci, nomefant, cnpj, cel, descr, site, estado, cidade, email, fixo, comercial, segmento) values('$senha', '$razao_social', '$nome_fantasia', '$cnpj', '$cel', '$descricao', '$site', '$estado', '$cidade', '$email', '$fixo', '$comercial', '$segmento')";

if(mysqli_query($link, $sql)){
	echo 'Usuário registrado com sucesso';
}else{
	echo 'Erro ao cadastrar usuário';
}

?>