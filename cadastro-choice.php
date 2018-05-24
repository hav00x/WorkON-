<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>root. | abcde</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilo.css?$$REVISION$$">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
   <!-- BARRA DE NAVEGAÇÃO -->

   <?php
   include('templates/navbar.php');
   ?>

   <!-- Início do conteúdo da página-->
   <div >
     <p id="welcome-signin">CADASTRE-SE JÁ!</p>
   </div>
   <div class="container conn">
    <div class="row">
      <div class="col-md-12 cadaChoice">
        <div id="btn-profile">
          <div class="row">
            <div class="col-md-6">
              <img src="img/userico.png" class="img-responsive img-cd">
              <br>
              <p> Se você deseja usar o site como pessoa física, clique no botão abaixo </p>
              <a class="btn btn-warning btn-lg" href="cadastro-PF.php" role="button">Cadastrar</a>
            </div>
            <div class="col-md-6">
              <img src="img/multiuser.png" class="img-responsive img-cd">
              <br>
              <p>Se você quer usar o site como pessoa jurídica, clique no botão abaixo</p>
              <a class="btn btn-warning btn-lg" href="cadastro-PJ.php" role="button">Cadastrar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/script1.js?$$REVISION$$"></script>

</body>
</html>