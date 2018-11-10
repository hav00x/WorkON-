<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WorkOn! | Perfis</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/estilo.css?ver=18" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<!-- IE 9 ou menor -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="inside">

	<?php
	include('templates/sidebar.php');
	?>

	<div id="content"> 
		<?php
		include('templates/navbarinterna.php');
		?>
		<div class="section container">
			<h1 id="homepage-title">busca</h1>
			<form id="form-pesquisa">
				<div class="form-group col-md-4">
					<label for="nomesearch">Nome</label>
					<input id="nomesearch" type="text" name="nome-usu">
				</div>
				<div class="form-group col-md-4">
					<label for="produtosearch">Produto</label>
					<select class="form-group" name="tipo-produto">
						<option></option>
						<option value="Sites">Site</option>
						<option value="Softwares">Software</option>
						<option value="Aplicativos">Aplicativo</option>
						<option value="Outros">Outros</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="localizacaosearch">Localização</label>
					<select class="form-group" name="localizacao">
						<option></option>
						<option value="AC">AC</option>
						<option value="AL">AL</option>
						<option value="AP">AP</option>
						<option value="AM">AM</option>
						<option value="BA">BA</option>
						<option value="CE">CE</option>
						<option value="DF">DF</option>
						<option value="ES">ES</option>
						<option value="GO">GO</option>
						<option value="MA">MA</option>
						<option value="MT">MT</option>
						<option value="MS">MS</option>
						<option value="MG">MG</option>
						<option value="PA">PA</option>
						<option value="PB">PB</option>
						<option value="PR">PR</option>
						<option value="PE">PE</option>
						<option value="PI">PI</option>
						<option value="RJ">RJ</option>
						<option value="RN">RN</option>
						<option value="RS">RS</option>
						<option value="RO">RO</option>
						<option value="RR">RR</option>
						<option value="SC">SC</option>
						<option value="SP">SP</option>
						<option value="SE">SE</option>
						<option value="TO">TO</option>
					</select>
				</div>
				<div class="col-md-12"> 
					<button class="btn-block button -regular" id="pesquisar-devs">OK</button>
				</div>
			</form>	
		</div><!--fim SECTION -->
		<div class="section container hide" id="resultado-pesq">
			<div id="perfil-d" class="col-md-12">
			</div>
		</div>


		<div class="modal fade" id="detalheperf">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Detalhes do perfil</h4>
					</div> <!--header-->
					<div class="modal-body">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h2>Larissa</h2> 
								</div>	
							</div>

							<div class="row">
							<div class="col-md-12">
								<img class="img-thumbnail" style="width: 300px;" src="img/hog.jpg">
							</div>
							</div>

							<div class="row">	
							<div class="col-md-12">
								<h3>O que o dev faz:</h3>
								<p>AS VEZES CHORA NO BANHO PENSANDO SE ELE UM DIA VAI TER UMA CARREIRA DE SUCESSO E NAS HORAS VAGAS FAZ SITES PRA SENHORAS INGRATAS.</p>
							</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-6">
									<h4>ATUAÇÃO</h4>
								</div>
								<div class="col-md-6">
									<h4>Localização</h4>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<h4>facebook</h4>
								</div>
								<div class="col-md-4">
									<h4>INSTA</h4>
								</div>
								<div class="col-md-4">
									<h4>SITE</h4>
								</div>
							</div>
							<br>
							<div class="modal-footer">
								<button class="btn btn-lg">ENVIAR MENSAGEM</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--FIM CONTENT-->



	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- jQuery Custom Scroller CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$("#sidebar").mCustomScrollbar({
				theme: "minimal"
			})

			$('#sidebarCollapse').on('click', function () {
				$('#sidebar, #content, #btnMenu').toggleClass('active2');
				$('.collapse.in').toggleClass('in');
				$('a[aria-expanded=true]').attr('aria-expanded', 'false');
			});
		});
	</script>
	<script src="js/script1.js?ver=3"></script>
</body>
</html>