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
  <link href="css/estilo.css?ver=29" rel="stylesheet">
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
      <div class="row formatarow" id="mensagem-ok"></div>
      <div class="row formatarow" id="sessao-mensagens">

      </div>
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
              <div class="row formatarow">
                <div class="col-md-4">
                  <label for="nomecli">Nome do Cliente/Empresa</label>
                  <input type="text" class="text_field" id="nomeclif" name="nomeclif" readonly>
                  <input type="text" class="text_field hide" id="nomecli" name="nomecli" readonly>
                </div>
                <div class="col-md-4">
                  <label for="tipopro">Tipo de Projeto</label>
                  <input type="text" class="text_field" id="tipopro" name="tipopro">
                </div>
                <div class="col-md-4">
                  <label for="emailclif">Email do Cliente</label>
                  <input type="text" class="text_field" id="emailclif" name="emailclif" readonly>
                  <input type="text" class="text_field hide" id="emailcli" name="emailcli" readonly>
                </div>

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
                    <input type="text" id="email-ped" name="email-ped" readonly>
                  </div>
                  <div class="col-md-4">
                    <label>Telefone 1:</label> <br>
                    <input type="text" id="cel-ped" name="cel-ped" readonly>
                  </div>
                  <div class="col-md-4">
                    <label>Telefone 2:</label> <br>
                    <input type="text" id="comercial-ped" name="comercial-ped" readonly>
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

  <script src="js/script1.js?ver=10"></script>
</body>
</html>