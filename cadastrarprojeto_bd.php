<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$nome_projeto = $_POST['nome_projeto'];
$nome_cliente = $_POST['nomecli'];
$tipo_projeto = $_POST['tipopro'];
$descricao = $_POST['descripro'];
$data_inicio = $_POST['dataini'];
$data_entrega = $_POST['dataterm'];
$passos = $_POST['campo'];
$nome_etapa = $_POST['nomeetapa'];
$preco = $_POST['precoest'];
$check = false;
$usuariopj = 0;
$usuariopf = 0;

var_dump($nome_etapa);

/*
$stmt = $link->prepare("INSERT INTO intermediario(id_pfusu, id_pjusu) VALUES(?, ?)");

if($_SESSION['id_fusuario']){
	$usuariopf = $_SESSION['id_fusuario'];
	$usuariopj = null;
} else if($_SESSION['id_jusuario']){
	$usuariopj = $_SESSION['id_jusuario'];
	$usuariopf = null;
}

$stmt->bind_param("ii", $usuariopf, $usuariopj);
if($stmt->execute()){
	$idquery = mysqli_insert_id($link);
} else{
	echo 'Ocorreu um erro no banco de dados';
}

$stmt->close();

$stmt = $link->prepare("INSERT INTO projeto(nome_projeto, nome_cliente, tipo_projeto, descri_projeto, preco_estabelecido, data_inicio, data_entrega, id_intermediario) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiiii", $nome_projeto, $nome_cliente, $tipo_projeto, $descricao, $preco, $data_inicio, $data_entrega, $idquery);
if($stmt->execute()){
	$idprojeto = mysqli_insert_id($link);
} else{
	echo 'Erro ao executar o formulário no banco de dados';
}

$stmt->close();

$stmt = $link->prepare("INSERT INTO etapas(etapa, ordem_etapa, id_projeto) VALUES(?, ?, ?)");
$stmt->bind_param("sii", )

*/
?>