<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$email = $_SESSION['email'];
$check = isset($_POST['check']) ? $_POST['check'] : 0;
$id_msg = isset($_POST['msg']) ? $_POST['msg'] : 0;

if($check == 0){

	$stmt = $link->prepare("SELECT COUNT(id_mensagem) FROM solicitacao WHERE email_usurecebe=?");
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}

	$stmt->bind_param('s', $email);
	if($stmt->execute()){
		$stmt->bind_result($contaMensagens);
		$stmt->fetch();
	} else{
		echo 'Ocorreu um ao recuperar as solicitações';
	}

	$stmt->close();

	$stmt = $link->prepare('SELECT id_mensagem, mensagem, email_usuenvia, data_envio, nomeusu_solicitacao FROM solicitacao WHERE email_usurecebe=?');
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}

	$stmt->bind_param('s', $email);

	if($stmt->execute()){
		$i = 0;
		$stmt->store_result();
		$stmt->bind_result($id_msg, $mensagem, $email_cli, $data_envio, $nome_cli);
		while($stmt->fetch()){

			$i++;

			if($i % 2 == 0){
				$date = DateTime::createFromFormat('Y-m-d', $data_envio);

				echo '<div class="col-md-5 col-half-margin-right col-md-offset-1 divisor-pedidos alinha-meio">
				<form id="form'.$id_msg.'">
				<h3>'.$nome_cli.'</h3>
				<h5>'.$date->format('d-m-Y').'</h5>
				<p max-lenght="200" class="area-txt">'.$mensagem.'</p>
				</form>
				<button class="button-hp btn-abremsg" data-toggle="modal" data-value="'.$id_msg.'">Mais Informações</button>
				</div>';
			} else{
				$date = DateTime::createFromFormat('Y-m-d', $data_envio);

				echo '<div class="col-md-5 col-half-margin-left divisor-pedidos alinha-meio">
				<form id="form'.$id_msg.'">
				<h3>'.$nome_cli.'</h3>
				<h5>'.$date->format('d-m-Y').'</h5>
				<p max-lenght="200" class="area-txt">'.$mensagem.'</p>
				</form>
				<button class="button-hp btn-abremsg" data-toggle="modal" data-value="'.$id_msg.'">Mais Informações</button>
				</div>';
			}
		}
	} else{
		echo 'Erro';
	}

	$stmt->close();
}

if($check == 1){

	$stmt = $link->prepare('SELECT mensagem, email_usuenvia, data_envio, nomeusu_solicitacao FROM solicitacao WHERE id_mensagem=?');
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}

	$stmt->bind_param('s', $id_msg);

	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($mensagem, $email_cli, $data_envio, $nome_cli);
		$stmt->fetch();
		$stmt->close();
	}

	$stmt = $link->prepare('SELECT * FROM solicitacao WHERE id_mensagem=?');
	$stmt->bind_param('i', $id_msg);
	if($stmt->execute()){
		$resultO = $stmt->get_result();
		$rowO = $resultO->fetch_assoc();
	}

	$stmt->close();

	$stmt = $link->prepare('SELECT email, cel, comercial FROM usuariopj WHERE email=?');
	$stmt->bind_param('s', $rowO['email_usuenvia']);
	if($stmt->execute()){
		$resultP = $stmt->get_result();
		if($resultP->num_rows > 0){

			$rowP = $resultP->fetch_assoc();

			$dados = array('mensagem' => $rowO, 'usuario' => $rowP);

			echo json_encode($dados);
		} else{

			$stmt->close();

			$stmt = $link->prepare('SELECT email, cel, comercial FROM usuariopf WHERE email=?');
			$stmt->bind_param('s', $rowO['email_usuenvia']);
			if($stmt->execute()){
				$resultP = $stmt->get_result();
				if($resultP->num_rows > 0){
					
					$rowP = $resultP->fetch_assoc();

					$dados = array('mensagem' => $rowO, 'usuario' => $rowP);

					echo json_encode($dados);
				}
			} else{
				echo 'Erro ao conectar com o banco de dados';
			}

			$stmt->close();
		}
	}else{
		echo 'Erro ao conectar com o banco de dados';
	}
}
?>