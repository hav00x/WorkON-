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

  <title>WORKON! | Página Inicial</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

  <!-- IE 9 ou menor -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <?php
    include('templates/sidebar.php');
    ?>

    <!-- Page Content Holder -->
    <div id="content">
     <?php
     include('templates/navbarinterna.php');
     ?>

     <!--DIV PERFIL-->
     <div class="row section" id="div-perfil">
      <div class="col-md-4">
        <img src="img/eu-e-o-caminhao.jpg" class="img-responsive" style="width: 300px;">
      </div>
      <div class="col-md-8 info-perfil">
        <!--INFO-PERFIL AINDA NÃO CRIADA E ESTILIZADA-->
        <div id="perfil-data">
          <h4>Nome:</h4>
          <h4>Perfil:</h4>
          <h4>Descrição:</h4>
          <h4>Site:</h4>
          <h4>Rede Social 1:</h4>
          <h4>Rede social 2:</h4>
        </div>
      </div>
    </div><!--FIM PERFIL-->

    <div class="row section" id="projetos">
     <div class="col-md-12">
      <h2>PROJETOS</h2>
    </div>
    <div class="col-md-4">
      <div id="div-projetos">
        <h4>Titulo:</h4>
        <p>Descrição:</p>
        <p>Cliente:</p>
        <p>Tipo:</p>
        <p>Data de entrega:</p>
        <button class="btn btn-details">Ver detalhes</button>
      </div>
    </div>
    <div class="col-md-4">
      <div id="div-projetos">
        <h4>Titulo:</h4>
        <p>Descrição:</p>
        <p>Cliente:</p>
        <p>Tipo:</p>
        <p>Data de entrega:</p>
        <button class="btn btn-details">Ver detalhes</button>
      </div>
    </div>
    <div class="col-md-4">
      <div id="div-projetos">
        <h4>Titulo:</h4>
        <p>Descrição:</p>
        <p>Cliente:</p>
        <p>Tipo:</p>
        <p>Data de entrega:</p>
        <button class="btn btn-details">Ver detalhes</button>
      </div>
    </div>  
  </div>
  <div class="row section" id="pedidos">
    <div class="col-md-12">
      <h2>PEDIDOS</h2>
    </div>
    <div class="col-md-4">
      <div class="div-pedidos">
        <h4>Pedido</h4>
        <p>Tipo:</p>
        <button class="btn btn-details">Ver detalhes</button>
      </div>
    </div>
    <div class="col-md-4">
      <div class="div-pedidos">
        <h4>Pedido</h4>
        <p>Tipo:</p>
        <button class="btn btn-details">Ver detalhes</button>
      </div>
    </div>
    <div class="col-md-4">
      <div class="div-pedidos">
        <h4>Pedido</h4>
        <p>Tipo:</p>
        <button class="btn btn-details">Ver detalhes</button>
      </div>
    </div>
  </div>

  <p style="font-size: 10px; text-align: center;">ROOT | sua plataforma de projetos - 2018</p>
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