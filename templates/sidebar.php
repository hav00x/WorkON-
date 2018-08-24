      <!-- Sidebar Holder -->
      <nav id="sidebar">
        <div class="sidebar-header">
            <img class="img-responsive img-logo-sidebar" src='img/navlogo.png'>
        </div>

        <ul class="list-unstyled components">
          <p>Qualquer coisa pq aqui vai codigo dps</p>
          <li class="home">
            <a href="homepage.php" id="home">Página Principal</a>
          </li>
          <li class="chat">
            <a href="chat.php" id="chat">Chat</a>
          </li>
          <li class="project">
            <a href="projetos.php" id="project">Projetos</a>
          </li>
          <li class="request">
            <a href="#pageSubMenu2" id="request" data-toggle="collapse" aria-expanded="false">Pedidos</a>
            <ul class="collapse list-unstyled" id="pageSubMenu2">
              <li><a href="pedidos.php">Recebidos</a></li>
              <li><a href="pedidos.php">Enviados</a></li>
            </ul>
          </li>
          <li class="payment">
            <a href="#pageSubMenu3" id="payment" data-toggle="collapse" aria-expanded="false">Pagamentos</a>
            <ul class="collapse list-unstyled" id="pageSubMenu3">
              <li><a href="pagamentos.php">A Receber</a></li>
              <li><a href="pagamentos.php">A Enviar</a></li>
            </ul>
          </li>
          <li class="definition">
            <a href="#pageSubMenu4" id="definition" data-toggle="collapse" aria-expanded="false">Definições</a>
            <ul class="collapse list-unstyled" id="pageSubMenu4">
              <li><a href="#">Sua Conta</a></li>
              <li><a href="#">Chat</a></li>
              <li><a href="#">Informações de Pagamento</a></li>
            </ul>
          </li>
        </ul>
        <div id="btnMenu">
        <button type="button" id="sidebarCollapse" class="btn navbar-btn img-responsive">
        <img class="img-responsive" src="img/001-back.png">
        </button>
        </div>
        </nav>