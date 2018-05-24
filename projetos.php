<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>root. | abcde</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css?" rel="stylesheet">
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
      <div class="section row">
        <div class="container">
          <div class="col-md-12">
            <div class="container">
              <div class="col-md-4">

              </div> 
              <div class="col-md-4">
                <img style="width: 25px; margin: 5px;" src="img/notification.png">
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-info navbar-btn">
                  <i class="glyphicon glyphicon-log-out"></i>
                  <span>Sair</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 section">
          <ul class="nav nav-tabs edit-tabs">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">Profile</a></li>
          </ul>
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