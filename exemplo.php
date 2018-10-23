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
$nome_etapa = $_POST['nome_etapa'];
$preco = $_POST['precoest'];
$check = false;
$usuariopj = 0;
$usuariopf = 0;
$idetapa = array();
$numeroPassos = array();
$campo_vazio = false;

if(!isset($nome_projeto, $nome_cliente, $tipo_projeto, $descricao, $data_inicio, $data_entrega, $passos, $nome_etapa, $preco)){
  $campo_vazio = true;
}

?>