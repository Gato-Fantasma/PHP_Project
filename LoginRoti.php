<?php
session_start();

// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$password = "";
$database = "roti_banco";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado pelo método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Limpa espaços em branco dos dados enviados
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

    // Verifica se todos os campos foram preenchidos
    if (empty($nome) || empty($email) || empty($senha)) {
        die("Por favor, preencha todos os campos do formulário.");
    }

    // Verifica se o email já está cadastrado
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "O email já está cadastrado!";
    } else {
        // Criptografa a senha
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

        // Insere os dados no banco
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";

        if ($conn->query($sql) === TRUE) {
            echo "Usuário cadastrado com sucesso!";
            $_SESSION['nome'] = $nome;
            header("Location: Rotinas.html");
            exit();
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }
} else {
    echo "Por favor, envie o formulário.";
}

$conn->close();
?>
