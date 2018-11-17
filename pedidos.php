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

  <title>WORKON! | Pedidos</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css?ver=28" rel="stylesheet">
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

    <div class="section" id="corpo-proj">
      <div class="row formatarow">
        <div class="col-md-4 headerpag">
          <h2 id="header-proj" class="lead">Pedido pendentes</h2>
          <p>Aqui você encontra todas as solicitações feitas a você</p>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="row formatarow" id="sessao-mensagens">

      </div>
    </div>


    <div class="modal fade" id="messagecli">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4>CONTATO</h4>
          </div> <!--header-->
          <div class="modal-body">
            <div class="row row-perf">
              <div class="col-md-12 ">
                <h3 id="nome-ped"></h3>
                <p id="mensagem-ped">Praesent dictum tempus dolor, sit amet tempus mi dapibus eu. Nullam sit amet risus nec odio auctor iaculis. Pellentesque vestibulum aliquam felis, non vulputate ex commodo non. Nulla in tempus justo, at facilisis ex. Nunc efficitur tortor non odio sodales, sit amet lobortis ligula ultrices. Mauris nec venenatis ipsum. Nunc semper leo nec tellus sollicitudin, eu elementum ante consequat.</p>
              </div>
            </div>

            <div class="row row-perf">  
              <div class="col-md-12">
                <h3>Você pode contatá-lo através dos seguintes meios:</h3>
                <div class="row">
                  <div class="col-md-4">
                    <label>E-mail:</label><br>
                    <input type="text" id="email-ped" name="email-ped">
                  </div>
                  <div class="col-md-4">
                    <label>Telefone 1:</label> <br>
                    <input type="text" id="cel-ped" name="cel-ped">
                  </div>
                  <div class="col-md-4">
                    <label>Telefone 2:</label> <br>
                    <input type="text" id="comercial-ped" name="comercial-ped">
                  </div>
                </div>    
              </div>
            </div>

            <div class="modal-footer">
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-success btn-block" id="btn-aceitaproj"><span class="glyphicon glyphicon-ok"></span> Aceitar</button>
                </div>
                <div class="col-md-6">
                  <button class="btn btn-danger btn-block" id="btn-recusaproj"><span class="glyphicon glyphicon-remove"></span> Recusar</button>
                </div>
              </div>
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
      })

      $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content, #btnMenu').toggleClass('active2');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>

  <script src="js/script1.js?ver=8"></script>
</body>
</html>