<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();

$stmt = $link->prepare('SELECT id_intermediario FROM intermediario WHERE ');

?>