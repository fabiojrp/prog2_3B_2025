<?php
require '../src/ConexaoBD.php';
$pdo = ConexaoBD::conectar();

$email = $_POST['email'] ?? '';

$sql = $pdo->prepare("SELECT idusuario FROM usuarios WHERE email = ?");
$sql->execute([$email]);

if ($sql->rowCount() > 0) {
    $token = bin2hex(random_bytes(16));
    $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

    // salva o token
    $pdo->prepare("UPDATE usuarios SET token_recuperacao=?, token_expira=? WHERE email=?")
        ->execute([$token, $expira, $email]);

    // link de redefinição
    $link = "http://localhost:3000/senha/redefinir-senha.php?token=$token";

    // (aqui só exibe o link — em produção, envie por e-mail)
    echo "Link de recuperação <a href='$link'>$link</a>";
} else {
    echo "E-mail não encontrado!";
}
