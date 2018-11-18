<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$id_usuario = is_null($_SESSION['id_fusuario']) ? $_SESSION['id_jusuario'] : $_SESSION['id_fusuario'];
$url = isset($_POST['url']) ? $_POST['url'] : -1;
$qtd_projetos = isset($_POST['qtdprojetos']) ? $_POST['qtdprojetos'] : '';
$cli_ou_dev = $_SESSION['clidev'];
$email_logado = $_SESSION['email'];
$urlchk = false;

if(!$qtd_projetos == ''){
	$qtd_projetos = explode('-', $qtd_projetos);
	$offset = ($qtd_projetos[1]-1)*6;
}

if($url >= 0){
	$urlchk = true;
}

if($cli_ou_dev == 2){

	$stmt = $link->prepare("SELECT COUNT(id_intermediario) FROM intermediario WHERE (id_pfusu = ? OR id_pjusu = ?)");
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}

	$stmt->bind_param('ii', $id_usuario, $id_usuario);
	if($stmt->execute()){
		$stmt->bind_result($contaProjetos);
		$stmt->fetch();
	} else{
		echo 'Ocorreu um ao recuperar os projetos';
	}

	$stmt->close();

	if($contaProjetos <= 0){
		if($urlchk){
			echo '<div class="col-md-4 col-md-offset-4" style="text-align: center; margin-top: 5px;">
			<p>Você não possui nenhum projeto!</p>
			</div>';
		} else{
			echo '<div class="col-md-4 col-md-offset-4" style="text-align: center; margin-top: 5px;">
			<p>Você não possui nenhum projeto! Comece um agora usando o botão "Novo Projeto"</p>
			</div>';
		}
	}

	if($qtd_projetos == ''){
		$stmt = $link->prepare("SELECT id_intermediario FROM intermediario where (id_pfusu = ? OR id_pjusu = ?) ORDER BY id_intermediario DESC LIMIT 6");

		if ($stmt === false) {
			trigger_error($this->mysqli->error, E_USER_ERROR);
			return;
		}

		$stmt->bind_param('ii', $id_usuario, $id_usuario);
		if($stmt->execute()){
			$resultSet = $stmt->get_result();
			$resultado = $resultSet->fetch_all();
		} else{
			echo 'Ocorreu um erro ao recuperar os intermediarios';
		}

	} else if($qtd_projetos >= 0){
		$stmt = $link->prepare("SELECT id_intermediario FROM intermediario where (id_pfusu = ? OR id_pjusu = ?) ORDER BY id_intermediario DESC LIMIT 6 OFFSET ?");

		if ($stmt === false) {
			trigger_error($this->mysqli->error, E_USER_ERROR);
			return;
		}

		$stmt->bind_param('iii', $id_usuario, $id_usuario, $offset);
		if($stmt->execute()){
			$resultSet = $stmt->get_result();
			$resultado = $resultSet->fetch_all();
		} else{
			echo 'Ocorreu um erro ao recuperar os intermediarios';
		}
	}

	$indiceProjeto = $resultado;
	$stmt->close();

	for($i = 0; $i < $contaProjetos; $i++){
		$stmt = $link->prepare('SELECT id_projeto, nome_cliente, preco_estabelecido, nome_projeto, data_entrega FROM projeto WHERE id_intermediario=? ');
		if ($stmt === false) {
			trigger_error($this->mysqli->error, E_USER_ERROR);
			return;
		}

		$stmt->bind_param('i', $indiceProjeto[$i][0]);
		if($stmt->execute()){

			$stmt->store_result();
			$stmt->bind_result($id_projeto, $nome_cliente, $preco, $nome_projeto, $data_entrega);
			while($stmt->fetch()){
				if($urlchk){
					if($i % 2 == 0){
						$date = DateTime::createFromFormat('Y-m-d', $data_entrega);

						echo '<div class="col-md-4 divisor-projetos col-md-offset-1">
						<div class="col-md-12">
						<h3>'.$nome_projeto.'</h3>					
						</div>		
						<div class="col-md-12">
						<img class="img-projetos" src="img/hog.jpg">
						<div class="info-proj">
						Nome do cliente: '.$nome_cliente.'<br>				
						Preço Estabelecido: R$'.$preco.'<br>
						<p>Data de entrega: '.$date->format('d-m-Y').'</p><br>					
						</div>					
						</div>
						</div>';

					}else{
						$date = DateTime::createFromFormat('Y-m-d', $data_entrega);


						echo '<div class="col-md-4 divisor-projetos col-md-offset-2">
						<div class="col-md-12">
						<h3>'.$nome_projeto.'</h3>
						</div>		
						<div class="col-md-12">
						<img class="img-projetos" src="img/hog.jpg">
						<div class="info-proj">
						Nome do cliente: '.$nome_cliente.'<br>
						Preço Estabelecido: R$'.$preco.'<br>
						<p>Data de entrega: '.$date->format('d-m-Y').'</p><br>
						</div>
						</div>
						</div>';
					}

				} else{

					if($i % 2 == 0){
						$date = DateTime::createFromFormat('Y-m-d', $data_entrega);

						echo '<div class="col-md-4 divisor-projetos col-md-offset-1">
						<form id="form'.$i.'" method="post">
						<div class="col-md-12">
						<h3>'.$nome_projeto.'</h3>
						<input type="text" class="hide" name="nomeprojatt" value="'.$nome_projeto.'">
						</div>		
						<div class="col-md-12">
						<img class="img-projetos" src="img/hog.jpg">
						<div class="info-proj">
						Nome do cliente: '.$nome_cliente.'<br>
						<input type="text" class="hide" name="nomecliatt" value="'.$nome_cliente.'">
						Preço Estabelecido: R$'.$preco.'<br>
						<input type="text" class="hide" name="precoatt" value="'.$preco.'">
						Data de entrega: '.$date->format('d-m-Y').'<br>
						<input type="text" class="hide" name="dataentatt" value="'.$data_entrega.'">
						</div>
						<input type="text" class="hide" id="p'.$i.'" name="projatt" value="'.$id_projeto.'">

						<div class="row">
						<div class="col-md-6">
						<button type="button" class="btn button-hp btn-maisdeta btn-block" data-value="'.$i.'">Mais Detalhes</button>
						</div>
						<div class="col-md-6">
						<button type="button" class="btn button-hp btn-block btn-chatdev">Mensagem</button>
						</div>
						</div>


						</div>
						</form>
						</div>';

					}else{
						$date = DateTime::createFromFormat('Y-m-d', $data_entrega);

						echo '<div class="col-md-4 divisor-projetos col-md-offset-2">
						<form id="form'.$i.'" method="post">
						<div class="col-md-12">
						<h3>'.$nome_projeto.'</h3>
						<input type="text" class="hide" name="nomeprojatt" value="'.$nome_projeto.'">
						</div>		
						<div class="col-md-12">
						<img class="img-projetos" src="img/hog.jpg">
						<div class="info-proj">
						Nome do cliente: '.$nome_cliente.'<br>
						<input type="text" class="hide" name="nomecliatt" value="'.$nome_cliente.'">
						Preço Estabelecido: R$'.$preco.'<br>
						<input type="text" class="hide" name="precoatt" value="'.$preco.'">
						Data de entrega: '.$date->format('d-m-Y').'<br>
						<input type="text" class="hide" name="dataentatt" value="'.$data_entrega.'">
						</div>
						<input type="text" class="hide" id="p'.$i.'" name="projatt" value="'.$id_projeto.'">
						<button type="button" class="btn button-hp btn-maisdeta" data-value="'.$i.'">Mais Detalhes</button>
						</div>
						</form>
						</div>';
					}
				}
			}
		}else{
			echo 'Ocorreu um erro ao recuperar os projetos';
		}
	}
} else if($cli_ou_dev == 1){

	$stmt = $link->prepare("SELECT COUNT(id_projeto) FROM projeto WHERE email=?");
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}

	$stmt->bind_param('s', $email_logado);
	if($stmt->execute()){
		$stmt->bind_result($contaProjetos);
		$stmt->fetch();
	} else{
		echo 'Ocorreu um ao recuperar os projetos';
	}

	$stmt->close();

	if($contaProjetos <= 0){
		if($urlchk){
			echo '<div class="col-md-4 col-md-offset-4" style="text-align: center; margin-top: 5px;">
			<p>Você não possui nenhum projeto!</p>
			</div>';
		} else{
			echo '<div class="col-md-4 col-md-offset-4" style="text-align: center; margin-top: 5px;">
			<p>Você não possui nenhum projeto! Comece um agora usando o botão "Novo Projeto"</p>
			</div>';
		}
	}

	if($qtd_projetos == ''){
		$stmt = $link->prepare("SELECT id_projeto FROM projeto where email=? ORDER BY id_projeto DESC LIMIT 6");

		if ($stmt === false) {
			trigger_error($this->mysqli->error, E_USER_ERROR);
			return;
		}

		$stmt->bind_param('s', $email_logado);
		if($stmt->execute()){
			$resultSet = $stmt->get_result();
			$resultado = $resultSet->fetch_all();

		} else{
			echo 'Ocorreu um erro ao recuperar os intermediarios';
		}

	} else if($qtd_projetos >= 0){
		$stmt = $link->prepare("SELECT id_projeto FROM projeto where email=? ORDER BY id_projeto DESC LIMIT 6 OFFSET ?");

		if ($stmt === false) {
			trigger_error($this->mysqli->error, E_USER_ERROR);
			return;
		}

		$stmt->bind_param('si', $email_logado, $offset);
		if($stmt->execute()){
			$resultSet = $stmt->get_result();
			$resultado = $resultSet->fetch_all();
		} else{
			echo 'Ocorreu um erro ao recuperar os intermediarios';
		}
	}

	$indiceProjeto = $resultado;
	$stmt->close();

	for($i = 0; $i < $contaProjetos; $i++){
		$stmt = $link->prepare('SELECT id_projeto, nome_cliente, preco_estabelecido, nome_projeto, data_entrega FROM projeto WHERE email=?');
		if ($stmt === false) {
			trigger_error($this->mysqli->error, E_USER_ERROR);
			return;
		}

		$stmt->bind_param('s', $email_logado);
		if($stmt->execute()){

			$stmt->store_result();
			$stmt->bind_result($id_projeto, $nome_cliente, $preco, $nome_projeto, $data_entrega);
			while($stmt->fetch()){
				if($urlchk){
					if($i % 2 == 0){
						$date = DateTime::createFromFormat('Y-m-d', $data_entrega);

						echo '<div class="col-md-4 divisor-projetos col-md-offset-1">
						<div class="col-md-12">
						<h3>'.$nome_projeto.'</h3>					
						</div>		
						<div class="col-md-12">
						<img class="img-projetos" src="img/hog.jpg">
						<div class="info-proj">
						Nome do cliente: '.$nome_cliente.'<br>				
						Preço Estabelecido: R$'.$preco.'<br>
						<p>Data de entrega: '.$date->format('d-m-Y').'</p><br>					
						</div>					
						</div>
						</div>';

					}else{
						$date = DateTime::createFromFormat('Y-m-d', $data_entrega);


						echo '<div class="col-md-4 divisor-projetos col-md-offset-2">
						<div class="col-md-12">
						<h3>'.$nome_projeto.'</h3>
						</div>		
						<div class="col-md-12">
						<img class="img-projetos" src="img/hog.jpg">
						<div class="info-proj">
						Nome do cliente: '.$nome_cliente.'<br>
						Preço Estabelecido: R$'.$preco.'<br>
						<p>Data de entrega: '.$date->format('d-m-Y').'</p><br>
						</div>
						</div>
						</div>';
					}

				} else{

					if($i % 2 == 0){
						$date = DateTime::createFromFormat('Y-m-d', $data_entrega);

						echo '<div class="col-md-4 divisor-projetos col-md-offset-1">
						<form id="form'.$i.'" method="post">
						<div class="col-md-12">
						<h3>'.$nome_projeto.'</h3>
						<input type="text" class="hide" name="nomeprojatt" value="'.$nome_projeto.'">
						</div>		
						<div class="col-md-12">
						<img class="img-projetos" src="img/hog.jpg">
						<div class="info-proj">
						Nome do cliente: '.$nome_cliente.'<br>
						<input type="text" class="hide" name="nomecliatt" value="'.$nome_cliente.'">
						Preço Estabelecido: R$'.$preco.'<br>
						<input type="text" class="hide" name="precoatt" value="'.$preco.'">
						Data de entrega: '.$date->format('d-m-Y').'<br>
						<input type="text" class="hide" name="dataentatt" value="'.$data_entrega.'">
						</div>
						<input type="text" class="hide" id="p'.$i.'" name="projatt" value="'.$id_projeto.'">

						<div class="row">
						<div class="col-md-6">
						<button type="button" class="btn button-hp btn-detacli btn-block" data-value="'.$i.'">Mais Detalhes</button>
						</div>
						<div class="col-md-6">
						<button type="button" class="btn button-hp btn-block btn-chatdev">Mensagem</button>
						</div>
						</div>


						</div>
						</form>
						</div>';

					}else{
						$date = DateTime::createFromFormat('Y-m-d', $data_entrega);

						echo '<div class="col-md-4 divisor-projetos col-md-offset-2">
						<form id="form'.$i.'" method="post">
						<div class="col-md-12">
						<h3>'.$nome_projeto.'</h3>
						<input type="text" class="hide" name="nomeprojatt" value="'.$nome_projeto.'">
						</div>		
						<div class="col-md-12">
						<img class="img-projetos" src="img/hog.jpg">
						<div class="info-proj">
						Nome do cliente: '.$nome_cliente.'<br>
						<input type="text" class="hide" name="nomecliatt" value="'.$nome_cliente.'">
						Preço Estabelecido: R$'.$preco.'<br>
						<input type="text" class="hide" name="precoatt" value="'.$preco.'">
						Data de entrega: '.$date->format('d-m-Y').'<br>
						<input type="text" class="hide" name="dataentatt" value="'.$data_entrega.'">
						</div>
						<input type="text" class="hide" id="p'.$i.'" name="projatt" value="'.$id_projeto.'">
						<button type="button" class="btn button-hp btn-detacli" data-value="'.$i.'">Mais Detalhes</button>
						</div>
						</form>
						</div>';
					}
				}
			}
		}else{
			echo 'Ocorreu um erro ao recuperar os projetos';
		}
	}
}
?>