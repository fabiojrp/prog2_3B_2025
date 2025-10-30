<?php
include "incs/topo.php";
?>

<!-- Conteúdo Principal -->
<main class="container my-5 w-50">
    <h3 class="display-4 my-5">Meus amigos (seguidos)</h3>

    <?php
        require_once "src/SeguidoDAO.php";
        $amigos = SeguidoDAO::listarSeguidos($_SESSION['idusuario']);
        foreach ($amigos as $usuario) {            
    ?>
    <p class="fs-3">
        <a href="perfil.php?idusuario=<?=$usuario['idusuario']?>" class="text-decoration-none">
            <img src="uploads/<?=$usuario['foto']?>" style="width:50px; height:50px; border-radius:50%;" alt="">
            <?= $usuario['nome'] ?>
        </a>
    </p>
    <?php
        }
    ?>


</main>

<?php
include "incs/footer.php";
?>