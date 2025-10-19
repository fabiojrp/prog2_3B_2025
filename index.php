<?php
include "incs/topo.php";

require_once "src/PostagemDAO.php";
$idLogado = $_SESSION['idusuario'];
$postagens = PostagemDAO::listarTimeline($idLogado);
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-4">Minha Timeline</h3>
        <a href="nova-postagem.php" class="btn btn-dark px-5">Postar</a>
    </div>

    <?php if ($postagens): ?>
    <?php foreach ($postagens as $p): ?>
    <div class="card mb-4 shadow-sm">
        <div class="card-body row">
            <!-- Cabeçalho da postagem -->
            <div class="col-8">

                <div class="d-flex align-items-center mb-3">
                    <img src="uploads/<?= $p['foto_usuario']?>" class="rounded-circle me-3" width="50" height="50"
                        style="object-fit: cover;">
                    <div>
                        <strong><?= htmlspecialchars($p['nome']) ?></strong><br>
                        <small class="text-muted"><?= date("d/m/Y H:i", strtotime($p['criado_em'])) ?></small>
                    </div>
                </div>

                <!-- Texto -->
                <p><?=$p['texto'] ?></p>
            </div>

            <div class="col-4">

                <!-- Foto da postagem -->
                <?php if ($p['foto']): ?>
                <img src="uploads/<?= $p['foto'] ?>" class="img-fluid rounded mt-2"
                    style="max-height: 200px; object-fit: cover;">
                <?php endif; ?>

                <!-- Badge de privacidade -->
                <span class="badge bg-<?= $p['publico'] ? 'success' : 'secondary' ?>">
                    <?= $p['publico'] ? 'Público' : 'Privado' ?>
                </span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <p class="text-muted">Nenhuma postagem encontrada.</p>
    <?php endif; ?>
</div>

<?php
include "incs/footer.php";
?>