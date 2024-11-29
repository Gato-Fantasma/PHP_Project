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

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    // Cadastro de usuários
    if ($action === 'cadastro') {
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
        $email = isset($_POST['email']) ? trim($_POST['email']) : null;
        $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

        if (empty($nome) || empty($email) || empty($senha)) {
            die("Por favor, preencha todos os campos do formulário.");
        }

        // Verifica se o email já está cadastrado
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "O email já está cadastrado!";
        } else {
            // Criptografa a senha e cadastra o usuário
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $nome, $email, $senhaHash);

            if ($stmt->execute()) {
                echo "Usuário cadastrado com sucesso!";
                $_SESSION['nome'] = $nome;
                header("Location: Rotinas.html");
                exit();
            } else {
                echo "Erro ao cadastrar: " . $stmt->error;
            }
        }

        $stmt->close();

    // Login de usuários
    } elseif ($action === 'login') {
        $email = isset($_POST['email']) ? trim($_POST['email']) : null;
        $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

        if (empty($email) || empty($senha)) {
            die("Por favor, preencha todos os campos do formulário.");
        }

        // Verifica o email e senha no banco
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($senha, $user['senha'])) {
                // Login bem-sucedido
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['email'] = $user['email'];
                header("Location: Rotinas.html");
                exit();
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "Email não encontrado!";
        }

        $stmt->close();
    } else {
        echo "Ação inválida!";
    }
} else {
    echo "Acesso inválido!";
}

$conn->close();
?>