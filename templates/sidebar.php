      <!-- Sidebar Holder -->
      <nav id="sidebar">
        <div class="sidebar-header">
          <a href="homepage.php">
            <img class="img-responsive img-logo-sidebar" src='img/navlogo.png'>
          </a>
        </div>

        <ul class="list-unstyled components">
          <p id="local-atual">Você está em:
           <?php
           $url1 = explode('/', $_SERVER['REQUEST_URI']);
           $url2 = explode('.', $url1[2]);
           if($url2[0] == 'homepage'){
            $url2[0] = 'página principal';
           }
           echo ucfirst($url2[0]);
           ?>
           </p>
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
              <li><a href="perfis.php">Perfis</a></li>
              <li><a href="pedidos.php">Solicitações</a></li>
            </ul>
          </li>
          <li class="definition">
            <a href="#pageSubMenu4" id="definition" data-toggle="collapse" aria-expanded="false">Definições</a>
            <ul class="collapse list-unstyled" id="pageSubMenu4">
              <li><a href="#">Sua Conta</a></li>
            </ul>
          </li>
        </ul>
        <div id="btnMenu">
        <button type="button" id="sidebarCollapse" class="btn navbar-btn img-responsive">
        <img class="img-responsive" src="img/001-back.png">
        </button>
        </div>
        </nav>