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
$segmentousu = isset($_POST['segmento']) ? $_POST['segmento'] : '';
$campo_vazio = false;
$num_errado = false;
$retorno = array();

echo $_FILES['Filedata'];
?>