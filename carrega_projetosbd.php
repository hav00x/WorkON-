<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$id_usuario = is_null($_SESSION['id_fusuario']) ? $_SESSION['id_jusuario'] : $_SESSION['id_fusuario'];

$stmt = $link->prepare("SELECT COUNT(id_intermediario) FROM intermediario WHERE (id_pfusu = ? OR id_pjusu = ?)");
$stmt->bind_param('ii', $id_usuario, $id_usuario);
if($stmt->execute()){
	$stmt->bind_result($contaProjetos);
	$stmt->fetch();
} else{
	echo 'Ocorreu um ao recuperar os projetos';
}

$stmt->close();

if($contaProjetos <= 0){
	echo false;
}

$stmt = $link->prepare("SELECT id_intermediario FROM intermediario where (id_pfusu = ? OR id_pjusu = ?)");
$stmt->bind_param('ii', $id_usuario, $id_usuario);
if($stmt->execute()){
	$resultSet = $stmt->get_result();
	$resultado = $resultSet->fetch_all();
} else{
	echo 'Ocorreu um erro ao recuperar os intermediarios';
}

$indiceProjeto[0] = $resultado; 

$stmt->close();

for($i = 0; $i < $contaProjetos; $i++){
	$stmt = $link->prepare('SELECT nome_cliente, preco_estabelecido, nome_projeto, data_entrega FROM projeto WHERE id_intermediario = ?');
	$stmt->bind_param('i', $indiceProjeto[0][$i]);
	if($stmt->execute()){
		$resultSet = $stmt->get_result();

		var_dump($resultSet);
		if ($resultSet->num_rows>0) {
			echo '1';
			while($row = $resultSet->fetch_assoc()){
				var_dump($row);
			}
		}
	}else{
		echo 'Ocorreu um erro ao recuperar os projetos';
	}
}

/*'<div class="row">
				<div class="col-md-12">
				<h3>'.$row['nome_projeto'].'</h3>
				</div>
				</div>
				<div class="row">
				<div class="col-md-12">
				<img class="img-projetos" src="img/hog.jpg">
				<div class="info-proj">
				Nome do cliente: '.$row['nome_cliente'].'<br>
				Preço Estabelecido: R$'.$row['preco_estabelecido'].'<br>
				Data de entrega: '.$row['data_entrega'].'<br>
				</div>
				<button class="btn button-hp">Atualizar</button>
				</div>
				</div>';*/
?>