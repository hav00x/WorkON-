<?php

require_once('db.class.php');

$objdb = new db();
$link = $objdb->connect();
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$confirmaEmail = $_POST['confirma-email'];
$confirmaSenha = $_POST['confirma-senha'];
$nome = $_POST['nome'];
$fixo = $_POST['tel-fixo'];
$sobrenome = $_POST['sobrenome'];
$cel = $_POST['tel-cel'];
$cpf = $_POST['cpf'];
$comercial = $_POST['tel-com'];
$cidade = $_POST['cidade'];
$estado = $_POST['uf'];
$segmento = $_POST['res-negocio'];
$descricao = $_POST['descricao'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$cli_ou_dev = $_POST['choiceprof'];
$site = $_POST['site1'];
$email_existe = false;
$cpf_existe = false;
$senha_diferente = false;
$email_diferente = false;
$campo_vazio = false;
$num_errado = false;
$cpf_errado = false;
$senha_insegura = false;
$email_invalido = false;
$imagem_grande = false;
$erro_foto = false;

//verifica se os campos estão do jeito desejado e envia erros para a página caso contrário
if(empty($cli_ou_dev)){
	$campo_vazio = true;
}else if($cli_ou_dev == 1){
	if(empty($email) || empty($senha) || empty($nome) || empty($cel) || empty($sobrenome) || empty($cpf) || empty($cidade) || empty($estado)){
		$campo_vazio = true;
	}
} else if($cli_ou_dev == 2){
	if(empty($email) || empty($senha) || empty($nome) || empty($cel) || empty($sobrenome) || empty($cpf) || empty($cidade) || empty($estado) || empty($segmento) || empty($descricao)){
		$campo_vazio = true;
	}
}

if(strlen($cel) != 11){
	$num_errado = true;
} elseif(!is_numeric($cel)){
	$num_errado = true;
}

if(strlen($_POST['senha']) < 8){
	$senha_insegura = true;
}

if(!empty($comercial) && strlen($comercial) != 11){
	$num_errado = true;
}elseif(!empty($comercial) && !is_numeric($comercial)){
	$num_errado = true;
}

if(strlen($cpf) != 11){
	$cpf_errado = true;
}elseif(!is_numeric($cpf)){
	$cpf_errado = true;
}

if(!empty($fixo) && strlen($fixo) != 10){
	$num_errado = true;
}elseif(!empty($fixo) && !is_numeric($fixo)){
	$num_errado = true;
}

if($email != $confirmaEmail){
	$email_diferente = true;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$email_invalido = true;
}

if($_POST['senha'] != $confirmaSenha){
	$senha_diferente = true;
}

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
	$extensao  = substr($arquivo,-4);

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

$stmt = $link->prepare("SELECT cpf FROM usuariopf WHERE cpf = ?");
if ($stmt === false) {
	trigger_error($this->mysqli->error, E_USER_ERROR);
	return;
}
$stmt->bind_param("i", $cpf);

if($stmt->execute()){
	$stmt->bind_result($buscaCpf);
	while($stmt->fetch()){
		if(isset($buscaCpf)){
			$cpf_existe = true;
		}
		else{
			echo 'Erro ao executar a busca por usuario';
		}
	}
}
$stmt->close();

	//verifica se o email já existe no bd

$stmt = $link->prepare("SELECT email FROM usuariopf WHERE email = ? UNION SELECT email FROM usuariopj WHERE email = ?");
if ($stmt === false) {
	trigger_error($this->mysqli->error, E_USER_ERROR);
	return;
}
$stmt->bind_param("ss", $email, $email);
if($stmt->execute()){
	$stmt->bind_result($buscaEmail);
	while($stmt->fetch()){
		if(isset($buscaEmail)){
			$email_existe = true;
		}
	}
}else{
	echo 'Erro ao executar a busca por email';
}

$stmt->close();

if($cpf_existe || $email_existe || $email_diferente || $senha_diferente || $campo_vazio || $num_errado || $cpf_errado || $senha_insegura || $email_invalido || $imagem_grande || $erro_foto){

	$retorno_get = '';

	if($cpf_existe){
		$retorno_get.= "erro_cpf=1&"; 
	}

	if($email_existe){
		$retorno_get.= "erro_email=1&"; 
	}

	if($email_diferente){
		$retorno_get.="erro_emaildif=1&";
	}

	if($senha_diferente){
		$retorno_get.="erro_senhadif=1&";
	}

	if($campo_vazio){
		$retorno_get.="erro_camvazio=1&";
	}

	if($num_errado){
		$retorno_get.="erro_numerrado=1&";
	}

	if($cpf_errado){
		$retorno_get.="erro_cpferrado=1&";
	}

	if($senha_insegura){
		$retorno_get.="erro_senhainseg=1&";
	}

	if($email_invalido){
		$retorno_get.="erro_emailinval=1&";
	}

	if($imagem_grande){
		$retorno_get.="erro_imggrande=1&";
	}

	if($erro_foto){
		$retorno_get.="erro_foto=1&";
	}

	header('Location: cadastro-PF.php?'.$retorno_get);

	die();
}

$stmt = $link->prepare("INSERT INTO usuariopf(senha, nome, sobrenome, cpf, cel, descr, site, estado, cidade, email, fixo, comercial, segmento, facebook, instagram, foto, cli_ou_dev) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
	trigger_error($this->mysqli->error, E_USER_ERROR);
	return;
}

$stmt->bind_param("sssiisssssiissssi", $senha, $nome, $sobrenome, $cpf, $cel, $descricao, $site, $estado, $cidade, $email, $fixo, $comercial, $segmento, $facebook, $instagram, $caminho_imagem, $cli_ou_dev);

if($stmt->execute()){
	header("Location: index.php?sucesso=1");
}else{
	echo 'Erro ao cadastrar usuário';
}

$stmt->close();

?>