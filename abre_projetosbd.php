<?php

require_once('db.class.php');

session_start();

$objdb = new db();
$link = $objdb->connect();
$id_usuario = is_null($_SESSION['id_fusuario']) ? $_SESSION['id_jusuario'] : $_SESSION['id_fusuario'];
$id_projatt = $_POST['projatt'];
$nome_cliatt = $_POST['nomecliatt'];
$nome_projatt = $_POST['nomeprojatt'];
$dataatt = $_POST['dataentatt'];
$precoatt = $_POST['precoatt'];
$check = isset($_POST['check']) ? $_POST['check'] : 0;

$stmt = $link->prepare('SELECT nome_cliente, preco_estabelecido, nome_projeto, data_entrega FROM projeto WHERE id_projeto = ?');
$stmt->bind_param('i', $id_projatt);
if($stmt->execute()){
	$stmt->store_result();
	$stmt->bind_result($nome_cliente, $preco, $nome_projeto, $data_entrega);
	$stmt->fetch();
	if($nome_cliente == $nome_cliatt && $nome_projeto == $nome_projatt && $preco == $precoatt && $data_entrega == $dataatt){ //verifica se o usuário não mudou nada pelo devtool
		$stmt->free_result();
		$stmt->close();

		$stmt = $link->prepare('SELECT * FROM projeto WHERE id_projeto = ?'); //query para pegar o projeto
		$stmt->bind_param('i', $id_projatt);

		if($stmt->execute()){
			$resultP = $stmt->get_result();
			$rowP = $resultP->fetch_assoc();
			$stmt->close();

			echo '<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<!-- Modal Edição Projetos -->
			<div class="modal-dialog" role="document">
			<div class="modal-content">
			<form action="" method="post">
			<div class="modal-header" style="margin-left: 20px; padding-bottom: 0;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<h3 class="modal-title">
			<div>

			<span id="nome-projetoupd">'.$rowP['nome_projeto'].'</span>
			<button style="display: inline-block; margin-bottom: 10px;" type="button" id="edita-projeto" class="btn-edicao">
			<img class="img-edicao" src="img/edit-file.png">
			</button>
			<input id="nomeprojupd" type="text" name="nome_projetoupd" style="display: none;" value="'.$rowP['nome_projeto'].'">
			</div>
			</h3>
			</div>

			<div class="modal-body">
			<div class="col-left">
			<label for="nomecli">Nome do Cliente/Empresa</label>
			<input type="text" class="text_field" id="nomecliupd" name="nomecliupd" value="'.$rowP['nome_cliente'].'">
			</div>
			<div class="col-right">
			<label for="tipopro">Tipo de Projeto</label>
			<input type="text" class="text_field" id="tipoproupd" name="tipoproupd" value="'.$rowP['tipo_projeto'].'">
			</div>
			<div class="col-cent">
			<label for="descri">Descrição do Projeto</label>
			<textarea id="descriupd" maxlength="254" class="text_field" name="descriproupd">'.$rowP['descri_projeto'].'</textarea>
			</div>
			<div class="col-left">
			<label for="dataini">Data Início</label>
			<input type="date" class="text_field" id="datainiupd" min="1980-01-01" max="2038-01-19" name="datainiupd" value="'.$rowP['data_inicio'].'">
			</div>
			<div class="col-right">
			<label for="dataent">Data Entrega</label>
			<input type="date" class="text_field" id="dataentupd" min="date("Y-m-d")" max="2038-01-19" name="datatermupd" value="'.$rowP['data_entrega'].'">
			</div>
			<div class="col-md-offset-4 col-md-4 input-icon">
			<label for="precoest">Preço Estabelecido</label>
			<input type="text" max="999999999" class="text_field" id="precoestupd" name="precoestupd" value="'.$rowP['preco_estabelecido'].'"><i>R$</i>
			</div>
			<div class="col-md-12">
			<h3>O que vai ser feito?</h3>
			<p>Nesta seção, você deve informar tudo o que irá ser feito no projeto. Essas informações podem ser separadas por etapas para ajudar o cliente a saber o que irá ser feito e em que ordem será executado.</p>
			</div>

			</div>

			<div class="modal-footer" style="clear: both;">
			<button type="button" id="modal_edit_close" class="button -regular" data-dismiss="modal">Voltar</button>
			<button type="submit" class="button -regular">Criar</button>
			</div>
			</form>
			</div>
			</div>
			<!-- Fim Modal -->
			</div>';

			$stmt = $link->prepare('SELECT * FROM etapas WHERE id_projeto = ?'); //query para pegar as etapas do projeto
			$stmt->bind_param('i', $id_projatt);

			if($stmt->execute()){
				$resultE = $stmt->get_result();
				$i = 0;
				while($rowE = $resultE->fetch_assoc()){
					$arrayE['id_etapa'][$i] = $rowE['id_etapa'];
					$arrayE['etapa'][$i] = $rowE['etapa'];
					$arrayE['ordem_etapa'][$i] = $rowE['ordem_etapa'];
					$i++;
				}
				$stmt->close();
				$etapas_lenght = $i+1;

				for($i = 0; $i < $etapas_lenght; $i++){
					$stmt = $link->prepare('SELECT * FROM passos WHERE id_etapa = ?'); //query para pegar os passos de cada etapa
					$stmt->bind_param('i', $arrayE['id_etapa'][$i]);

					if($stmt->execute()){
						$resultA = $stmt->get_result();
						$j = 0;
						while($rowA = $resultA->fetch_assoc()){
							$arrayA['passo'][$j][$i] = $rowA['passo'];
							$arrayA['ordem_passo'][$j][$i] = $rowA['ordem_passo'];
							$arrayA['id_etapa'][$j][$i] = $rowA['id_etapa'];
							$j++;
						}						
					} else{
						echo "Erro ao recuperar os passos";
					}
				}

				$stmt->close();

			}
		}
	}
}

?>