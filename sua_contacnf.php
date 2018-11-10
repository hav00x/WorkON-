<?php

session_start();

if(!isset($_SESSION['email'])){
	header('Location: index.php?acessoinval=1&');
}

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
	<link href="css/estilo.css?ver=4" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

	<script src="bootstrap/js/bootstrap.min.js"></script>

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

		<div id="modalErroSuaContaPriv" class="modal fade" tabindex="-1" role="dialog">
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
					<h1>Definições Privados</h1>
					<p>Aqui você pode atualizar os seus dados privados</p>
					<p style="margin-top: 20px; color: red;" id="status-senha" class="hide">Sua senha foi atualizada com sucesso!</p>
					<p style="margin-top: 20px; color: red;" id="status-email" class="hide">Seu email foi atualizado com sucesso!</p>
				</div>
			</div>
			<div class="row">
				<h3 class="alinha-meio">O que deseja mudar?</h3>
				<div class="col-md-4 col-md-offset-1 alinha-meio">
					<input type="radio" id="checkemail" class="radiopriv" name="choice" value="1"> Email
				</div>
				<div class="col-md-4 col-md-offset-2 alinha-meio">
					<input type="radio" id="checksenha" class="radiopriv" name="choice" value="2"> Senha
				</div>
				<div id="divemail" class="hide col-md-6 col-md-offset-3">
					<form id="formemail" action="att_priv.php" method="post">
						<label for="emailantigo">Digite seu email antigo</label>
						<input type="text" id="emailantigo" name="emailantigo">
						<label for="emailnovo">Digite seu email novo</label>
						<input type="text" id="emailnovo" name="emailnovo">
						<label for="emailconfirma">Confirme seu email novo</label>
						<input type="text" id="emailconfirma" name="emailconfirma">
						<button class="btn-block button -regular" id="attemail">Salvar alterações</button>
					</form>
				</div>
				<div id="divsenha" class="hide col-md-6 col-md-offset-3">
					<form id="formpass" action="att_priv.php" method="post">
						<label for="senhaantiga">Digite sua senha antiga</label>
						<input type="password" id="senhaantiga" name="senhaantiga">
						<label for="senhanova">Digite sua senha nova</label>
						<input type="password" id="senhanova" name="senhanova">
						<label for="senhaconfirma">Confirme sua senha nova</label>
						<input type="password" id="senhaconfirma" name="senhaconfirma">
						<button class="btn-block button -regular" id="attsenha">Salvar alterações</button>
					</form>
				</div>
			</div>
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