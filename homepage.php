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

  <title>WORKON! | PÁGINA INICIAL</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css?ver=7" rel="stylesheet">
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

    <!-- Page Content Holder -->
    <div id="content">
     <?php
     include('templates/navbarinterna.php');
     ?>

     <!--DIV PERFIL-->
     <div class="row section" id="div-perfil">
      <h1 id="homepage-title">Seu perfil</h1>
      <div class="col-md-4">
        <img src="img/eu-e-o-caminhao.jpg" class="img-responsive img-thumbnail" style="width: 100%;">
      </div>

      <div class="col-md-8 info-perfil" id="perfil-data">
        <div class="row">
          <div  class="col-md-12">
              <h3 id="header-homepage"><img src="img/infocard.png"> Sobre você</h3>
            </div>
        </div><!--fim row who-->
        <div class="row">

          <div class="col-md-4">
            <p>PJ/PF</p>
          </div>
          <div class="col-md-4">
          <span class="bulb"></span><p>NOME</p>
          </div>

          <div class="col-md-4">
            <p>Localização</p>
          </div>
        </div><!--fim row who-info-->

        <div class="row">
          <div class="col-md-12">
            <h3 id="header-homepage"><img src="img/werk.png"> O que você faz</h3>
          </div>
        </div><!-- fim row what-->

        <div class="row">
          <div class="col-md-12">
            <p>DESCRIÇÃOX</p>
          </div>
        </div><!--fim row descrição-->

        <div class="row">
          <div class="col-md-4">
            <p>FACEBOOK</p>
          </div>
          <div class="col-md-4">
            <p>INSTAGRAM</p>
          </div>
          <div  class="col-md-4">
            <p>SITE</p>
          </div>
        </div><!--fim row social media-->
      </div>






    </div><!--FIM PERFIL-->

    <div class="section">
     <div class="row">
      <div class="col-md-12">
       <h1 id="homepage-title">PROJETOS RECENTES</h1>
      </div>       
     </div>

    <div class="row">
    <div class="col-md-4" id="ficha-projeto">
      <h3>Projeto ódio</h3>
        <div class="row">
          <div class="col-md-12">
            <img id="img-projetos" src="img/hog.jpg">
            <div id="info-proj">
                Nome do cliente:<br>
                Preço Estabelecido:<br>
                Data de entrega:<br>
              </div>
              <button class="btn button-hp"">Atualizar</button>
            </div>
          </div>
        </div>
      </div>

    </div>


</div> <!-- FIM CONTENT -- >




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