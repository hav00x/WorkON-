<?php

session_start();

if(!isset($_SESSION['email'])){
  header('Location: index.php?acessoinval=1&');
}
if($_SESSION['clidev'] === 1){
  header('Location: homepage.php?acessoinval=1&');
}

$erro_vazio = isset($_GET['erro_vazio']) ? $_GET['erro_vazio'] : 0;
$data_errada = isset($_GET['erro_data']) ? $_GET['erro_data'] : 0;
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>WORKON! | Projetos</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css?ver=11" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function(){
     var erro_vazio = '<?= $erro_vazio ?>';
     var erro_data = '<?= $data_errada ?>';

     if(erro_vazio == 1){
      $('#modalErroProj .modal-body').append('<p>Preencha todos os campos</p>');
      $('#modalErroProj').modal('show');
    }

    if(erro_data == 1){
      $('#modalErroProj .modal-body').append('<p>Data de início não pode vir depois da entrega</p>');
      $('#modalErroProj').modal('show');
    }
    
  });
</script>

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

     <div class="section" id="corpo-proj">
      <div class="row formatarow">
        <div class="col-md-4 headerpag">
          <h1 id="header-proj" class="lead">Projetos</h1>
        </div>
        <div class="col-md-4 divcriaproj">
          <button type="button" id="criaproj" class="button -regular  button-hp" data-target="#modalCadastro" data-toggle="modal" href="#modalCadastro">Novo Projeto</button>
        </div>
      </div><!--fimformatarow-->

      <div class="row formatarow" id="ficha-projeto">

      </div>
      <div id="navega-pag" class="alinha-meio">
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <li id="anterior">
              <a id="primeira-pag" href="#corpo-proj" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>

            <li>
              <a id="ultima-pag" href="#corpo-proj" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>

    </div><!--section-->

    <div id="modalErroProj" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="margin: 0 auto;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Erro</h4>
          </div>
          <div class="modal-body">
            <p></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class='modal fade' id='modalEdit' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <!-- Modal Edição Projetos -->
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <form id="atualiza-projetos" method='post'>
            <div class='modal-header' style='margin-left: 20px; padding-bottom: 0;'>
              <h3 class='modal-title'>
                <div>
                  <span id='nome-projetoupd'></span>
                  <button style='display: inline-block; margin-bottom: 10px;' type='button' class='btn-edicao edita-projeto'>
                    <img class='img-edicao' src='img/edit-file.png'>
                  </button>
                  <input id='nomeprojupd' class="hide" type='text' name='nome_projetoupd'>
                </div>
              </h3>
            </div>

            <div class='modal-body'>
              <div class='col-left'>
                <label for='nomecli'>Nome do Cliente/Empresa</label>
                <input type='text' class='text_field' id='nomecliupd' name='nomecliupd'>
              </div>
              <div class='col-right'>
                <label for='tipopro'>Tipo de Projeto</label>
                <input type='text' class='text_field' id='tipoproupd' name='tipoproupd'>
              </div>
              <div class='col-cent'>
                <label for='descri'>Descrição do Projeto</label>
                <textarea id='descriupd' maxlength='254' class='text_field descri' name='descriproupd'></textarea>
              </div>
              <div class='col-left'>
                <label for='dataini'>Data Início</label>
                <input type='date' class='text_field' id='datainiupd' min='1980-01-01' max='2038-01-19' name='datainiupd'>
              </div>
              <div class='col-right'>
                <label for='dataent'>Data Entrega</label>
                <input type='date' class='text_field' id='dataentupd' min='date('Y-m-d')' max='2038-01-19' name='datatermupd'>
              </div>
              <div class='col-md-offset-4 col-md-4 input-icon'>
                <label for='precoest'>Preço Estabelecido</label>
                <input type='text' max='999999999' class='text_field' id='precoestupd' name='precoestupd'><i>R$</i>
              </div>
              <div class='col-md-12'>
                <h3>O que vai ser feito?</h3>
                <p>Nesta seção, você deve informar tudo o que irá ser feito no projeto. Essas informações podem ser separadas por etapas para ajudar o cliente a saber o que irá ser feito e em que ordem será executado.</p>
              </div>
              <div class='col-md-12'>
                <div class='panel-group' id='accordionupd' role='tablist' aria-multiselectable='true'>

                  <!-- etapas -->

                </div>  
              </div>
              <div id="divalerta" class="col-md-12 hide divalerta">
                <h3>Confirme a exclusão do projeto</h3>
                <button type='button' id="btn-cancelar" class='button -regular'>Cancelar</button>
                <button type='button' id="btn-excluiproj" class='button -regular'>Excluir</button>
              </div>
            </div>

            <div class='modal-footer' style='clear: both;'>
              <div style="position: absolute; left: 3%; bottom: 6%;">
                <input type="checkbox" id="andamento" name="andamento" value="1"><span> O projeto ainda está em andamento?</span>
              </div>
              <input type="text" class="hide" name="atualizando" id="atualizando">
              <button type='button' id='modal_edit_close' class='button -regular' data-dismiss='modal'>Voltar</button>
              <button type='button' id="btn-atencao" class='button -regular'>Excluir</button>
              <button type='submit' id="btn-attproj" class='submit-projatt button -regular'>Atualizar</button>
            </div>
          </form>
        </div>
      </div>
      <!-- Fim Modal -->
    </div>

    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <!-- Modal Cadastro Projetos -->
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="formcadastro" method="post">
            <div class="modal-header" style="margin-left: 20px; padding-bottom: 0;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 class="modal-title">
                <div>

                  <span id="nome-projeto">Novo Projeto</span>
                  <button style="display: inline-block; margin-bottom: 10px;" type="button" class="edita-projeto btn-edicao">
                    <img class="img-edicao" src="img/edit-file.png">
                  </button>
                  <input id="nomeproj" type="text" name="nome_projeto" class="hide">
                </div>
              </h3>
            </div>

            <div class="modal-body">
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

            <div class="modal-footer" style="clear: both;">
              <button type="button" id="modal-close" class="button -regular" data-dismiss="modal">Voltar</button>
              <button type="submit" id="btn-enviaproj" class="submit-proj button -regular">Criar</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- Fim Modal -->


   <!-- Modal Mensagens -->
      <div class="modal fade" id="modalChat">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4>Mensagem</h4>
            </div> <!--fim modal-header-->
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  
                </div>
              </div>
            </div><!--fim modal-body-->
            <div class="modal-footer">
              <p>Escreva sua mensagem abaixo:</p>
              <textarea style="height: 30%"></textarea>
              <button class="btn button-hp btn-block">Enviar</button>
            </div>
          </div>
        
        </div>
      </div>

    </div><!--fim content-->

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
  <script src="js/script1.js?ver=18"></script>

</body>
</html>