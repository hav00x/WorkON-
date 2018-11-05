<?php

require_once('db.class.php');

session_start();

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
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto FROM usuariopf WHERE nome=? AND cli_ou_dev=2');
	$stmt->bind_param('s', $nome);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto FROM usuariopj WHERE nomefant=? AND cli_ou_dev=2');
	$stmt->bind_param('s', $nome);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}
} else if($check == 2){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto FROM usuariopf WHERE segmento=? AND cli_ou_dev=2');
	$stmt->bind_param('s', $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto FROM usuariopj WHERE segmento=? AND cli_ou_dev=2');
	$stmt->bind_param('s', $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}
} else if($check == 3){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto FROM usuariopf WHERE nome=? AND segmento=? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $nome, $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto FROM usuariopj WHERE nomefant=? AND segmento=? cli_ou_dev=2');
	$stmt->bind_param('ss', $nome, $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}
} else if($check == 4){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto FROM usuariopf WHERE estado=? AND cli_ou_dev=2');
	$stmt->bind_param('s', $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto FROM usuariopj WHERE estado=? AND cli_ou_dev=2');
	$stmt->bind_param('s', $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}
} else if($check == 5){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto FROM usuariopf WHERE nome=? AND estado=? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $nome, $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto FROM usuariopj WHERE nomefant=? AND estado=? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $nome, $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}
} else if($check == 6){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto FROM usuariopf WHERE segmento=? AND estado=? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $produto, $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto FROM usuariopj WHERE segmento=? AND estado=? AND cli_ou_dev=2');
	$stmt->bind_param('ss', $produto, $localizacao);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}
} else if($check == 7){
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto FROM usuariopf WHERE nome=? AND estado=? AND segmento=? AND cli_ou_dev=2');
	$stmt->bind_param('sss', $nome, $localizacao, $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto FROM usuariopj WHERE nomefant=? AND estado=? AND segmento=? AND cli_ou_dev=2');
	$stmt->bind_param('sss', $nome, $localizacao, $produto);
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}
} else{
	$stmt = $link->prepare('SELECT nome, estado, segmento, foto FROM usuariopf WHERE cli_ou_dev=2');
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}

	$stmt = $link->prepare('SELECT nomefant, estado, segmento, foto FROM usuariopj WHERE cli_ou_dev=2');
	if($stmt->execute()){
		$stmt->store_result();
		$stmt->bind_result($nomebd, $estado, $segmento, $foto);
		while($stmt->fetch()){
			echo '<div class="perfil-busca row">
			<div class="col-md-4 label-perfil">
			<img class="img-thumbnail img-perfil" src="'.$foto.'">
			</div>
			<div class="col-md-8" style="margin-top: 20px;" >
			<h4>Nome: '.$nomebd.'</h4>
			<h4>Localização: '.$estado.'</h4>
			<h4>Especialização: '.$segmento.'</h4>

			<button style="margin-top: 60px;" class="btn btn-block button-hp">Ver mais</button>
			</div>
			</div>';
		}
	}
}

?>