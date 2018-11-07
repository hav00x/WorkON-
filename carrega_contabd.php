<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();

if(is_null($_SESSION['id_fusuario'])){
	$idusu = $_SESSION['id_jusuario'];
	$tabela = 1;
} else{
	$idusu = $_SESSION['id_fusuario'];
	$tabela = 2;
}

if($tabela === 1){
	$stmt = $link->prepare('SELECT * FROM usuariopj WHERE id_pjusu=?');
	$stmt->bind_param('i', $idusu);
	if($stmt->execute()){

		$resultP = $stmt->get_result();
		$rowP = $resultP->fetch_assoc();
		$stmt->close();
		$rowP['pjoupf'] = 'pj';
		echo json_encode($rowP);

	} else{
		echo 'Não foi possível a conexão com o banco de dados';
	}
} else if($tabela === 2){
	$stmt = $link->prepare('SELECT * FROM usuariopf WHERE id_pfusu=?');

	$stmt->bind_param('i', $idusu);
	if($stmt->execute()){

		$resultP = $stmt->get_result();
		$rowP = $resultP->fetch_assoc();
		$stmt->close();
		$rowP['pjoupf'] = 'pf';
		echo json_encode($rowP);
		
	} else{
		echo 'Não foi possível a conexão com o banco de dados';
	}
}


?>