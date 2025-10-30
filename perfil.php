<?php
include "incs/topo.php";
?>

<!-- Conteúdo Principal -->
<main class="container text-center my-5 w-50">
    <h2 class="display-4 my-5">Perfil de usuário</h2>

    <?php
  require_once "src/UsuarioDAO.php";
  if (isset($_GET['idusuario'])) {
    $usuario = UsuarioDAO::buscarUsuarioId($_GET['idusuario']);
  ?>
    <p class="fs-3"><?= $usuario['nome'] ?></p>
    <p class="fs-3"><?= $usuario['email'] ?></p>

    <img src="uploads/<?=$usuario['foto']?>" style="width:150px; height:150px;" alt="">
    <?php

  }
  ?>

</main>

<?php
include "incs/footer.php";
?>