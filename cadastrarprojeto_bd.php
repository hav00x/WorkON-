<?php

require_once('db.class.php');

$objdb = new db();
$link = $objdb->connect();
$nome_cliente = $_POST['nomecli'];
$tipo_projeto = $_POST['tipopro'];
$descricao = $_POST['descripro'];
$data_inicio = $_POST['dataini'];
$data_entrega = $_POST['dataterm'];
$passos = $_POST['campo'];

var_dump($passos[1][1]);

?>