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
  <link href="css/estilo.css?ver=3" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

  <!-- IE 9 ou menor -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
      var count = 1;
      $(document).ready( function(){
        $('#edita-projeto').on('click', function(){
          $('#nome-projeto').attr('contenteditable', 'true');
          $('#nome-projeto').focus();
        });
        $('#nome-projeto').on('blur', function(){
          $('#nome-projeto').attr('contenteditable', 'false');
        });
        $('#nome-projeto, #nome-etapa').on('keydown', function(e){
          if(e.which === 13){
            e.preventDefault();//previne o usuario de quebrar linhas no nome do projeto
            return false;
          }
        });
        $('#edita-etapa').on('click', function(){
          $('#nome-etapa').attr('contenteditable', 'true');
          $('#nome-etapa').focus();
          $('#nome-etapa').attr('data-toggle', '');  
        });
        $('#nome-etapa').on('blur', function(){
          $('#nome-etapa').attr('contenteditable', 'false');
          $('#nome-etapa').attr('data-toggle', 'collapse');
        });
        $('#add-etapa').on('click', function(){
          count = count + 1;
          $('#accordion').append("<div class='panel panel-default'><div class='panel-heading' role='tab' id='heading"+count+"'> <h4 class='panel-title'> <div> <a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse"+count+"' aria-expanded='true' aria-controls='collapse"+count+"' id='nome-etapa'> <span>Etapa #"+count+"</span> </a> <button type='button' id='edita-etapa' class='btn-edicao'> <img class='img-etapa-edicao' src='img/edit-file.png'> </button> </div> </h4> </div> <div id='collapse"+count+"' class='panel-collapse collapsein' role='tabpanel' aria-labelledby='heading"+count+"'> <div class='acordion-strow'> <div class='col-md-4'> <label>Atividade #"+count+"</label> <input type='text'name=''> </div> </div> </div> </div>");
        });
      });
    </script>
  </head>
  <body>

    <?php
    include('templates/sidebar.php');
    ?>

    <!-- Page Content Holder -->
    <div id="content">
     <?php
     include('templates/navbarinterna.php');
     ?>
     <button type="button" style="float: right;" class="button -regular backcolr" data-target="#modalCadastro" data-toggle="modal" href="#modalCadastro"> + Novo Projeto</button>
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
              <div class="col-md-6 projdiv">
                <h2>Nome projeto</h2>
                <div class="subproj">
                  <p>Tipo:</p>
                  <p>Solicitante:</p>
                  <p>Data de entrega:</p>
                  <p>Progresso:</p>
                  <button class="btn btn-info">Atualizar</button>
                </div>
              </div>
              <div class="col-md-6 projdiv">
                <h2>Nome projeto</h2>
                <div class="subproj">
                  <p>Tipo:</p>
                  <p>Solicitante:</p>
                  <p>Data de entrega:</p>
                  <p>Progresso:</p>
                  <button class="btn btn-info">Atualizar</button>
                </div>
              </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="concluido">

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header" style="margin-left: 20px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title">
            <div>
              <span id="nome-projeto">Novo Projeto</span>
              <button style="display: inline-block;" type="button" id="edita-projeto" class="btn-edicao">
                <img class="img-edicao" src="img/edit-file.png">
              </button>
            </div>
          </h3>
        </div>

        <div class="modal-body">
          <form>
            <div class="col-left">
              <label for="nomecli">Nome do Cliente/Empresa</label>
              <input type="text" class="text_field" id="nomecli" name="">
            </div>
            <div class="col-right">
              <label for="tipopro">Tipo de Projeto</label>
              <input type="text" class="text_field" id="tipopro" name="">
            </div>
            <div class="col-cent">
              <label for="descri">Descrição do Projeto</label>
              <textarea id="descri" maxlength="254" class="text_field"></textarea>
            </div>
            <div class="col-left">
              <label for="dataini">Data Início</label>
              <input type="date" class="text_field" id="danaini" name="">
            </div>
            <div class="col-right">
              <label for="dataent">Data Entrega</label>
              <input type="date" class="text_field" id="dataent" name="">
            </div>
            <div class="col-md-12">
              <h3>O que vai ser feito?</h3>
              <p>Nesta seção, você deve informar tudo o que irá ser feito no projeto. Essas informações podem ser separadas por etapas para ajudar o cliente a saber o que irá ser feito e em que ordem será executado.</p>
            </div>
            <div class="col-md-12">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                      <div>
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="nome-etapa">
                          <span>Etapa #1</span>
                        </a>
                        <button type="button" id="edita-etapa" class="btn-edicao">
                          <img class="img-etapa-edicao" src="img/edit-file.png">
                        </button>
                      </div>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <form>
                      <div class="acordion-st row">
                        <div class="col-md-4">
                          <label>Atividade #1 </label>
                          <input type="text" name="">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Etapa #2
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <button type="button" class="button -regular" id="add-etapa" style="float: right;">Mais etapas
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer" style="clear: both;">
          <button type="button" class="button -regular" data-dismiss="modal">Voltar</button>
          <button type="button" class="button -regular">Criar</button>
        </div>

      </div>
    </div>
  </div><!-- Fim Modal -->

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