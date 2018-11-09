<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$nomeusu = isset($_POST['nome']) ? $_POST['nome'] : '';
$nome2usu = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$celusu = isset($_POST['tel-cel']) ? $_POST['tel-cel'] : 0;
$fixousu = isset($_POST['fixo']) ? $_POST['fixo'] : 0;
$comercialusu = isset($_POST['comercial']) ? $_POST['comercial'] : 0;
$descriusu = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$fbusu = isset($_POST['facebook']) ? $_POST['facebook'] : '';
$instausu = isset($_POST['instagram']) ? $_POST['instagram'] : '';
$siteusu = isset($_POST['site1']) ? $_POST['site1'] : '';
$campo_vazio = false;
$num_errado = false;
$retorno = array();

if (empty($nomeusu) || empty($celusu) || empty($descriusu)) {
	$campo_vazio = true;
}

if(strlen($celusu) != 11){
	$num_errado = true;
} elseif(!is_numeric($celusu)){
	$num_errado = true;
}

if(!empty($comercialusu) && strlen($comercialusu) != 11){
	$num_errado = true;
}elseif(!empty($comercialusu) && !is_numeric($comercialusu)){
	$num_errado = true;
}
if(!empty($fixousu) && strlen($fixousu) != 10){
	$num_errado = true;
}elseif(!empty($fixousu) && !is_numeric($fixo)){
	$num_errado = true;
}

if($num_errado || $campo_vazio){

	if($campo_vazio){
		$retorno['campo_errado'] = 1;
	}
	if($num_errado){
		$retorno['num_errado'] = 1;
	}

	echo json_encode($retorno);
	die();

}

if(is_null($_SESSION['id_fusuario'])){
	$idusu = $_SESSION['id_jusuario'];
	$tabela = 1;
} else{
	$idusu = $_SESSION['id_fusuario'];
	$tabela = 2;
}

if($tabela === 1){	

	$stmt = $link->prepare('UPDATE usuariopj SET nomefant=?, razaosoci=?, cel=?, fixo=?, comercial=?, descr=?, facebook=?, instagram=?, site=? WHERE id_pjusu=?');
	$stmt->bind_param('ssiiissssi', $nomeusu, $nome2usu, $celusu, $fixousu, $comercialusu, $descriusu, $fbusu, $instausu, $siteusu, $idusu);
	if($stmt->execute()){
		echo "Perfil atualizado com sucesso";
	} else{
		echo "Erro ao atualizar o perfil";
		die();
	}

	$stmt->close();

} else if($tabela === 2){

	$stmt = $link->prepare('UPDATE usuariopf SET nome=?, sobrenome=?, cel=?, fixo=?, comercial=?, descr=?, facebook=?, instagram=?, site=? WHERE id_pfusu=?');
	$stmt->bind_param('ssiiissssi', $nomeusu, $nome2usu, $celusu, $fixousu, $comercialusu, $descriusu, $fbusu, $instausu, $siteusu, $idusu);
	if($stmt->execute()){
		echo "Perfil atualizado com sucesso";
	} else{
		echo "Erro ao atualizar o perfil";
		die();
	}

	$stmt->close();

}

?>