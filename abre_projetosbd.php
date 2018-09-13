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

			if($check == 0){
				echo json_encode($rowP);
			}
			
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

					if($check == 1){
						echo "<div class='panel panel-default'>
						<div class='panel-heading' role='tab' id='heading".$rowE['ordem_etapa']."upd'>
						<h4 class='panel-title'>
						<div>
						<a class='nome-etapa' role='button' data-toggle='collapse' data-parent='#accordionupd' href='#collapseupdZ".$rowE['ordem_etapa']."' aria-expanded='false' data-value='1' aria-controls='collapseupdZ".$rowE['ordem_etapa']."' id='nome-etapa".$rowE['ordem_etapa']."upd'>".$rowE['etapa']."</a>
						<button type='button' id='edita-etapa".$rowE['ordem_etapa']."upd' class='btn-edicao edita-txt'>
						<img class='img-etapa-edicao' src='img/edit-file.png'>
						</button>
						<input class='nomeetp' id='input-etapa".$rowE['ordem_etapa']."upd' type='text' name='nome_etapa[".$rowE['ordem_etapa']."]' style='display: none;'>
						</div>
						</h4>
						</div>
						<div id='collapseupdZ".$rowE['ordem_etapa']."' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading".$rowE['ordem_etapa']."'>
						<div id='acordion".$rowE['ordem_etapa']."upd' class='acordion-st row'>
						<div class='col-md-4'>

						<button type='button' id='btnc".$rowE['ordem_etapa']."upd' class='btn-edicao add-passo' style='float: right;'>
						<img class='img-edicao' src='img/add-circular-button.png'>
						</button>
						<button type='button' id='btnr".$rowE['ordem_etapa']."upd' class='btn-edicao rmv-passo' style='float: right;'>
						<img class='img-edicao' src='img/minus.png'>
						</button>
						</div>
						</div>
						</div>
						</div>";
					}
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
                      			$arrayAtividade[$j][$i] = "<label data-value='".$rowA['id_etapa'].".".$rowA['ordem_passo']."'>".$rowA['passo']."</label>
                      			<input type='text' id='ordem".$rowA['ordem_passo']."' name='campoupd[".$rowA['id_etapa']."][".$rowA['ordem_passo']."]'>";
                      			$j++;
                      		}			

                      	} else{
                      		echo "Erro ao recuperar os passos";
                      	}          
                      }
                      
                      echo json_encode($arrayAtividade);
                  }	
                  $stmt->close();

              }
          }
      }
  }

  ?>