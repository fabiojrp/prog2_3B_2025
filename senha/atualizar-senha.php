<?php
require '../src/ConexaoBD.php';
$pdo = ConexaoBD::conectar();

$token = $_POST['token'] ?? '';
$nova_senha = $_POST['nova_senha'] ?? '';

if (!$token || !$nova_senha) {
    die("Dados inválidos!");
}

$sql = $pdo->prepare("SELECT idusuario FROM usuarios WHERE token_recuperacao=? AND token_expira > NOW()");
$sql->execute([$token]);

if ($sql->rowCount() == 0) {
    die("Token inválido ou expirado!");
}

$usuario = $sql->fetch(PDO::FETCH_ASSOC);
$hash = md5($nova_senha);//password_hash($nova_senha, PASSWORD_DEFAULT);

// atualiza a senha e limpa o token
$pdo->prepare("UPDATE usuarios SET senha=?, token_recuperacao=NULL, token_expira=NULL WHERE idusuario=?")
    ->execute([$hash, $usuario['idusuario']]);

echo "Senha redefinida com sucesso! Você já pode fazer <a href='../form-login.php'>login</a>.";
