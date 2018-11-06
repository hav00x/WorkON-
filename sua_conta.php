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
					<h1>Sua Conta</h1>
						<p>Aqui você pode atualizar os seus dados de cadastro</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<img src="img/aa.png" class="img-responsive img-thumbnail"><br><br>

					  <input type="file" name="Filedata" id="imgInp"><br>
				</div>
				<div class="col-md-8">
					 <label for="nome">Nome</label>
              <input type="text" id="nome" class="text_field" name="nome">
				 <label for="cel">Telefone celular</label>
              <input class="text_field" id="cel" type="tel" name="tel-cel" maxlength="11">
               <label for="descri">Descrição</label>
               <textarea id="descri" placeholder="Isso ajuda o cliente a entender mais sobre você e o que você tem a oferecer" maxlength="254" class="text_field" name="descricao"></textarea>
				</div>

			</div>
			<div class="row">
				<div class="col-md-4">
                <label for="fb">Facebook *</label>
                <input class="text_field" id="fb" type="text" name="facebook">
              </div>
              <div class="col-md-4">
                <label for="insta">Instagram *</label>
                <input class="text_field" id="insta" type="text" name="instagram">
              </div>
              <div class="col-md-4">
                <label for="site">Site *</label>
                <input class="text_field" id="site" type="text" name="site1">
              </div>
			</div>

			<div class="row">
				<div class="col-md-12">
				<button class="btn btn-block">Salvar alterações</button>		
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