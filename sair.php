<?php

	session_start();

	unset($_SESSION['nome_fantasia']);
	unset($_SESSION['nome']);
	unset($_SESSION['email']);
	unset($_SESSION['id_usuario']);

	header('Location: index.php');

?>