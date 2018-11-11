<?php

$chave = $_SESSION['clidev'];
if($chave === 1){

	echo '
	<!-- Sidebar Holder -->
	<nav id="sidebar">
	<div class="sidebar-header">
	<a href="homepage.php">
	<img class="img-responsive img-logo-sidebar" src="img/navlogo.png">
	</a>
	</div>

	<ul class="list-unstyled components">
	<p id="local-atual">Você está em:
	';
	$url1 = explode("/", $_SERVER["REQUEST_URI"]);
	$url2 = explode(".", $url1[2]);
	if($url2[0] == "homepage"){
		$url2[0] = "página principal";
	} else if($url2[0] == "sua_conta"){
		$url2[0] = "minhas definições";
	}else if($url2[0] == "sua_contacnf"){
		$url2[0] = "definições privadas";
	}
	echo ucfirst($url2[0]);
	echo '
	</p>
	<li class="home">
	<a href="homepage.php" id="home">Página Principal</a>
	</li>
	<li class="request">
	<a href="#pageSubMenu2" id="request" data-toggle="collapse" aria-expanded="false">Pedidos</a>
	<ul class="collapse list-unstyled" id="pageSubMenu2">
	<li><a href="perfis.php">Perfis</a></li>
	<li><a href="pedidos.php">Solicitações</a></li>
	</ul>
	</li>
	<li class="definition">
	<a href="#pageSubMenu3" id="request" data-toggle="collapse" aria-expanded="false">Sua Conta</a>
	<ul class="collapse list-unstyled" id="pageSubMenu3">
	<li><a href="sua_conta.php">Minhas Definições</a></li>
	<li><a href="sua_contacnf.php">Definições Privadas</a></li>
	</ul>
	</li>
	</ul>
	<div id="btnMenu">
	<button type="button" id="sidebarCollapse" class="btn navbar-btn img-responsive">
	<img class="img-responsive" src="img/001-back.png">
	</button>
	</div>
	</nav> ';

} else if($chave === 2){

	echo '
	<!-- Sidebar Holder -->
	<nav id="sidebar">
	<div class="sidebar-header">
	<a href="homepage.php">
	<img class="img-responsive img-logo-sidebar" src="img/navlogo.png">
	</a>
	</div>

	<ul class="list-unstyled components">
	<p id="local-atual">Você está em:
	';
	$url1 = explode("/", $_SERVER["REQUEST_URI"]);
	$url2 = explode(".", $url1[2]);
	if($url2[0] == "homepage"){
		$url2[0] = "página principal";
	} else if($url2[0] == "sua_conta"){
		$url2[0] = "minhas definições";
	}else if($url2[0] == "sua_contacnf"){
		$url2[0] = "definições privadas";
	}
	echo ucfirst($url2[0]);
	echo '
	</p>
	<li class="home">
	<a href="homepage.php" id="home">Página Principal</a>
	</li>
	<li class="project">
	<a href="projetos.php" id="project">Projetos</a>
	</li>
	<li class="request">
	<a href="#pageSubMenu2" id="request" data-toggle="collapse" aria-expanded="false">Pedidos</a>
	<ul class="collapse list-unstyled" id="pageSubMenu2">
	<li><a href="perfis.php">Perfis</a></li>
	<li><a href="pedidos.php">Solicitações</a></li>
	</ul>
	</li>
	<li class="definition">
	<a href="#pageSubMenu3" id="request" data-toggle="collapse" aria-expanded="false">Sua Conta</a>
	<ul class="collapse list-unstyled" id="pageSubMenu3">
	<li><a href="sua_conta.php">Minhas Definições</a></li>
	<li><a href="sua_contacnf.php">Definições Privadas</a></li>
	</ul>
	</li>
	</ul>
	<div id="btnMenu">
	<button type="button" id="sidebarCollapse" class="btn navbar-btn img-responsive">
	<img class="img-responsive" src="img/001-back.png">
	</button>
	</div>
	</nav> ';

}