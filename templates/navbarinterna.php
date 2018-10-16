<!-- BARRA DE NAVEGAÇÃO -->
  <div class="container">
    <!-- header -->
    
  </div>
  <div class="section row">
      <div class="col-md-4">
        <h3 style="font-family: 'Alpha-Regular'">Bem vindo <?php
         if(isset($_SESSION['nome_fantasia'])){
          echo $_SESSION['nome_fantasia'];
         }else{
          echo $_SESSION['nome'];
         }
          ?> </h3>
      </div>

      <div class="col-md-offset-4 col-md-4">
         <a style="margin: 13px;" class="button-hp" href="sair.php">SAIR</a>
        </div>
    </div>