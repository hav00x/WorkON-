<?php

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
	$stmt->bind_result($emailusu, $senhausu, $idusu, $nomeFantasia);
	while($stmt->fetch()){
		if(isset($emailusu)){
			if(password_verify($senha, $senhausu)){
				$_SESSION['email'] = $emailusu;
				$_SESSION['id_usuario'] = $idusu;
				$_SESSION['nome_fantasia'] = $nomeFantasia;
				header('Location: homepage.php');
				echo '3';
			} else{
				$erro = true;
			}
		} else{
			$erro = true;
		}
	}
} else{
	echo 'Erro na conexão';
}

$stmt->close();

$stmt = $link->prepare("SELECT email, senha, id_pfusu, nome FROM usuariopf WHERE email = ?");
$stmt->bind_param('s', $email);
if($stmt->execute()){
	$stmt->bind_result($emailusu, $senhausu, $idusu, $nome);
	while($stmt->fetch()){
		if(isset($emailusu)){
			if(password_verify($senha, $senhausu)){
				$_SESSION['email'] = $emailusu;
				$_SESSION['id_usuario'] = $idusu;
				$_SESSION['nome_fantasia'] = $nomeFantasia;
				header('Location: homepage.php');
			} else{
				$erro = true;
			}
		} else{
			$erro = true;
		}
	}
}

if($erro){
	$retorna_erro = 'errologin=1&';
	header('Location: index.php?'.$retorna_erro);
}

?>