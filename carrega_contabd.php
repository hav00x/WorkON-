<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$atualizar = isset($_POST['attconta']) ? $_POST['attconta'] : 0;
$nomeusu = isset($_POST['nome-suaconta']) ? $_POST['nome-suaconta'] : '';
$celusu = isset($_POST['cel-suaconta']) ? $_POST['cel-suaconta'] : 0;
$descriusu = isset($_POST['descri-suaconta']) ? $_POST['descri-suaconta'] : '';
$fbusu = isset($_POST['fb-suaconta']) ? $_POST['fb-suaconta'] : '';
$instausu = isset($_POST['insta-suaconta']) ? $_POST['insta-suaconta'] : '';
$siteusu = isset($_POST['site-suaconta']) ? $_POST['site-suaconta'] : 0;
$campo_vazio = false;
$num_errado = false;

if(is_null($_SESSION['id_fusuario'])){
	$idusu = $_SESSION['id_jusuario'];
	$tabela = 1;
} else{
	$idusu = $_SESSION['id_fusuario'];
	$tabela = 2;
}

if($atualizar == 0){

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
			die();
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
			die();
		}
	}

}

if($atualizar == 1){

	if (empty($nomeusu) || empty($celusu) || empty($descriusu)) {
		$campo_vazio = true;
	}
	
	if(strlen($cel) != 11){
		$num_errado = true;
	} elseif(!is_numeric($cel)){
		$num_errado = true;
	}

	if(!empty($comercial) && strlen($comercial) != 11){
		$num_errado = true;
	}elseif(!empty($comercial) && !is_numeric($comercial)){
		$num_errado = true;
	}
	if(!empty($fixo) && strlen($fixo) != 10){
		$num_errado = true;
	}elseif(!empty($fixo) && !is_numeric($fixo)){
		$num_errado = true;
	}

	if($tabela === 1){	

		$stmt = $link->prepare('UPDATE usuariopj SET nomefant=?, cel=?, descr=?, facebook=?, instagram=?, site=? WHERE id_pjusu=?');
		$stmt->bind_param('sissssi', $nomeusu, $celusu, $descriusu, $fbusu, $instausu, $siteusu, $idusu);
		if($stmt->execute()){

		}
	} else if($tabela === 2){

		$stmt = $link->prepare('UPDATE usuariopf SET nome=?, cel=?, descr=?, facebook=?, instagram=?, site=? WHERE id_pfusu=?');
		$stmt->bind_param('sissssi', $nomeusu, $celusu, $descriusu, $fbusu, $instausu, $siteusu, $idusu);
		if($stmt->execute()){
			
		}
	}
}

?>