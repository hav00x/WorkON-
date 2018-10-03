<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WorkOn! | PERFIS</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/estilo.css?ver=11" rel="stylesheet">
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
				<form>
					<div class="form-group col-md-4">
						<label for="nomesearch">Nome</label>
						<input id="nomesearch" type="text" name="">
					</div>
					<div class="form-group col-md-4">
						<label for="produtosearch">Produto</label>
						<select class="form-group">
							<option>Site</option>
							<option>Software</option>
							<option>Aplicativo</option>
							<option>Outros</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="localizacaosearch">Localização</label>
						<input id="localizacaosearch" type="text" name="">
					</div>	
				</form>
			</div>


			<div class="container">
				
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
		</body>
		</html>