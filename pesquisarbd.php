<?php

require_once('db.class.php');

session_start();

$seuemail = $_SESSION['email'];
$nome = !empty($_POST['nome-usu']) ? '%'.$_POST['nome-usu'].'%' : '';
$produto = !empty($_POST['tipo-produto']) ? '%'.$_POST['tipo-produto'].'%' : '';
$localizacao = !empty($_POST['localizacao']) ? '%'.$_POST['localizacao'].'%' : '';
$objdb = new db();
$link = $objdb->connect();
$check = 0;

if($nome != ''){
	$check = $check+1;
}

if($produto != ''){
	$check = $check+2;
}

if($localizacao != ''){
	$check = $check+4;
}

if($check == 1){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto, email, email FROM usuariopf WHERE nome LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('s', $nome);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto, email FROM usuariopj WHERE nomefant LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('s', $nome);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

} else if($check == 2){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto, email FROM usuariopf WHERE segmento LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('s', $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto, email FROM usuariopj WHERE segmento LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('s', $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

} else if($check == 3){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto, email FROM usuariopf WHERE nome LIKE ? AND segmento LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $nome, $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto, email FROM usuariopj WHERE nomefant LIKE ? AND segmento LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $nome, $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

} else if($check == 4){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto, email FROM usuariopf WHERE estado LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('s', $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto, email FROM usuariopj WHERE estado LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('s', $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

} else if($check == 5){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto, email FROM usuariopf WHERE nome LIKE ? AND estado LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $nome, $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto, email FROM usuariopj WHERE nomefant LIKE ? AND estado LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $nome, $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

} else if($check == 6){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto, email FROM usuariopf WHERE segmento LIKE ? AND estado LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $produto, $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto, email FROM usuariopj WHERE segmento LIKE ? AND estado LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $produto, $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

} else if($check == 7){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto, email FROM usuariopf WHERE nome LIKE ? AND estado LIKE ? AND segmento LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('sss', $nome, $localizacao, $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto, email FROM usuariopj WHERE nomefant LIKE ? AND estado LIKE ? AND segmento LIKE ? AND cli_ou_dev=2');
	$stmt->bind_param('sss', $nome, $localizacao, $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

} else{
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto, email FROM usuariopf WHERE cli_ou_dev=2');
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto, email FROM usuariopj WHERE cli_ou_dev=2');
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto, $email);
		while($stmt->fetch()){
			if($email != $seuemail){
				echo '<div class="perfil-busca row">
				<div class="col-md-4 label-perfil">
				<img class="img-thumbnail img-perfil" src="'.$foto.'">
				</div>
				<div class="col-md-8" style="margin-top: 20px;" >
				<h4>Nome: '.$nomebd.'</h4>
				<h4>Localização: '.$estado.'</h4>
				<h4>Especialização: '.$segmento.'</h4>
				<form>
				<input type="text" class="hide" value="'.$email.'">
				<button style="margin-top: 100px; margin-bottom: 20px;" class="btn btn-block button-hp btn-maisdetal" data-toggle="modal" data-target="#detalheperf">Ver mais</button>
				</form>
				</div>
				</div>';
			}
		}
	}

	$stmt->close();
}

?>