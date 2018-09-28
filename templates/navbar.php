  <!-- BARRA DE NAVEGAÇÃO -->
  <nav class="navbar navbar-custom">
    <div class="container">

      <!-- header -->
      <div class="navbar-header">

        <!-- botao toggle -->
        <button type="button" class="navbar-toggle collapsed"
        data-toggle="collapse" data-target="#barra-navegacao">
        <span class="sr-only">alternar navegação</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a href="index.php" class="navbar-brand" style="position: relative;">
        <span class="img-logo"></span>
      </a>
    </div>
    <!-- navbar -->
    <div class="collapse navbar-collapse" id="barra-navegacao">
      <ul class="nav navbar-nav navbar-right">
        <li><a data-target="#loginModal" class="loginM" data-toggle="modal" href="#loginModal">Entrar</a></li>
        <li class="divisor" role="separator"></li>
        <li><a data-toggle="modal" data-target="#cadastrar" href="#cadastrar">Cadastrar</a></li>
      </ul>
    </div>
  </div><!-- /container -->
</nav><!-- /nav -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title">Login</h3>
      </div>
      <form method="post" action="login_bd.php">
        <div class="modal-body">
          <div>
            <p></p>
            <label for="email">E-mail</label>
            <input type="text" id="email-login" name="email-login">
            <label for="senha">Senha</label>
            <input type="password" id="senha-login" name="senha-login">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="button -regular" data-dismiss="modal">Voltar</button>
          <button type="submit" class="button -regular">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- Fim Modal -->

<!-- modal reserva -->
<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">
   <div class="modal-content" role="document">   

    <!-- cabecalho -->
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">
        <span>&times;</span>
      </button>
      <h3 style="font-family: 'Abel'" class="modal-title">Cadastre-se</h3>
    </div>

    <!-- corpo -->
    <div class="modal-body" style="margin-bottom: 15px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 box-cadastro">
            <div id="btn-profile">
              <h2>PESSOA JÚRIDICA</h2>
              <img src="img/multiuser.png" class="img-responsive img-cd">
              <br>
              <p>Se você quer usar o site como pessoa jurídica, clique no botão abaixo</p>
              <a class="btn btn-warning btn-lg" href="cadastro-PJ.php" role="button">Cadastrar</a>
            </div>
          </div>
          <div class="col-md-5 box-cadastro">
            <div id="btn-profile">
              <h2>PESSOA FÍSICA</h2>
              <img src="img/userico.png" class="img-responsive img-cd">
              <br>
              <p> Se você deseja usar o site como pessoa física, clique no botão abaixo </p>
              <a class="btn btn-warning btn-lg" href="cadastro-PF.php" role="button">Cadastrar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div><!-- FIM MODAL -->