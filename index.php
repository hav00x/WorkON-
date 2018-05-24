<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>root. | abcde</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/teste.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

   <?php
   include('templates/navbar.php');
   ?>

  <div class="capa" >
    <div class="container">
        <div class="texto-capa">
            <img src="img/capaa.png">
            <h3 class="lead txt-capa">Sua plataforma de projetos</h3>
          </div>
      </div>
  </div>

  <div class="main">
  <!-- Conteudos -->
    <section id="sobre">
      <div class="container">
        <div class="row">
          <div class="col-md-6">        
                <img src="img/untitled-6.gif" class="img-responsive img-thumbnail">    
     
          </div>
          <!-- sobre -->
          <div class="col-md-6">
          <h3 class="h3txt">O que é o root?</h3>
          <p class="ptxt">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam</p>
          </div>
        </div>
      </div>
    </section>
</div>

<section id="como-funciona">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="h3txt" style="color: black; text-align: center;"> COMO FUNCIONA?</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h4 class="ptxt"><img style="width: 10%; margin: 10px;" src="img/userico.png">Clientes</h4>
        <ul>
          <p style="text-align: center;">Aqui no ROOT você pode:</p>
          <li>Acompanhar o andamento de seus projetos;</li>
          <li>Enviar feedbacks ao desenvolvedor;</li>
          <li>Encontrar desenvolvedores;</li>
         </ul>
        </div>
          <div class="col-md-6">
            <h4><img style="width: 10%; margin: 10px;" src="img/devico.png">Desenvolvedor</h4>
            <p style="text-align: center;">Aqui no ROOT você pode:</p>
            <ul>
              <li>Atualizar o seu cliente sobre o andamento do projeto;</li>
              <li>Utilizar um chat e coletar feedback do seu cliente sem precisar utilizar redes socias pessoais;</li>
              <li>Disponibilizar o seu curriculo para recebimento de pedidos;</li>
            </ul>
          </div>
        </div>
             <br>
        <div class="row">     
          <div class="col-md-12">
            <p style="text-align: center; ">Oferecemos cadastros para pessoa física e jurídica, faça já o seu!</p>
             <a href="cadastro-choice.php" class="btn btn-cada">CADASTRE-SE</a>
            </div>
             </div>
  </div>
</section>

<section id="fale-conosco">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3 style="text-align: center;"> <img src="img/chat.png"> Fale conosco</h3>
      <p style="text-align: center;">Para dúvidas, sugestões e reclamações utilize o formulário abaixo:</p>
    </div>
  </div>
  <div class="row">
    <form method="post" name="form">
    <div class="col-md-6">
      <div class="form-group"> 
          <label for="nome">Nome</label>
          <input type="text" id="nome" class="text_field" name="">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="email-cliente">Email</label>
         <input type="text" class="text_field" id="email-cliente" name="">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <label for="descri">Mensagem:</label>
        <textarea id="mensagem" placeholder="Sua mensagem auqi. . ." maxlength="254" class="text_field"></textarea>
      <br>
      <button class="btn btn-cada" type="submit" name="submit" value="submit">Enviar</button>
    </div>
  </div>
    </form>
</div>
</section>
  <?php 
  include('templates/footer.php');
  ?>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/script1.js?$$REVISION$$"></script>

  </body>
  </html>