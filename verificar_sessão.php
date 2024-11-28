<?php
// verificar_sessão.php
session_start();
if (isset($_SESSION['nome'])) {
    $nome = $_SESSION['nome']; // Obtém o nome do usuário da sessão
} else {
    $nome = "Usuário"; // Define um valor padrão caso não esteja logado
}

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    header("Location: login.html"); // Redireciona para a página de login caso não esteja logado
    exit();
}

// Obtém o nome do usuário da sessão
$nome = htmlspecialchars($_SESSION['nome'], ENT_QUOTES, 'UTF-8'); // Garante segurança ao exibir o nome
?>
