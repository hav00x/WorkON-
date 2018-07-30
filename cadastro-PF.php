<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>root. | abcde</title>
  <link rel="icon" href="imagens/favicon.png">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css?$$REVISION$$" rel="stylesheet">

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

    <div class="container">
      <h2 style="text-align: center; margin-bottom: 40px;">Pessoa Física</h2>
    </div>

    <div class="container conn">
      <!-- Multistep Form -->
      <form action="" class="regform" method="get">
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
              <input type="text" class="text_field" id="email-cliente" name="email">
              <label for="senha">Senha</label>
              <input type="password" class="text_field" id="senha" name="senha">
            </div>
            <div class="col-md-5">
              <label for="conf-email">Confirme o email</label>
              <input type="text" class="text_field" id="conf-email" name="email-conf">
              <label for="conf-senha">Confirme sua senha</label>
              <input type="password" class="text_field" id="conf-senha" name="senha-conf">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-md-offset-1 col-half-margin">
              <label for="nome">Nome</label>
              <input type="text" id="nome" class="text_field" name="nome">
              <label for="tel">Telefone fixo</label>
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
              <input class="text_field" id="cpf" type="text" name="cpf">
              <label for="telcom">Telefone comercial</label>
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
              <input class="next_btn" name="next" type="button" value="Próximo" style="float: right; margin-right: 0;">
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
              <label for="fb">Facebook</label>
              <input class="text_field" id="fb" type="text" name="social-face">
            </div>
            <div class="col-md-3 col-half-margin">
              <label for="insta">Instagram</label>
              <input class="text_field" id="insta" type="text" name="social-insta">
            </div>
            <div class="col-md-3">
              <label for="site">Site</label>
              <input class="text_field" id="site" type="text" name="social-site">
            </div>     
          </div>
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <label for="descri">Faça um breve resumo sobre você e seu negócio</label>
              <textarea id="descri" placeholder="Isso ajuda o desenvolvedor a entender mais as suas necessidades" maxlength="254" class="text_field"></textarea>
              <input style="float: right; margin-right: 0;" class="next_btn" name="next" type="button" value="Próximo">
              <input style="float: right; margin-right: 0;" class="pre_btn" name="previous" type="button" value="Anterior">    
            </div>
          </div>
        </fieldset>
        <fieldset>
          <div class="row">
            <div class="central col-md-10 col-md-offset-1">
              <label for="perfil">Foto de Perfil</label>
              <input type='file' id="imgInp" /><br>
              <img style="border:1px solid black;" id="blah" src="#" alt="your image" />
              <br>
              <input class="pre_btn" type="button" value="Anterior">
              <input class="submit_btn" type="submit" value="Concluir">
            </div>
          </div>
        </fieldset>
      </form>
    </div>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/script1.js?$$REVISION$$"></script>
  <script src="js/form.js?$$REVISION$$"></script>
  <script src="js/cep.js"></script>
</body>
</html>