<?php

session_start();

require_once('db.class.php');

$objdb = new db();
$link = $objdb->connect();
$email = $_POST['email-login'];
$senha = $_POST['senha-login'];
$erro = false;
$retorna_erro = '';

//Checando primeiro na tabela PJ se há o usuário, e depois na PF. Se houver em alguma das duas, efetua login e termina a execução, se não, volta para a página inicial com uma mensagem de erro.

$stmt = $link->prepare("SELECT email, senha, id_pjusu, nomefant FROM usuariopj WHERE email = ?");
$stmt->bind_param('s', $email);
if($stmt->execute()){
	$stmt->bind_result($jemailusu, $jsenhausu, $jidusu, $nomeFantasia);
	$stmt->fetch();
	if(isset($jemailusu)){
		if(password_verify($senha, $jsenhausu)){

			$_SESSION['email'] = $jemailusu;
			$_SESSION['id_jusuario'] = $jidusu;
			$_SESSION['nome_fantasia'] = $nomeFantasia;
			$_SESSION['id_fusuario'] = null;
			
			header('Location: homepage.php');

			die();
		} else{
			$erro = true;
		}
	} else{
		$erro = true;
	}

} else{
	echo 'Erro na conexão';
}

$stmt->close();

$stmt = $link->prepare("SELECT email, senha, id_pfusu, nome FROM usuariopf WHERE email = ?");
$stmt->bind_param('s', $email);
if($stmt->execute()){
	$stmt->bind_result($femailusu, $fsenhausu, $fidusu, $nome);
	$stmt->fetch();
	if(isset($femailusu)){
		if(password_verify($senha, $fsenhausu)){
			$_SESSION['email'] = $femailusu;
			$_SESSION['id_fusuario'] = $fidusu;
			$_SESSION['nome'] = $nome;
			$_SESSION['id_jusuario'] = null;

			header('Location: homepage.php');

			die();
		} else{
			$erro = true;
		}
	} else{
		$erro = true;
	}
	
} else{
	echo 'Erro na conexão';
}

$stmt->close();

if($erro){
	$retorna_erro = 'errologin=1&';
	header('Location: index.php?'.$retorna_erro);
}

?>