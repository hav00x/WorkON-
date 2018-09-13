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

  <title>WORKON! | PROJETOS</title>
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

     <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="modal-title">
            <div>
             <span id="nome-projeto">Novo Projeto</span>
             <button style="display: inline-block; margin-bottom: 10px;" type="button" id="edita-projeto" class="btn-edicao">
              <img class="img-edicao" src="img/edit-file.png">
            </button>
            <input id="nomeproj" type="text" name="nome_projeto" style="display: none;">
          </div>
        </h3>
      </div>
    </div><!--fim row-->
    <div class="col-left">
      <label for="nomecli">Nome do Cliente/Empresa</label>
      <input type="text" class="text_field" id="nomecli" name="nomecli">
    </div>
    <div class="col-right">
      <label for="tipopro">Tipo de Projeto</label>
      <input type="text" class="text_field" id="tipopro" name="tipopro">
    </div>
    <div class="col-cent">
      <label for="descri">Descrição do Projeto</label>
      <textarea id="descri" maxlength="254" class="text_field descri" name="descripro"></textarea>
    </div>
    <div class="col-left">
      <label for="dataini">Data Início</label>
      <input type="date" class="text_field" id="dataini" min="<?='1980-01-01'?>" max="<?='2038-01-19'?>" name="dataini">
    </div>
    <div class="col-right">
      <label for="dataent">Data Entrega</label>
      <input type="date" class="text_field" id="dataent" min="<?=date('Y-m-d')?>" max="<?='2038-01-19'?>" name="dataterm">
    </div>
    <div class="col-md-offset-4 col-md-4 input-icon">
      <label for="precoest">Preço Estabelecido</label>
      <input type="text" max="999999999" class="text_field" id="precoest" name="precoest"><i>R$</i>
    </div>
    <div class="col-md-12">
      <h3>O que vai ser feito?</h3>
      <p>Nesta seção, você deve informar tudo o que irá ser feito no projeto. Essas informações podem ser separadas por etapas para ajudar o cliente a saber o que irá ser feito e em que ordem será executado.</p>
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
  <script src="js/script1.js?ver=4"></script>

</body>
</html>


