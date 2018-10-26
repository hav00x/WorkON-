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
	<link href="css/estilo.css?=VER19" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

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

		<div class="section" id="sua-conta">
			<div class="row">
				<div class="col-md-12" style="text-align: center; margin-bottom: 20px;">
					<h1>Sua Conta</h3>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<label>Nome:</label><br>
					<strong style="border: 1px solid gray; padding: 5px;">Luiz Felipe</strong>
				</div>
				<div class="col-md-5">
					<label>Sobrenome:</label>
					<strong>Falchi Barreto</strong>
				</div>
			</div>
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

	<script src="bootstrap/js/bootstrap.min.js"></script>
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
</body>
</html>