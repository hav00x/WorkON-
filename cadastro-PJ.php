<?php

$erro_cnpj = isset($_GET['erro_cnpj']) ? $_GET['erro_cnpj'] : 0;
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
$erro_email_diferente = isset($_GET['erro_emaildif']) ? $_GET['erro_emaildif'] : 0;
$erro_senha_diferente = isset($_GET['erro_senhadif']) ? $_GET['erro_senhadif'] : 0;
$erro_campo_vazio = isset($_GET['erro_camvazio']) ? $_GET['erro_camvazio'] : 0;

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>wORKON. | abcde</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css" rel="stylesheet">

  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
      $(document).ready(function()
      {
        var erro_email = '<?= $erro_email ?>';
        var erro_cnpj = '<?= $erro_cnpj ?>';
        var erro_senha_diferente = '<?= $erro_senha_diferente ?>';
        var erro_email_diferente = '<?= $erro_email_diferente ?>';
        var erro_campo_vazio = '<?= $erro_campo_vazio ?>'

        //se email/cnpj já estão cadastrados, o erro é mostrado
        if(erro_email == 1){
          $('#email').css({'background-color': '#fbc7ce'});
          $('#email').attr("placeholder", "Esse email já está em uso");
        }
         if(erro_cnpj == 1){
          $('#cnpj').css({'background-color': '#fbc7ce'});
          $('#cnpj').attr("placeholder", "Esse cnpj já está em uso");
        }
        if (erro_senha_diferente == 1){
          $('#senha').css({'background-color': '#fbc7ce'});
          $('#senha').attr("placeholder", "Coloque senhas iguais");
          $('#conf-senha').css({'background-color': '#fbc7ce'});
          $('#conf-senha').attr("placeholder", "Coloque senhas iguais");
        }

        if(erro_email_diferente == 1){
          $('#email').css({'background-color': '#fbc7ce'});
          $('#email').attr("placeholder", "Coloque emails iguais");
          $('#conf-email').css({'background-color': '#fbc7ce'});
          $('#conf-email').attr("placeholder", "Coloque emails iguais");
        }

        if(erro_campo_vazio == 1){
          $('#modalErro').modal('show');
        }
        
      });
    </script>

  </head>
  <body>

    <?php  
    include('templates/navbar.php');
    ?>

    <div id="modalErro" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Erro</h4>
          </div>
          <div class="modal-body">
            <p style="margin-left: 10px;">Preencha todos os campos<br>OBS: Todos os campos com * são opcionais</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="container">
      <h2 style="text-align: center; margin-bottom: 40px;">Pessoa Jurídica</h2>
    </div>

    <div class="container conn">
      <!-- Multistep Form -->
      <form action="cadastrarpj_bd.php" class="regform" method="post">
        <!-- Progress Bar -->
        <div class="row">
          <div class="col-md-12 table">
            <ul id="horizontal-list">
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
              <input type="email" class="text_field" id="email" name="email" placeholder="Digite seu email (ele será seu login)">
              <label for="senha">Senha</label>
              <input type="password" class="text_field" id="senha" name="senha" placeholder="Senha com no mínimo 8 caractéres">
            </div>
            <div class="col-md-5">
              <label for="conf-email">Confirme o email</label>
              <input type="email" class="text_field" id="conf-email" name="confirma-email" placeholder="Repita o email">
              <label for="conf-senha">Confirme sua senha</label>
              <input type="password" class="text_field" id="conf-senha" name="confirma-senha" placeholder="Repita a senha">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-md-offset-1 col-half-margin">
              <label for="nome">Razão Social</label>
              <input type="text" id="nome" class="text_field" name="razaos">
              <label for="tel">Telefone fixo *</label>
              <input class="text_field" id="tel" type="tel" name="tel-fixo" maxlength="10">
            </div>
            <div class="col-md-3 col-half-margin">
              <label for="sobrenome">Nome Fantasia</label>
              <input type="text" id="sobrenome" class="text_field" name="nomef">
              <label for="cel">Telefone celular</label>
              <input class="text_field" id="cel" type="tel" name="tel-cel" maxlength="11">
            </div>
            <div class="col-md-3">
              <label for="cpf">CNPJ</label>
              <input class="text_field" id="cnpj" type="text" name="cnpj">
              <label for="telcom">Telefone comercial *</label>
              <input class="text_field" id="telcom" type="tel" name="tel-com" maxlength="11">
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 col-md-offset-1">
              <label for="cep">Cep</label>
              <input class="text_field" name="cep" type="text" id="cep" value="" size="10" maxlength="9" />      
              <label for="cidade">Cidade</label>
              <input class="text_field" name="cidade" type="text" id="cidade" size="40" />
            </div>
            <div class="col-md-5">
              <label for="bairro">Bairro</label>
              <input class="text_field" name="bairro" type="text" id="bairro" size="40" />
              <label for="uf">Estado</label>
              <input class="text_field" name="uf" type="text" id="uf" size="2" />
              <input class="next_btn btn-alinha-direita" id="primeiro_next" name="next" type="button" value="Próximo">
            </div>
          </div>
        </fieldset>
        <fieldset id="second">
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
              <input class="next_btn btn-alinha-direita" id="segundo_next" name="next" type="button" value="Próximo">
              <input class="pre_btn btn-alinha-direita" name="previous" type="button" value="Anterior">    
            </div>
          </div>
        </fieldset>
        <fieldset>
          <div class="row">
            <div class="central col-md-10 col-md-offset-1">
              <label for="perfil">Foto de Perfil</label>
              <input type='file' id="imgInp" /><br>
              <img style="border:1px solid black; width: 500px; margin: 0 auto; display: block;" class="img-responsive" id="blah" src="img/nenhumafoto.jpeg" alt="Sua imagem">
              <br>
              <input class="submit_btn btn-alinha-direita" type="submit" value="Concluir">
              <input class="pre_btn btn-alinha-direita" type="button" value="Anterior">
            </div>
          </div>
        </fieldset>

      </form>

    </div>
  </div>

  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/script1.js"></script>
  <script src="js/form.js?ver=1"></script>
  <script src="js/cep.js"></script>
  
</body>
</html>