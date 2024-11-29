<?php
session_start();
session_destroy(); // Encerra a sessão
header("Location: telalogin.html"); // Redireciona para a página de login
exit();
?>
