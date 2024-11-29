<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    // Redireciona para a página de login, caso o usuário não esteja logado
    header("Location: telalogin.html");
    exit();
}

// Exemplo: Pode ser usado para exibir o nome do usuário logado
$nomeUsuario = htmlspecialchars($_SESSION['nome'], ENT_QUOTES, 'UTF-8');
?>