<?php
include("incs/topo.php");
?>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Nova Postagem</h3>
        <form action="processa-postagem.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Texto</label>
                <textarea name="texto" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto (opcional)</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Visibilidade</label>
                <select name="publico" class="form-select">
                    <option value="público">Público</option>
                    <option value="privado">Privado</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Postar</button>
        </form>
    </div>
</div>
<?php
include("incs/footer.php");
?>