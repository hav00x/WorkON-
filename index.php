<?php 

$erro_login = isset($_GET['errologin']) ? $_GET['errologin'] : 0;

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
  <link href="css/estilo.css?ver=17" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      var erro_login = '<?= $erro_login ?>';
      if(erro_login == 1){
        $('#loginModal .modal-body p').html('Login e/ou senha incorretos');
        $('#loginModal .modal-body p').css({'color':'red'});
        $('#loginModal').modal('show');
      }
    });
  </script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="indexback">
    <?php
    include('templates/navbar.php');
    ?>

   <div class="capa" >
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img class="img-responsive" src="img/CAPAAA.png">
          <div class="texto-capa">
            <h3 class="lead txt-capa">Sua plataforma de projetos</h3>
          </div>
        </div>
        <div class="col-md-6" style="">
          <h1 id="h1-welcome">Bem vindo!</h1>
          <button class="btn btn-lg btn-index" type="button"> quem somos </button>
          <button class="btn btn-lg btn-index" type="button"> como funciona </button>
          <button class="btn btn-lg btn-index"> contato </button>    
        </div>
      </div>
    </div>
  </div>
  <div id="conteudo">
    <div class="row">
      <div class="col-md-6">
        <div class="container-margin">
          <h1 id="header-index1">O que é o WorkOn!</h1>
          <p id="description">O WorkOn! é uma plataforma pensada para desenvolvedores e clientes e foi totalmente pensada para facilitar a contratação e comunicação durante todo o projeto, desde a elaboração ao produto final.</p>
        </div>
      </div>
      <div class="col-md-6" id="img-index">
        <img src="img/index2.jpeg" class="img-responsive img-thumbnail" >
      </div>
    </div>
  </div>

  <div class="container-margin">
    <div class="row">
      <div class="col-md-12">
        <h1 id="header-index2">Como funciona?</h1>
      </div>
      <div class="col-md-6">
      <div class="box">
        <h4 class="h4index"><img src="img/devico.png" class="img-cd"/> Desenvolvedores</h4>
        <p class="pindex">O WorkOn! foi pensado para facilitar sua rotina de comunicação com o cliente no decorrer do projeto, aqui você pode manter seu cliente informado sobre etapas e atividades implementadas através da plataforma de maneira simples e intuitiva.</p>
        <p class="pindex">Com o WorkOn! você pode:</p>
        <ul>
          <li>Preencher seu currículo e receber propostas de projetos</li>
          <li>Colocar as informações do projeto de maneira fácil e intuitiva para o usuário</li>
          <li>Atualizar o projeto informando quais etapas foram concluidas</li>
          <li>Manter contato com o cliente através da plataforma</li>
          <li>E muito mais!</li>
        </ul>
      </div>
      </div>
      <div class="col-md-6">
        <div class="box">
            <h4 class="h4index"><img src="img/userico.png" class="img-cd"> Clientes</h4>
            <p class="pindex">Para você que apenas quer um projeto, mas não entende as rotinas de desenvolvimento e os termos utilizados, essa plataforma tem o intuito de te ajudar a compreender de maneira simples as etapas feitas no seu projeto.</p>
            <p class="pindex">Com o WorkOn! você pode:</p>
            <ul>
              <li>Procurar desenvolvedores para fazer o seu projeto</li>
              <li>Receber os relatórios de etapas e atividades concluídas</li>
              <li>Enviar feedbacks sobre o projeto para ajudar o desenvolverdor</li>
              <li>Conversar com os desenvolvedores atrvés da plataforma</li>
              <li>E muito mais!</li>
            </ul>  
        </div>
      </div>
    </div>
  </div>


  <?php 
  include('templates/footer.php');
  ?>

  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/script1.js?ver=1"></script>

</body>
</html>