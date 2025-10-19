<?php
require_once "src/UsuarioDAO.php";
if (UsuarioDAO::cadastrarUsuario($_POST))
    header("Location: index.php");
else
    echo "Erro ao cadastrar usuário (email já cadastrado?)";