<?php
    include "incs/valida-sessao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página Inicial</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Meu Projeto</a>      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo Principal -->
  <main class="container my-5 w-75">
    <h3 class="text-center">Adicione seguidores!</h3>
    <form action="" class="w-75 mx-auto text-start row">
        <div class="mb-3 col-8">
            <label class="form-label">Nome do usuário</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome" required>
        </div>
        <div class="mb-3 col-4">
            <button type="submit" class="btn btn-primary btn-lg my-4">Buscar</button>    
        </div>
      <?php
        require_once "src/UsuarioDAO.php";
        
        $usuarios = UsuarioDAO::listarUsuarios($_SESSION["idusuario"]);
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

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2025 - Minha Página. Todos os direitos reservados.</p>
  </footer>
</body>
</html>