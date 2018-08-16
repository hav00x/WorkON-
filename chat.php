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

  <title>WORKON. | abcde</title>
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
  <body>

    <?php
    include('templates/sidebar.php');
    ?>
    <div ID="content">
      <div class="section row">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>CHAT</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <button class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span> Iniciar nova conversa</button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-trash"></span> Apagar conversa</button>
            </div>
          </div>
        </div>
      </div>
      <div class="section row">
      <div class="col-md-4">
        <h3>USER1</h3>
        <div class="div-pedidos">
        <img src="img/eu-e-o-caminhao.jpg" class="img-responsive img-circle" style="width: 20%; margin-right: auto; margin-left: auto;">
        <p style="text-align: center; margin-top: 2px;">Projeto: Site-Restaurante</p>
        <br>
       <p style="text-align: center;"> <button class="btn btn-details" type="button">
            Mensagens <span class="badge">4</span>
        </button> </p>
      </div>
      </div>
      <div class="col-md-4">
        <h3>USER2</h3>
        <div class="div-pedidos">
        <img src="img/kylo-ren.jpg" class="img-responsive img-circle" style="width: 20%; margin-right: auto; margin-left: auto;">
        <p style="text-align: center; margin-top: 2px;">Projeto: Software-Mercado</p>
        <br>
       <p style="text-align: center;"> <button class="btn btn-details" type="button">
            Mensagens <span class="badge">5</span>
        </button> </p>
      </div>
      </div>
      <div class="col-md-4">
        <h3>USER3</h3>
        <div class="div-pedidos">
        <img src="img/hog.jpg" class="img-responsive img-circle" style="width: 20%; margin-right: auto; margin-left: auto;">
        <p style="text-align: center; margin-top: 2px;">Projeto: Jogo-Tic-tac-toe</p>
        <br>
       <p style="text-align: center;"> <button class="btn btn-details" type="button">
            Mensagens <span class="badge">6</span>
        </button> </p>
      </div>
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