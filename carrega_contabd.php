<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$atualizar = isset($_POST['attconta']) ? $_POST['attconta'] : 0;
$nomeusu = isset($_POST['nome']) ? $_POST['nome'] : '';
$nome2usu = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$celusu = isset($_POST['tel-cel']) ? $_POST['tel-cel'] : 0;
$fixousu = isset($_POST['fixo']) ? $_POST['fixo'] : 0;
$comercialusu = isset($_POST['comercial']) ? $_POST['comercial'] : 0;
$descriusu = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$fbusu = isset($_POST['facebook']) ? $_POST['facebook'] : '';
$instausu = isset($_POST['instagram']) ? $_POST['instagram'] : '';
$siteusu = isset($_POST['site1']) ? $_POST['site1'] : 0;
$campo_vazio = false;
$num_errado = false;

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

?>