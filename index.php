<?php 

$erro_login = isset($_GET['errologin']) ? $_GET['errologin'] : 0;
$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;

?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>WORKON!| Sua plataforma de projetos</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css?ver=30" rel="stylesheet">

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
        var sucesso = '<?= $sucesso ?>';
        if(erro_login == 1){
          $('#loginModal .modal-body p').html('Login e/ou senha incorretos');
          $('#loginModal .modal-body p').css({'color':'#00b300'});
          $('#loginModal').modal('show');
        }

        if(sucesso == 1){
          $('#loginModal .modal-body p').html('Seu cadastro foi concluído, faça o login');
          $('#loginModal .modal-body p').css({'color':'green'});
          $('#loginModal').modal('show');
        }
      });
    </script>
  </head>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <body class="indexback">
      <?php
      include('templates/navbar.php');
      ?>

      <div class="container">
        <div class="capa">
          <div class="row">
            <div class="col-md-6">
              <img class="img-responsive" src="img/CAPAAA.png">
              <div class="texto-capa">
                <h3 class="lead txt-capa">Sua plataforma de projetos</h3>
              </div>
            </div>
            <div class="col-md-6">
              <h1 id="h1-welcome">Bem vindo!</h1>
              <a href="#quem-somos" class="btn btn-lg btn-index" type="button"> o que é </a>
              <a href="#como-funciona" class="btn btn-lg btn-index" type="button"> como funciona </a>
              <a href="#contato" class="btn btn-lg btn-index"> contato </a>    
            </div>
          </div>
        </div>
        <!--capa-->

        <div id="quem-somos" class="break-out">
          <div class="row">
            <div class="col-md-6">
              <h1 id="header-index1">O que é o WorkOn!</h1>
              <p id="description">O WorkOn! é uma plataforma pensada para desenvolvedores e clientes e foi totalmente projetada para facilitar a contratação e comunicação durante todo o projeto, desde a elaboração ao produto final.</p>
              <p id="description">Você está pronto para fazer parte dessa experiência? Cadastre-se já!</p>
            </div>
            <div class="col-md-6">
              <img src="img/index2.jpeg" class="img-responsive img-thumbnail" >
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <img src="img/index3.jpg" class="img-responsive img-thumbnail">
            </div>
            <div class="col-md-6">
              <h1 id="header-index1">Descomplique e encante</h1>
              <p id="description">Acompanhe o projeto de uma maneira fácil e intuitiva, aqui no WorkOn! você consegue se comunicar da melhor forma possível!</p>
              <p id="description">Você está pronto para fazer parte dessa experiência? Cadastre-se já!</p>
            </div>
          </div>
        </div>
        <!--quem somos-->

        <div id="como-funciona">
          <div class="row">
            <div class="col-md-12">
              <h1 id="header-index2">Como funciona?</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="box">
                <img src="img/devico.png" class="img-cd img-responsive">
                <h4 class="h4index">Desenvolvedor</h4>
                <p class="pindex">Para você que desenvolve, aqui sua rotina de comunicação com o cliente fica bem mais fácil, você pode manter seu cliente informado sobre etapas e atividades implementadas através da plataforma de maneira intuitiva.  </p>
                <p class="pindex">Com o WorkOn! você pode:</p>
                <ul>
                  <li>Preencher seu currículo e receber propostas de projetos</li>
                  <li>Colocar as informações do projeto de maneira intuitiva para o usuário</li>
                  <li>Atualizar o projeto informando quais etapas foram concluidas</li>
                  <li>E muito mais!</li>
                </ul>
              </div>
            </div>
            <div class="col-md-5 col-md-offset-2" >
              <div class="box">
               <img src="img/userico.png" class="img-cd img-responsive">
               <h4 class="h4index">Clientes</h4>
               <p class="pindex">Para você que apenas quer um projeto, mas não entende as rotinas de desenvolvimento e os termos utilizados, essa plataforma tem o intuito de te ajudar a compreender de maneira simples as etapas feitas no seu projeto.</p>
               <p class="pindex">Com o WorkOn! você pode:</p>
               <ul>
                <li>Procurar desenvolvedores para fazer o seu projeto</li>
                <li>Acompanhar o andamento dos seus projetos</li>
                <li>Enviar feedbacks sobre o projeto para ajudar o desenvolvedor</li>
                <li>E muito mais!</li>
              </ul>  
            </div>
          </div>
        </div>
      </div>

      <div id="contato" class="break-out">
        <div class="row">
          <div class="col-md-12">
            <h3 id="header-index3">Contato</h3>
          </div>    
        </div>
        <div class="row">
          <form method="post" name="form">
            <div class="col-md-6">
              <div class="form-group">
                <label class="pindex">Nome</label>
                <input id="nome-homepage" type="text" name="" placeholder="Digite seu nome">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="pindex">E-mail</label>
                <input id="email-homepage" type="email" name="" placeholder="Digite seu e-mail">
              </div>
            </div>
          </form>
        </div>
        <div class="row">
          <form>
            <div class="col-md-12">
              <label class="pindex">Mensagem</label>
              <textarea id="msg-homepage" class="form-control" type="text" name="mensagem" placeholder="Digite sua mensagem"></textarea>
            </div>
          </form>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-index">Enviar</button>
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