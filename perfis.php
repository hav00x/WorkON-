<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WorkOn! | Perfis</title>
	  <!-- Bootstrap -->
  	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<link href="css/estilo.css?ver=8" rel="stylesheet">
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
    <div ID="content">
      <?php
      include('templates/navbarinterna.php');
      ?>
      <div class="section row">
        <div class="col-md-4">
          <h3>Pedido 1</h3>
          <div class="div-pedidos">
            <h4>Restaurante</h4>
            <p>Tipo: Site</p>
            <p>Solicitante: User1</p>
            <p>Data de entrega: 31/12/2018</p>
            <button class="btn btn-details">Enviar mensagem</button>
          </div>
        </div>
        <div class="col-md-4">
          <h3>Pedido 2</h3>
          <div class="div-pedidos">
            <h4>Mercado</h4>
            <p>Tipo: Software</p>
            <p>Solicitante: User2</p>
            <p>Data de entrega: 12/08/2018</p>
            <button class="btn btn-details">Enviar mensagem</button>
          </div>
        </div>
        <div class="col-md-4">
          <h3>Pedido 3</h3>
          <div class="div-pedidos">
            <h4>Tic-tac-toe</h4>
            <p>Tipo: Jogo</p>
            <p>Solicitante: User3</p>
            <p>Data de entrega: 16/09/2018</p>
            <button class="btn btn-details">Enviar mensagem</button>
          </div>
        </div>

        <div class=" sectionrow">
          <div class="col-md-4">
            <h3>Pedido 4</h3>
            <div class="div-pedidos">
              <h4>Loja de roupas</h4>
              <p>Tipo: Aplicativo</p>
              <p>Solicitante: User1</p>
              <p>Data de entrega: 31/12/2018</p>
              <button class="btn btn-details">Enviar mensagem</button>
            </div>
          </div>
          <div class="col-md-4">
            <h3>Pedido 5</h3>
            <div class="div-pedidos">
              <h4>Escola</h4>
              <p>Tipo: Site</p>
              <p>Solicitante: User2</p>
              <p>Data de entrega: 12/08/2018</p>
              <button class="btn btn-details">Enviar mensagem</button>
            </div>
          </div>
          <div class="col-md-4">
            <h3>Pedido 6</h3>
            <div class="div-pedidos">
              <h4>Hospital</h4>
              <p>Tipo: Software</p>
              <p>Solicitante: User3</p>
              <p>Data de entrega: 16/09/2018</p>
              <button class="btn btn-details">Enviar mensagem</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

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