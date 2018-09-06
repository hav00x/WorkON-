<?php

$erro_cpf = isset($_GET['erro_cpf']) ? $_GET['erro_cpf'] : 0;
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
$erro_email_diferente = isset($_GET['erro_emaildif']) ? $_GET['erro_emaildif'] : 0;
$erro_senha_diferente = isset($_GET['erro_senhadif']) ? $_GET['erro_senhadif'] : 0;
$erro_campo_vazio = isset($_GET['erro_camvazio']) ? $_GET['erro_camvazio'] : 0;
$erro_numero_errado = isset($_GET['erro_numerrado']) ? $_GET['erro_numerrado'] : 0;
$erro_cpf_errado = isset($_GET['erro_cpferrado']) ? $_GET['erro_cpferrado'] : 0;
$erro_senha_insegura = isset($_GET['erro_senhainseg']) ? $_GET['erro_senhainseg'] : 0;
$erro_email_invalido = isset($_GET['erro_emailinval']) ? $_GET['erro_emailinval'] : 0;
$erro_imagem_grande = isset($_GET['erro_imggrande']) ? $_GET['erro_imggrande'] : 0;
$erro_foto = isset($_GET['erro_foto']) ? $_GET['erro_foto'] : 0;

?>

<!DOCTYPE html>
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


  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
      $(document).ready(function(){
        var erro_email = '<?= $erro_email ?>';
        var erro_cpf = '<?= $erro_cpf ?>';
        var erro_senha_diferente = '<?= $erro_senha_diferente ?>';
        var erro_email_diferente = '<?= $erro_email_diferente ?>';
        var erro_campo_vazio = '<?= $erro_campo_vazio ?>'
        var erro_numero_errado = '<?= $erro_numero_errado ?>';
        var erro_cpf_errado = '<?= $erro_cpf_errado ?>';
        var erro_senha_insegura = '<?= $erro_senha_insegura ?>';
        var erro_email_invalido = '<?= $erro_email_invalido ?>';
        var erro_imagem_grande = '<?= $erro_imagem_grande ?>';
        var erro_foto = '<?= $erro_foto ?>';

        //tratativa de erros do usuário

        if(erro_email == 1){
          $('#modalErro .modal-body p').append("- Esse email já está em uso<br>");
          $('#modalErro').modal('show');
        }
        if(erro_cpf == 1){
          $('#modalErro .modal-body p').append("- Esse cpf já está em uso<br>");
          $('#modalErro').modal('show');
        }
        if (erro_senha_diferente == 1){
          $('#modalErro .modal-body p').append("- Coloque as senhas iguais<br>");
          $('#modalErro').modal('show');
        }

        if(erro_email_diferente == 1){
          $('#modalErro .modal-body p').append("- Coloque os emails iguais<br>");
          $('#modalErro').modal('show');
        }

        if(erro_campo_vazio == 1){
          $('#modalErro .modal-body p').append("- Preencha todos os campos");
          $('#modalErro').modal('show');
        }

        if(erro_numero_errado == 1){
          $('#modalErro .modal-body p').append("- Preencha os números de telefone corretamente<br>");
          $('#modalErro').modal('show');
        }

        if(erro_cpf_errado == 1){
          $('#modalErro .modal-body p').append("- Preencha o cpf corretamente<br>");
          $('#modalErro').modal('show');
        }

        if(erro_senha_insegura == 1){
          $('#modalErro .modal-body p').append("- A senha deve ter pelo menos 8 dígitos<br>");
          $('#modalErro').modal('show');
        }

        if(erro_email_invalido == 1){
          $('#modalErro .modal-body p').append("- Digite um email válido<br>");
          $('#modalErro').modal('show');
        }

        if(erro_imagem_grande == 1){
          $('#modalErro .modal-body p').append("- Coloque uma imagem com menos de 2mb<br>");
          $('#modalErro').modal('show');
        }

        if(erro_foto == 1){
          $('#modalErro .modal-body p').append("- Houve algum erro com sua imagem<br>");
          $('#modalErro').modal('show');
        }
      });

    </script>

  </head>
  <body class="pag-cadastro">

    <?php 
    include('templates/navbar.php');
    ?>

    <div id="modalErro" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="margin: 0 auto;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Erro</h4>
          </div>
          <div class="modal-body">
            <p></p>
            <span class="modspan"><br>Os campos com * são opcionais</span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="container cadastro-upper">
      <h2 style="text-align: center; margin-bottom: 40px;">Pessoa Física</h2>
    </div>

    <div class="container cadastro-lower">
      <!-- Multistep Form -->
      <form action="cadastrarpf_bd.php" class="regform" method="post">
        <!-- Progress Bar -->
        <div class="row">
          <div class="col-md-12 table cada-status">
            <ul style="text-align: center;">
              <li class="active1 list">Dados Pessoais</li>
              <li class="list">Dados Comerciais</li>
              <li class="list">Foto</li>
            </ul>
          </div>
        </div>
        <!-- Fieldsets -->
        <fieldset id="first">
          <div class="row">
            <div class="col-md-5 col-md-offset-1">
              <label for="email-cliente">Email</label>
              <input type="text" class="text_field" id="email-cliente" name="email" placeholder="Digite seu email (ele será seu login)">
              <label for="senha">Senha</label>
              <input type="password" class="text_field" id="senha" name="senha" placeholder="Senha com no mínimo 8 caractéres">
            </div>
            <div class="col-md-5">
              <label for="conf-email">Confirme o email</label>
              <input type="text" class="text_field" id="conf-email" name="confirma-email" placeholder="Repita o email">
              <label for="conf-senha">Confirme sua senha</label>
              <input type="password" class="text_field" id="conf-senha" name="confirma-senha" placeholder="Repita a senha">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-md-offset-1 col-half-margin">
              <label for="nome">Nome</label>
              <input type="text" id="nome" class="text_field" name="nome">
              <label for="tel">Telefone fixo *</label>
              <input class="text_field" id="tel" type="tel" name="tel-fixo" maxlength="10">
            </div>
            <div class="col-md-3 col-half-margin">
              <label for="sobrenome">Sobrenome</label>
              <input type="text" id="sobrenome" class="text_field" name="sobrenome">
              <label for="cel">Telefone celular</label>
              <input class="text_field" id="cel" type="tel" name="tel-cel" maxlength="11">
            </div>
            <div class="col-md-3">
              <label for="cpf">CPF</label>
              <input class="text_field" id="cpf" type="text" name="cpf" maxlength="11">
              <label for="telcom">Telefone comercial *</label>
              <input class="text_field" id="telcom" type="tel" name="tel-com" maxlength="11">
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 col-md-offset-1">
              <label for="cep">Cep</label>
              <input class="text_field" name="cep" type="text" id="cep" value="" size="10" maxlength="9" />      
              <label for="cidade">Cidade</label>
              <input class="text_field" name="cidade" type="text" id="cidade" size="40" readonly="readonly"/>
            </div>
            <div class="col-md-5">
              <label for="bairro">Bairro</label>
              <input class="text_field" name="bairro" type="text" id="bairro" size="40" readonly="readonly"/>
              <label for="uf">Estado</label>
              <input class="text_field" name="uf" type="text" id="uf" size="2" readonly="readonly"/>
              <input class="next_btn btn-alinha-direita button -regular" name="next" type="button" value="Próximo">
            </div>
          </div>
        </fieldset>
        <fieldset>
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <label for="segmento">Qual é o segmento do seu negócio?</label>
              <input type="text" id="segmento" class="text_field" placeholder="ex: restaurante, loja de roupas, petshop, etc." name="res-negocio">
            </div>
          </div>
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h4>Redes sociais do seu comércio</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-md-offset-1 col-half-margin">
              <label for="fb">Facebook *</label>
              <input class="text_field" id="fb" type="text" name="facebook">
            </div>
            <div class="col-md-3 col-half-margin">
              <label for="insta">Instagram *</label>
              <input class="text_field" id="insta" type="text" name="instagram">
            </div>
            <div class="col-md-3">
              <label for="site">Site *</label>
              <input class="text_field" id="site" type="text" name="site1">
            </div>     
          </div>
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <label for="descri">Faça um breve resumo sobre você e seu negócio</label>
              <textarea id="descri" placeholder="Isso ajuda o desenvolvedor a entender mais as suas necessidades" maxlength="254" class="text_field" name="descricao"></textarea>
              <input class="next_btn btn-alinha-direita button -regular" name="next" type="button" value="Próximo">
              <input class="pre_btn btn-alinha-direita button -regular" name="previous" type="button" value="Anterior">
            </div>
          </div>
        </fieldset>
        <fieldset>
          <div class="row">
            <div class="central col-md-10 col-md-offset-1">
              <label for="perfil">Foto de Perfil</label>
              <input type="file" name="Filedata" id="imgInp"><br>
              <input type="text" name="arquivo" id="arquivo" style="display: none;">
              <img class="img-responsive img-cadastro" id="blah" src="img/nenhumafoto.jpeg" alt="Sua imagem">
              <br>
              <input class="submit_btn btn-alinha-direita button -regular" type="submit" value="Concluir">
              <input class="pre_btn btn-alinha-direita button -regular" type="button" value="Anterior">
            </div>
          </div>
        </fieldset>
      </form>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/script1.js?ver=1"></script>
  </body>
  </html>