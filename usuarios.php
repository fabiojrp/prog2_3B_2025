<?php
include "incs/topo.php";
?>
  <!-- Conteúdo Principal -->
  <main class="container my-5 w-75">
    <h3 class="text-center">Adicione seguidores!</h3>
    <form action="" class="w-75 mx-auto text-start row">
        <div class="mb-3 col-8">
            <label class="form-label">Nome do usuário</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome" required>
        </div>
        <div class="mb-3 col-4">
            <button type="submit" class="btn btn-dark btn-lg my-4">Buscar</button>    
        </div>
      <?php
        require_once "src/UsuarioDAO.php";

        if (!isset($_GET["nome"])) {
          $_GET["nome"] = "";
          $usuarios = [];
        }else{
          $usuarios = UsuarioDAO::buscarUsuarioParaSeguir($_GET["nome"], $_SESSION["idusuario"]);
        }
      


        foreach ($usuarios as $usuario) {
            ?>

            
        <p class="m-3"><?=$usuario['nome']?>
          <a href="seguir.php?idseguido=<?=$usuario['idusuario']?>" class="btn btn-success mx-3">
            Adicionar
          </a>
        </p>
        <?php
        }
        
        ?>
    </form>
  </main>

<?php
include "incs/footer.php";
?>