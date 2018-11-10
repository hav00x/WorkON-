<?php

session_start();

require_once('db.class.php');

$objdb = new db();
$link = $objdb->connect();
$emailAntigo = isset($_POST['emailantigo']) ? $_POST['emailantigo'] : '';
$emailNovo = isset($_POST['emailnovo']) ? $_POST['emailnovo'] : '';
$emailConfirma = isset($_POST['emailconfirma']) ? $_POST['emailconfirma'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : 0;
$senhaAntiga = isset($_POST['senhaantiga']) ? $_POST['senhaantiga'] : '';
$senhaNova = isset($_POST['senhanova']) ? $_POST['senhanova'] : ''; 
$senhaConfirma = isset($_POST['senhaconfirma']) ? $_POST['senhaconfirma'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : 0;
$campo_vazio = true;
$senha_incorreta = true;
$nova_senha_diferente = true;
$email_incorreto = true;
$novo_email_diferente = true;
$sucesso = true;
$resposta = array('campo_vazio' => false, 'senha_dif' => false, 'senha_errada' => false, 'email_dif' => false, 'email_errado' => false,);

if(is_null($_SESSION['id_fusuario'])){
	$idusu = $_SESSION['id_jusuario'];
	$tabela = 1;
} else{
	$idusu = $_SESSION['id_fusuario'];
	$tabela = 2;
}

if($senha == 1){
	if(empty($senhaAntiga) || empty($senhaNova) || empty($senhaConfirma)){
		$resposta['campo_vazio'] = $campo_vazio;
		echo json_encode($resposta);
		die();
	}

	if($senhaNova != $senhaConfirma){
		$resposta['senha_dif'] = $nova_senha_diferente;
		echo json_encode($resposta);
		die();
	}

	if($tabela == 1){
		$stmt = $link->prepare("SELECT senha FROM usuariopj WHERE id_pjusu = ?");
		$stmt->bind_param('s', $idusu);
		if($stmt->execute()){
			$stmt->bind_result($senhausu);
			$stmt->fetch();
			if(!password_verify($senhaAntiga, $senhausu)){
				$resposta['senha_errada'] = $senha_incorreta;
				echo json_encode($resposta);
				die();
			}
		}

		$senhaNova = password_hash($_POST['senhanova'], PASSWORD_DEFAULT);

		$stmt->close();

		$stmt = $link->prepare('UPDATE usuariopj SET senha=? WHERE id_pjusu=?');
		$stmt->bind_param('si', $senhaNova, $idusu);
		if($stmt->execute()){
			$resposta['sucesso'] = $sucesso;
			echo json_encode($resposta);
		}

		$stmt->close();

	} else if($tabela == 2){
		$stmt = $link->prepare("SELECT senha FROM usuariopf WHERE id_pfusu = ?");
		$stmt->bind_param('s', $idusu);
		if($stmt->execute()){
			$stmt->bind_result($senhausu);
			$stmt->fetch();
			if(!password_verify($senhaAntiga, $senhausu)){
				$resposta['senha_errada'] = $senha_incorreta;
				echo json_encode($resposta);
				die();
			}

			$senhaNova = password_hash($_POST['senhanova'], PASSWORD_DEFAULT);

			$stmt->close();

			$stmt = $link->prepare('UPDATE usuariopf SET senha=? WHERE id_pfusu=?');
			$stmt->bind_param('si', $senhaNova, $idusu);
			if($stmt->execute()){
				$resposta['sucesso'] = $sucesso;
				echo json_encode($resposta);
			}

			$stmt->close();
		}
	}
}


if($email == 1){
	if(empty($emailAntigo) || empty($emailNovo) || empty($emailConfirma)){
		echo 'oi';
	}
}

?>