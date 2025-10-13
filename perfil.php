<?php
include "incs/topo.php";
?>

  <!-- Conteúdo Principal -->
  <main class="container text-center my-5 w-50">
    <h2 class="display-4 my-5">Perfil de usuário</h2>




    <?php
      require_once "src/UsuarioDAO.php";
      if (isset($_GET['idusuario'])){        
        $usuario = UsuarioDAO::buscarUsuarioId($_GET[$idusuario]);            
    ?>
    <p class="fs-3">Nome: <?=$usuario['nome']?></p>
    <p class="fs-3">Email: <?=$usuario['email']?></p>
    <p class="fs-3">Foto: Não tenho</p>
    <?php

      }
    ?>
    
  </main>

<?php
include "incs/footer.php";
?>