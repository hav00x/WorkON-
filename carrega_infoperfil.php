<?php

require_once('db.class.php');
session_start();

$objdb = new db();
$link = $objdb->connect();
$email = $_SESSION['email'];

$stmt = $link->prepare("SELECT nomefant, email, estado, descr, facebook, instagram, site FROM usuariopj WHERE email = ?");
$stmt->bind_param('s', $email);
if($stmt->execute()){
	$stmt->bind_result($nomefant, $jemail, $estado, $descr, $facebook, $instagram, $site);
	$stmt->fetch();
	if(isset($jemail)){
		
		echo '<div class="row">
		<div  class="col-md-12">
		<h3 id="header-homepage"><img src="img/infocard.png"> Sobre você</h3>
		</div>
		</div>
		<div class="row">
		<div class="col-md-4">
		<p>'.$nomefant.'</p>
		</div>
		<div class="col-md-4">
		<p>'.$jemail.'</p>
		</div>

		<div class="col-md-4">
		<p>'.$estado.'</p>
		</div>
		</div><!--fim row who-info-->

		<div class="row">
		<div class="col-md-12">
		<h3 id="header-homepage"><img src="img/werk.png"> O que você faz</h3>
		</div>
		</div><!-- fim row what-->

		<div class="row">
		<div class="col-md-12">
		<p>'.$descr.'</p>
		</div>
		</div><!--fim row descrição-->

		<div class="row">
		<div class="col-md-4">
		<p>'.$facebook.'</p>
		</div>
		<div class="col-md-4">
		<p>'.$instagram.'</p>
		</div>
		<div  class="col-md-4">
		<p>'.$site.'</p>
		</div>
		</div><!--fim row social media-->';

	}
}


$stmt->close();

$stmt = $link->prepare("SELECT nome, email, estado, descr, facebook, instagram, site FROM usuariopf WHERE email = ?");
$stmt->bind_param('s', $email);
if($stmt->execute()){
	$stmt->bind_result($nome, $femail, $estado, $descr, $facebook, $instagram, $site);
	$stmt->fetch();
	if(isset($femail)){
		
		echo'
		<div class="row">
		<div  class="col-md-12">
		<h3 id="header-homepage"> Sobre você</h3>
		</div>
		</div><!--fim row who-->
		<div class="row">

		<div class="col-md-4">
		<label class="label-perfil">Nome</label>
		<p>'.$nome.'</p>
		</div>
		<div class="col-md-4">
		<label class="label-perfil">E-mail</label>
		<p>'.$femail.'</p>
		</div>

		<div class="col-md-4">
		<label class="label-perfil">Localização</label>
		<p>'.$estado.'</p>
		</div>
		</div><!--fim row who-info-->

		<div class="row">
		<div class="col-md-12">
		<h3 id="header-homepage">O que você faz</h3>
		</div>
		</div><!-- fim row what-->

		<div class="row">
		<div class="col-md-12">
		<label class="label-perfil">Descrição</label>
		<p>'.$descr.'</p>
		</div>
		</div><!--fim row descrição-->

		<div class="row">
		<div class="col-md-4">
		<label class="label-perfil">Facebook</label>
		<p>'.$facebook.'</p>
		</div>
		<div class="col-md-4">
		<label class="label-perfil">Instagram</label>
		<p>'.$instagram.'</p>
		</div>
		<div  class="col-md-4">
		<label class="label-perfil">Site</label>
		<p>'.$site.'</p>
		</div>
		</div><!--fim row social media-->';

	}
}
?>