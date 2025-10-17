<?php
require '../src/ConexaoBD.php';
$pdo = ConexaoBD::conectar();

$token = $_GET['token'] ?? '';

$sql = $pdo->prepare("SELECT * FROM usuarios WHERE token_recuperacao=? AND token_expira > NOW()");
$sql->execute([$token]);

if ($sql->rowCount() == 0) {
    die("Token inválido ou expirado!");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Redefinir Senha</title></head>
<body>
<h2>Redefinir Senha</h2>
<form action="atualizar-senha.php" method="post">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
    <label>Nova Senha:</label><br>
    <input type="password" name="nova_senha" required><br><br>
    <input type="submit" value="Atualizar Senha">
</form>
</body>
</html>
