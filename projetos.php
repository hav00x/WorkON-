<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>root. | abcde</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css?=ver3123213333" rel="stylesheet">
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

    <!-- Page Content Holder -->
    <div id="content">
      <div class="section">
        <div class="row">
          <div class="col-md-6">
            <img style="width: 25px; margin: 5px;" src="img/notification.png">
          </div>
          <div class="col-md-6">
            <button type="button" style="float: right;" class="btn btn-info navbar-btn">
              <span class="glyphicon glyphicon-log-out"></span>
              <span>Sair</span>
            </button>
          </div>
        </div>
      </div>

      <div class="section">
        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-tabs edit-tabs">
              <li role="presentation" class="active tab-descri"><a href="#andamento" aria-controls="andamento" role="tab" data-toggle="tab">Em Andamento</a></li>
              <li role="presentation"><a href="#concluido" class="tab-descri" aria-controls="concluido" role="tab" data-toggle="tab">Concluído</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tab-content">

              <div role="tabpanel" class="tab-pane active" id="andamento">

                <div id="slide1" class="carousel slide tabcustom" data-ride="carousel">
                  <!-- Indicators -->
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <div class="col-md-4 col-md-offset-4">
                        <h2>Titulo</h2>
                        <p style="text-align: left;">Cliente:</p>
                        <img class="img-responsive imgholder" src="img/capa2.png">
                        <p>Descrição:</p>
                        <p>Tipo de projeto:</p>
                        <p>Data de início:</p>
                        <p>Data de entrega:</p>
                        <p>Preço Estabelecido:</p>
                        <p>Arquivos Anexados:</p>
                      </div>
                    </div>

                    <div class="item">
                      <div class="col-md-4 col-md-offset-4">
                        <h2>Titulo</h2>
                        <p style="text-align: left;">Cliente:</p>
                        <img class="img-responsive imgholder" src="img/capa2.png">
                        <p>Descrição:</p>
                        <p>Tipo de projeto:</p>
                        <p>Data de início:</p>
                        <p>Data de entrega:</p>
                        <p>Preço Estabelecido:</p>
                        <p>Arquivos Anexados:</p>
                      </div>
                    </div>

                    <div class="item">
                      <div class="col-md-4 col-md-offset-4">
                        <h2>Titulo</h2>
                        <p style="text-align: left;">Cliente:</p>
                        <img class="img-responsive imgholder" src="img/capa2.png">
                        <p>Descrição:</p>
                        <p>Tipo de projeto:</p>
                        <p>Data de início:</p>
                        <p>Data de entrega:</p>
                        <p>Preço Estabelecido:</p>
                        <p>Arquivos Anexados:</p>
                      </div>
                    </div>
                  </div>
                  <!-- Left and right controls -->
                  <a class="left carousel-control rmvback" href="#slide1" data-slide="prev">
                    <span style="color: black;" class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control rmvback" href="#slide1" data-slide="next">
                    <span style="color: black;" class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

              </div>

              <div role="tabpanel" class="tab-pane" id="concluido">

                <div id="slide2" class="carousel slide tabcustom" data-ride="carousel">
                  <!-- Indicators -->
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <div class="col-md-4 col-md-offset-4">
                        <h2>Titulo</h2>
                        <p style="text-align: left;">Cliente:</p>
                        <img class="img-responsive imgholder" src="img/capa2.png">
                        <p>Descrição:</p>
                        <p>Tipo de projeto:</p>
                        <p>Data de início:</p>
                        <p>Data de entrega:</p>
                        <p>Preço Estabelecido:</p>
                        <p>Arquivos Anexados:</p>
                      </div>
                    </div>

                    <div class="item">
                      <div class="col-md-4 col-md-offset-4">
                        <h2>Titulo</h2>
                        <p style="text-align: left;">Cliente:</p>
                        <img class="img-responsive imgholder" src="img/capa2.png">
                        <p>Descrição:</p>
                        <p>Tipo de projeto:</p>
                        <p>Data de início:</p>
                        <p>Data de entrega:</p>
                        <p>Preço Estabelecido:</p>
                        <p>Arquivos Anexados:</p>
                      </div>
                    </div>

                    <div class="item">
                      <div class="col-md-4 col-md-offset-4">
                        <h2>Titulo</h2>
                        <p style="text-align: left;">Cliente:</p>
                        <img class="img-responsive imgholder" src="img/capa2.png">
                        <p>Descrição:</p>
                        <p>Tipo de projeto:</p>
                        <p>Data de início:</p>
                        <p>Data de entrega:</p>
                        <p>Preço Estabelecido:</p>
                        <p>Arquivos Anexados:</p>
                      </div>
                    </div>
                  </div>
                  <!-- Left and right controls -->
                  <a class="left carousel-control rmvback" href="#slide2" data-slide="prev">
                    <span style="color: black;" class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control rmvback" href="#slide2" data-slide="next">
                    <span style="color: black;" class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

              </div>

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