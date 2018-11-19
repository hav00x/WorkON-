<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$id_proj = isset($_POST['mensagemproj']) ? $_POST['mensagemproj'] : 0;
$email_logado = $_SESSION['email'];
$nome_envia = isset($_SESSION['nome']) ? $_SESSION['nome'] : $_SESSION['nome_fantasia'];
$msg = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';

$stmt = $link->prepare('SELECT email FROM projeto WHERE id_projeto=?');
$stmt->bind_param('i', $id_proj);
if($stmt->execute()){
	$stmt->bind_result($email_usu);
	$stmt->fetch();

	if($email_usu == $email_logado){

		$stmt->close();
		$stmt = $link->prepare('SELECT id_intermediario FROM projeto WHERE id_projeto=?');

		$stmt->bind_param('i', $id_proj);
		if($stmt->execute()){
			$stmt->bind_result($id_interm);
			$stmt->fetch();

		} else{
			echo 'Erro ao procurar o usuário';
			die();
		}

		$stmt->close();

		$stmt = $link->prepare('SELECT id_pfusu, id_pjusu FROM intermediario WHERE id_intermediario=?');

		$stmt->bind_param('i', $id_interm);
		if($stmt->execute()){
			$stmt->bind_result($id_pfusu, $id_pjusu);
			$stmt->fetch();
			if($id_pfusu){

				$stmt->close();

				$stmt = $link->prepare('SELECT email FROM usuariopf WHERE id_pfusu=?');

				$stmt->bind_param('i', $id_pfusu);
				if($stmt->execute()){
					$stmt->bind_result($email_usu);
					$stmt->fetch();

				} else{
					echo 'Erro ao procurar o usuário';
					die();
				}

			} else{

				$stmt->close();

				$stmt = $link->prepare('SELECT email FROM usuariopj WHERE id_pjusu=?');

				$stmt->bind_param('i', $id_pjusu);
				if($stmt->execute()){
					$stmt->bind_result($email_usu);
					$stmt->fetch();

				} else{
					echo 'Erro ao procurar o usuário';
					die();
				}
			}

		}else{
			echo 'Erro ao procurar o usuário';
			die();
		}
	}

	$stmt->close();

} else{
	echo 'Erro ao achar o email do usuário';
	die();
}

$stmt = $link->prepare('SELECT nome FROM usuariopf WHERE email=? UNION SELECT nomefant FROM usuariopj WHERE email=?');
$stmt->bind_param('ss', $email_usu, $email_usu);
if($stmt->execute()){
	$stmt->bind_result($nome_usu);
	$stmt->fetch();

} else{
	echo 'Erro ao achar o usuário';
	die();
}

$stmt->close();

$stmt = $link->prepare('INSERT INTO chat(id_projeto, mensagem, autor_msg, receptor_msg, nome_envia, nome_recebe) VALUES(?, ?, ?, ?, ?, ?)');
$stmt->bind_param('isssss', $id_proj, $msg, $email_logado, $email_usu, $nome_envia, $nome_usu);
if($stmt->execute()){
	echo 'Mensagem enviada';
} else{
	echo 'Erro ao enviar a mensagem';
	die();
}

$stmt->close();

?>