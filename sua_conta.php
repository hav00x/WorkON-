<?php

session_start();

if(!isset($_SESSION['email'])){
	header('Location: index.php?acessoinval=1&');
}

$num_errado = isset($_GET['num_errado']) ? $_GET['num_errado'] : 0;
$campo_vazio = isset($_GET['campo_vazio']) ? $_GET['campo_vazio'] : 0;
$img_grande = isset($_GET['img_grande']) ? $_GET['img_grande'] : 0;
$erro_foto = isset($_GET['erro_foto']) ? $_GET['erro_foto'] : 0;
$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;

?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>WORKON! | Sua Conta</title>
	<link rel="icon" href="imagens/favicon.png">

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/estilo.css?ver=2" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

	<script src="bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			var num_errado = '<?= $num_errado ?>';
			var campo_vazio = '<?= $campo_vazio ?>';
			var img_grande = '<?= $img_grande ?>';
			var erro_foto = '<?= $erro_foto ?>';
			var sucesso = '<?= $sucesso ?>';

			if(num_errado == 1 || campo_vazio == 1 || img_grande == 1 || erro_foto == 1){

				$('#modalErroSuaConta .modal-body p').remove();

				if(num_errado == 1){
					$('#modalErroSuaConta .modal-body').append('<p>Preencha o número de telefone corretamente</p>');
					$('#modalErroSuaConta').modal('show');
				}

				if(campo_vazio == 1){
					$('#modalErroSuaConta .modal-body').append('<p>Preencha os campos corretamente</p>');
					$('#modalErroSuaConta').modal('show');
				}

				if(img_grande == 1){
					$('#modalErroSuaConta .modal-body').append('<p>Imagem muito grande, por favor use uma imagem de 2mb ou menos</p>');
					$('#modalErroSuaConta').modal('show');
				}

				if(erro_foto == 1){
					$('#modalErroSuaConta .modal-body').append('<p>Ocorreu algum erro com sua imagem</p>');
					$('#modalErroSuaConta').modal('show');
				}
			}

			if(sucesso == 1){
				$('#status-suaconta').removeClass('hide');
				setTimeout(function(){
					$('#status-suaconta').addClass('hide');
				}, 10000);
			}
		});
		
	</script>

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

	<div ID="content">

		<?php
		include('templates/navbarinterna.php');
		?>

		<div id="modalErroSuaConta" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content" style="margin: 0 auto;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Erro</h4>
					</div>
					<div class="modal-body">
						<p></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<div class="section" id="sua-conta">
			<div class="row">
				<div class="col-md-12" style="text-align: center; margin-bottom: 20px;">
					<h1>Sua Conta</h1>
					<p>Aqui você pode atualizar os seus dados de cadastro (campos com * são opcionais)</p>
					<p style="margin-top: 20px; color: red;" id="status-suaconta" class="hide">Sua conta foi atualizada com sucesso!</p>
				</div>
			</div>
			<form enctype="multipart/form-data" id="att-suaconta" method="post" action="att_suaconta.php">
				<div class="row">
					<div class="col-md-4 alinha-meio">	
						<input type="text" name="arquivo" id="arquivo" class="hide">
						<img class="img-responsive img-thumbnail" id="img-suaconta"><br><br>
						<input type="file" name="Filedata" id="imgInp"><br>
					</div>
					<div class="col-md-8">
						<label for="nome-suaconta">Nome</label>
						<input type="text" id="nome-suaconta" class="text_field" name="nome">
						<label for="sobrenome-suaconta">Sobrenome</label>
						<input class="text_field" id="sobrenome-suaconta" type="text" name="sobrenome">
						
						<label for="descri-suaconta">Descrição</label>
						<textarea id="descri-suaconta" placeholder="Isso ajuda o cliente a entender mais sobre você e o que você tem a oferecer" maxlength="254" class="text_field" name="descricao"></textarea>
					</div>

				</div>
				<div class="row">
					<div class="col-md-4">
						<label for="cel-suaconta">Telefone Celular</label>
						<input class="text_field" id="cel-suaconta" type="tel" name="tel-cel" maxlength="11">
					</div>
					<div class="col-md-4">
						<label for="fixo-suaconta">Telefone Fixo *</label>
						<input class="text_field" id="fixo-suaconta" type="tel" name="fixo" maxlength="10">
					</div>
					<div class="col-md-4">
						<label for="comercial-suaconta">Telefone Comercial *</label>
						<input class="text_field" id="comercial-suaconta" type="tel" name="comercial" maxlength="11">
					</div>

					<div class="col-md-4">
						<label for="insta-suaconta">Instagram *</label>
						<input class="text_field" id="insta-suaconta" type="text" name="instagram">
					</div>
					<div class="col-md-4">
						<label for="fb-suaconta">Facebook *</label>
						<input class="text_field" id="fb-suaconta" type="text" name="facebook">
					</div>
					<div class="col-md-4">
						<label for="site-suaconta">Site *</label>
						<input class="text_field" id="site-suaconta" type="text" name="site1">
					</div>

				</div>

				<div class="row">
					<div class="col-md-12">
						<label for="segmento">Qual é sua área de atuação?</label>
						<select id="segmento" name="segmento">

							<option value="Analista de Sistemas">Analista de Sistemas</option>
							<option value="Back-end Web">Back-end Web</option>
							<option value="Back-end Desktop">Back-end Desktop</option>
							<option value="Desenvolvedor de Aplicativos">Desenvolvedor de Aplicativos</option>
							<option value="Designer">Designer</option>
							<option value="Front-end Web">Front-end Web</option>
							<option value="Front-end Desktop">Front-end Desktop</option>
							<option value="Fullstack Web">Fullstack Web</option>
							<option value="Fullstack Desktop">Fullstack Desktop</option>
							<option value="Outro">Outro (Dê mais detalhes na descrição)</option>

						</select>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<button class="btn-block button -regular" id="attdadousu">Salvar alterações</button>
					</div>
				</div>
			</form>
		</div>

	</div>

	<!-- jQuery Custom Scroller CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$("#sidebar").mCustomScrollbar({
				theme: "minimal"
			});

			$('#sidebarCollapse').on('click', function () {
				$('#sidebar, #content, #btnMenu').toggleClass('active2');
				$('.collapse.in').toggleClass('in');
				$('a[aria-expanded=true]').attr('aria-expanded', 'false');
			});
		});
	</script>
	<script src="js/script1.js?ver=22"></script>
</body>
</html>