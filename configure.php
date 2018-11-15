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

  <title>WORKON! | Configurações </title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css?ver=10" rel="stylesheet">
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

     <div class="section">
       <div class="row formatarow">
         <div class="col-md-12">
           <h1 id="header-proj" class="lead">Atualização de projeto</h1>
         </div>
       </div>

       <div class="col-md-12">
         <h2 id="headergen"> GALERIA</h2>
       </div>

       <div class="row formatarow album">
         <div class="col-md-4">
           <img class="img-responsive img-circle" style="width: 300px;" src="img/hog.jpg">
         </div>
         <div class="col-md-4">
           <img class="img-responsive img-circle" style="width: 300px;" src="img/hog.jpg">
         </div>
         <div class="col-md-4">
          <img class="img-responsive img-circle" style="width: 300px;" src="img/hog.jpg">
        </div>
      </div>

      <div class="row">
       <div class="col-md-12">
         <h3 id="headergen">Informações gerais</h3>
         <h4 style="text-align: center;">Descrição do projeto</h4>
       </div>
     </div>

     <div class="row">
       <div class="col-md-12">
         <textarea style="height: 100px"></textarea>
       </div>
     </div>

     <div class="row">
       <div class="col-md-6">
        <label for="dataent">Data Entrega</label>
        <input type="date" class="text_field" id="dataent" min="<?=date('Y-m-d')?>" max="<?='2038-01-19'?>" name="dataterm">
      </div>

      <div class="col-md-6 input-icon">
        <label for="precoest">Preço Estabelecido</label>
        <input type="text" max="999999999" class="text_field" id="precoest" name="precoest">
        <i>R$</i>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h4>Etapas</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default" data-value="1">
            <div class="panel-heading" role="tab" id="heading1">
              <h4 class="panel-title">
                <div>
                  <a class="nome-etapa" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseZ1" aria-expanded="true" data-value="1" aria-controls="collapseZ1" id="nome-etapa1">Etapa #1</a>
                  <button type="button" id="edita-etapa1" class="btn-edicao edita-txt">
                    <img class="img-etapa-edicao" src="img/edit-file.png">
                  </button>
                  <input class="nomeetp hide" id="input-etapa1" type="text" name="nome_etapa[1]">
                </div>
              </h4>
            </div>
            <div id="collapseZ1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
              <div id='acordion1' class="acordion-st row">
                <div class="col-md-4">
                  <label data-value='1.1'>Atividade #1 </label>
                  <input type="text" name="campo[1][1]">
                </div>
                <button type="button" id="btnc1" class="btn-edicao add-passo" style="float: right;">
                  <img class="img-edicao" src="img/add-circular-button.png">
                </button>
                <button type="button" id="btnr1" class="btn-edicao rmv-passo" style="float: right;">
                  <img class="img-edicao" src="img/minus.png">
                </button>
              </div>
            </div>
          </div>

          <button type="button" class="button -regular add-etapa" style="float: right;">Mais etapas
          </button>
          <button type="button" class="button -regular rmv-etapa" style="float: right;">Menos etapas
          </button>

        </div>
      </div>
    </div>
  </div>

</div><!--fimcontent-->
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
<script src="js/script1.js?ver=5"></script>
</body>
</html>