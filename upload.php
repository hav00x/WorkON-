<?php

$RA = Trim( stripslashes( $_POST[ 'arquivo' ] ) ); 
	//Filedata é a variável que o flex envia com o arquivo para upload
$arquivo = $_FILES['Filedata'];
	// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'uploads/';

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
		die("Não foi possível fazer o upload, erro:<br />" .
			$_UP['erros'][$_FILES['Filedata']['error']]);
			exit; // Para a execução do script
		}

	// Caso script chegue a este ponto, não houve erro com o processo de  upload  e o PHP pode continuar

	// Faz a verificação da extensão do arquivo
	//$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
		$arquivo = $_FILES['Filedata']['name'];
		$extensao  = substr($arquivo,-4);
		
	// Faz a verificação do tamanho do arquivo enviado
		if ($_UP['tamanho'] < $_FILES['Filedata']['size']) {
			echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
		}

	// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
		else {
			$nome_final = date("d.m.Y-H.i.s").'_'.$RA.".$extensao";

			// Depois verifica se é possível mover o arquivo para a pasta escolhida
			if (move_uploaded_file($_FILES['Filedata']['tmp_name'], $_UP['pasta'] . $nome_final)) {
			// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
				echo "<script>
				alert('Seu arquivo foi enviado com sucesso');
				location.href = 'index.html';
				</script>";
			//echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '"> Clique aqui para acessar o arquivo</a>';
			} else {
			// Não foi possível fazer o upload.Algum problema com a pasta
				echo "<script>
				alert('Não foi possível enviar o seu arquivo.');
				location.href = 'index.html';
				</script>";
			}

		}
		?>