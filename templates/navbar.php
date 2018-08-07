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
        <span style="position: absolute; bottom: 33%;">ROOT</span>
      </a>
    </div>
    <!-- navbar -->
    <div class="collapse navbar-collapse" id="barra-navegacao">
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="#">Quem somos</a></li>
        <li><a data-target="#loginModal" class="loginM" data-toggle="modal" href="#loginModal">Entrar</a>
          <li><a href="cadastro-choice.php">Cadastrar</a></li>
        </ul>
      </div>
    </div><!-- /container -->
  </nav><!-- /nav -->

  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title">Login</h3>
        </div>
        <div class="modal-body">
          <div>
            <form>
              <label for="email">E-mail</label>
              <input type="text" id="email-login" name="">
            </form>
            <form>
              <label for="senha">Senha</label>
              <input type="password" id="senha-login" name="">
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="button -regular" data-dismiss="modal">Voltar</button>
          <button type="button" class="button -regular">Entrar</button>
        </div>
      </div>
    </div>
  </div><!-- Fim Modal -->