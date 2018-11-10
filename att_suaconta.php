<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$nomeusu = isset($_POST['nome']) ? $_POST['nome'] : '';
$nome2usu = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$celusu = isset($_POST['tel-cel']) ? $_POST['tel-cel'] : 0;
$fixousu = isset($_POST['fixo']) ? $_POST['fixo'] : 0;
$comercialusu = isset($_POST['comercial']) ? $_POST['comercial'] : 0;
$descriusu = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$fbusu = isset($_POST['facebook']) ? $_POST['facebook'] : '';
$instausu = isset($_POST['instagram']) ? $_POST['instagram'] : '';
$siteusu = isset($_POST['site1']) ? $_POST['site1'] : '';
$segmentousu = isset($_POST['segmento']) ? $_POST['segmento'] : '';
$campo_vazio = false;
$num_errado = false;
$imagem_grande = false;
$erro_foto = false;
$retorno = array();

if(is_null($_SESSION['id_fusuario'])){
	$idusu = $_SESSION['id_jusuario'];
	$tabela = 1;
} else{
	$idusu = $_SESSION['id_fusuario'];
	$tabela = 2;
}

if (empty($nomeusu) || empty($celusu) || empty($descriusu)) {
	$campo_vazio = true;
}

if(strlen($celusu) != 11){
	$num_errado = true;
} elseif(!is_numeric($celusu)){
	$num_errado = true;
}

if(!empty($comercialusu) && strlen($comercialusu) != 11){
	$num_errado = true;
}elseif(!empty($comercialusu) && !is_numeric($comercialusu)){
	$num_errado = true;
}
if(!empty($fixousu) && strlen($fixousu) != 10){
	$num_errado = true;
}elseif(!empty($fixousu) && !is_numeric($fixo)){
	$num_errado = true;
}

if($_FILES['Filedata']['size'] == 0){
	if($tabela === 1){
		$stmt = $link->prepare('SELECT * FROM usuariopj WHERE id_pjusu=?');
		$stmt->bind_param('i', $idusu);
		if($stmt->execute()){

			$resultP = $stmt->get_result();
			$rowP = $resultP->fetch_assoc();
			$stmt->close();
			$caminho_imagem = $rowP['foto'];
			
		} else{
			echo 'Não foi possível a conexão com o banco de dados';
			die();
		}

	} else if($tabela === 2){
		$stmt = $link->prepare('SELECT * FROM usuariopf WHERE id_pfusu=?');

		$stmt->bind_param('i', $idusu);
		if($stmt->execute()){

			$resultP = $stmt->get_result();
			$rowP = $resultP->fetch_assoc();
			$stmt->close();
			$caminho_imagem = $rowP['foto'];

		} else{
			echo 'Não foi possível a conexão com o banco de dados';
			die();
		}
	}
} else{
		//verifica se os campos estão do jeito desejado e envia erros para a página caso contrário
	$RA = Trim( stripslashes( $_POST[ 'arquivo' ] ) ); 
	//Filedata é a variável que o flex envia com o arquivo para upload

	$arquivo = $_FILES['Filedata'];

	// Pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = 'up-perfil/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'svg');

// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

	// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['Filedata']['error'] != 0) {
	$erro_foto = true;
} else{
// Caso script chegue a este ponto, não houve erro com o processo de  upload  e o PHP pode continuar

// Faz a verificação da extensão do arquivo
	$arquivo = $_FILES['Filedata']['name'];
	$extensao = substr($arquivo,-4);

// Faz a verificação do tamanho do arquivo enviado
	if ($_UP['tamanho'] < $_FILES['Filedata']['size']) {
		echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
		$imagem_grande = true;
	}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
	else {
		$nome_final = date("d.m.Y-H.i.s").'_'.$RA;
		$caminho_imagem = "up-perfil/".$nome_final;

// Depois verifica se é possível mover o arquivo para a pasta escolhida
		if (move_uploaded_file($_FILES['Filedata']['tmp_name'], $_UP['pasta'] . $nome_final)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
			echo "Seu arquivo foi enviado com sucesso";
		} else {
// Não foi possível fazer o upload. Algum problema com a pasta
			echo "Não foi possível enviar o seu arquivo";
		}
	}
}
}

if($num_errado || $campo_vazio || $imagem_grande || $erro_foto){

	$retorno = '';

	if($campo_vazio){
		$retorno.= 'campo_vazio=1&';
	}
	if($num_errado){
		$retorno.= 'num_errado=1&';
	}
	if($imagem_grande){
		$retorno.= 'img_grande=1&';
	}
	if($erro_foto){
		$retorno.= 'erro_foto=1&';
	}

	header('Location: sua_conta.php?'.$retorno);
	die();
}

if($tabela === 1){	

	$stmt = $link->prepare('UPDATE usuariopj SET nomefant=?, razaosoci=?, cel=?, fixo=?, comercial=?, descr=?, facebook=?, instagram=?, site=?, segmento=?, foto=? WHERE id_pjusu=?');
	$stmt->bind_param('ssiiissssssi', $nomeusu, $nome2usu, $celusu, $fixousu, $comercialusu, $descriusu, $fbusu, $instausu, $siteusu, $segmentousu, $caminho_imagem, $idusu);
	if($stmt->execute()){
		header('Location: sua_conta.php?sucesso=1');
		die();
	} else{
		echo "Erro ao atualizar o perfil";
		die();
	}

	$stmt->close();

} else if($tabela === 2){

	$stmt = $link->prepare('UPDATE usuariopf SET nome=?, sobrenome=?, cel=?, fixo=?, comercial=?, descr=?, facebook=?, instagram=?, site=?, segmento=?, foto=? WHERE id_pfusu=?');
	$stmt->bind_param('ssiiissssssi', $nomeusu, $nome2usu, $celusu, $fixousu, $comercialusu, $descriusu, $fbusu, $instausu, $siteusu, $segmentousu, $caminho_imagem, $idusu);
	if($stmt->execute()){
		header('Location: sua_conta.php?sucesso=1');
		die();
	} else{
		echo "Erro ao atualizar o perfil";
		die();
	}

	$stmt->close();

}

?>