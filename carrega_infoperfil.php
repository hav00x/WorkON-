<?php

require_once('db.class.php');
session_start();

$objdb = new db();
$link = $objdb->connect();
$email = $_SESSION['email'];
$foto = isset($_POST['foto']) ? $_POST['foto'] : 0;

if($foto == 0){
	$stmt = $link->prepare("SELECT nomefant, email, estado, descr, facebook, instagram, site FROM usuariopj WHERE email = ?");
	$stmt->bind_param('s', $email);
	if($stmt->execute()){
		$stmt->bind_result($nomefant, $jemail, $estado, $descr, $facebook, $instagram, $site);
		$stmt->fetch();

		if(empty($facebook)){
			$facebook = 'Nenhum';
		}
		if(empty($site)){
			$site = 'Nenhum';
		}
		if(empty($instagram)){
			$instagram = 'Nenhum';
		}
		
		if(isset($jemail)){

			echo '<div class="row">
			<div  class="col-md-12">
			<h3 id="header-homepage"><img src="img/infocard.png"> Sobre você</h3>
			</div>
			</div>
			<div class="row">
			<div class="col-md-4"><label> Nome </label>
			<p>'.$nomefant.'</p>
			</div>
			<div class="col-md-4"> <label> E-mail</label>
			<p>'.$jemail.'</p>
			</div>

			<div class="col-md-4"> <label>Localização</label>
			<p>'.$estado.'</p>
			</div>
			</div><!--fim row who-info-->

			<div class="row">
			<div class="col-md-12">
			<h3 id="header-homepage"><img src="img/werk.png"> O que você faz</h3>
			</div>
			</div><!-- fim row what-->

			<div class="row">
			<div class="col-md-12"> <label> Descrição</label>
			<p>'.$descr.'</p>
			</div>
			</div><!--fim row descrição-->

			<div class="row">
			<div class="col-md-4"> <label> Facebook</label>
			<p>'.$facebook.'</p>
			</div>
			<div class="col-md-4"> <label> Instagram</label>
			<p>'.$instagram.'</p>
			</div>
			<div  class="col-md-4"> 
			<label>Site</label>
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

		if(empty($facebook)){
			$facebook = 'Nenhum';
		}
		if(empty($site)){
			$site = 'Nenhum';
		}
		if(empty($instagram)){
			$instagram = 'Nenhum';
		}
		if(isset($femail)){

			echo '<div class="row">
			<div  class="col-md-12">
			<h3 id="header-homepage"> Sobre você</h3>
			</div>
			</div><!--fim row who-->
			<div class="row">

			<div class="col-md-4">
			<label>Nome</label>
			<p>'.$nome.'</p>
			</div>
			<div class="col-md-4">
			<label>E-mail</label>
			<p>'.$femail.'</p>
			</div>

			<div class="col-md-4">
			<label>Localização</label>
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
			<label>Descrição</label>
			<p>'.$descr.'</p>
			</div>
			</div><!--fim row descrição-->

			<div class="row">
			<div class="col-md-4">
			<label>Facebook</label>
			<p>'.$facebook.'</p>
			</div>
			<div class="col-md-4">
			<label>Instagram</label>
			<p>'.$instagram.'</p>
			</div>
			<div  class="col-md-4">
			<label>Site</label>
			<p>'.$site.'</p>
			</div>
			</div><!--fim row social media-->';



		}
	}

	$stmt->close();
}

if($foto == 1){

	$stmt = $link->prepare("SELECT foto, email FROM usuariopj WHERE email = ?");
	$stmt->bind_param('s', $email);
	if($stmt->execute()){
		$stmt->bind_result($fotos, $jemail);
		$stmt->fetch();
		if(isset($jemail)){
			echo '<img src="'.$fotos.'" class="img-responsive img-thumbnail img-perfilhp">';
		}
	}

	$stmt->close();

	$stmt = $link->prepare("SELECT foto, email FROM usuariopf WHERE email = ?");
	$stmt->bind_param('s', $email);
	if($stmt->execute()){
		$stmt->bind_result($fotos, $femail);
		$stmt->fetch();
		if(isset($femail)){
			echo '<img src="'.$fotos.'" class="img-responsive img-thumbnail img-perfilhp">';
		}
	}

	$stmt->close();
}
?>