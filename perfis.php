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
	<link href="css/estilo.css?ver=17" rel="stylesheet">
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
					<input id="localizacaosearch" type="text" name="localizacao">
				</div>	
				<button class="btn btn-block" id="pesquisar-devs">OK</button>
			</form>	
		</div><!--fim SECTION -->
		<div class="section container hide" id="resultado-pesq">
			<div id="perfil-d" class="col-md-12">

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
	<script src="js/script1.js?ver=2"></script>
</body>
</html>