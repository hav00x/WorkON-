<?php

session_start();

require_once('db.class.php');

$objdb = new db();
$link = $objdb->connect();
$email = isset($_POST['email']) ? $_POST['email'] : '';

$stmt = $link->prepare("SELECT nome, estado, descr, facebook, instagram, site, segmento, foto, email FROM usuariopf WHERE email = ?");
$stmt->bind_param('s', $email);
if($stmt->execute()){
	$resultP = $stmt->get_result();
	$rowP = $resultP->fetch_assoc();
	$stmt->close();
	if($rowP['email'] == $email){
		echo json_encode($rowP);
	} else{
		$stmt = $link->prepare("SELECT nomefant, estado, descr, facebook, instagram, site, segmento, foto, email FROM usuariopj WHERE email = ?");
		$stmt->bind_param('s', $email);
		if($stmt->execute()){
			$resultP = $stmt->get_result();
			$rowP = $resultP->fetch_assoc();
			$stmt->close();
			if($rowP['email'] == $email){
				echo json_encode($rowP);
			}
		} else{
			echo 'Houve um erro ao pegar os dados do usuário';
		}
	}
}

?>