<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$id_usuario = is_null($_SESSION['id_fusuario']) ? $_SESSION['id_jusuario'] : $_SESSION['id_fusuario'];

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
	echo '<div class="col-md-4 col-md-offset-4" style="text-align: center;">
	<p>Você não possui nenhum projeto! Comece um agora usando o botão "Novo Projeto"</p>
	</div>';
}

$stmt = $link->prepare("SELECT id_intermediario FROM intermediario where (id_pfusu = ? OR id_pjusu = ?)");
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

$indiceProjeto = $resultado;
$stmt->close();

for($i = 0; $i < $contaProjetos; $i++){
	$stmt = $link->prepare('SELECT id_projeto, nome_cliente, preco_estabelecido, nome_projeto, data_entrega FROM projeto WHERE id_intermediario = ?');
	if ($stmt === false) {
		trigger_error($this->mysqli->error, E_USER_ERROR);
		return;
	}

	$stmt->bind_param('i', $indiceProjeto[$i][0]);
	if($stmt->execute()){

		$stmt->store_result();
		$stmt->bind_result($id_projeto, $nome_cliente, $preco, $nome_projeto, $data_entrega);
		while($stmt->fetch()){
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
				<button type="button" class="btn button-hp btn-maisdeta" data-value="'.$i.'">Mais Detalhes</button>
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
	}else{
		echo 'Ocorreu um erro ao recuperar os projetos';
	}
}

?>