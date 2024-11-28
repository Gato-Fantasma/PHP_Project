<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luiz Eduardo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
        include 'verificar_sessão.php';
    ?>
</head>
<body>
    <div class="container mt-4">
        <!-- Cabeçalho -->
        <header class="d-flex justify-content-between align-items-center p-3 bg-secondary text-white rounded">
            <h1>Bem-vindo,</h>
            <span class="ms-2 fs-4 fw-bold"><?php echo htmlspecialchars($nome); ?></span>
        </header>

        </header>

        <div class="row mt-4">
            <!-- Seção lateral esquerda -->
            <aside class="col-md-3 bg-light p-3 rounded">
                <h2>Meus Hábitos</h2>
            </aside>

            <!-- Área principal -->
            <main class="col-md-6">
                <section class="mb-4">
                    <h3>Sequência</h3>
                    <p>🔥 0 dias</p>
                </section>

                <section>
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalMeta">Adicionar Meta</button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalHabito">Adicionar Hábito</button>
                </section>
            </main>

            <!-- Seção lateral direita -->
            <aside class="col-md-3 bg-light p-3 rounded">
                <h3>Metas</h3>
            </aside>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$host = 'localhost'; // Host do banco de dados
$dbname = 'Habitos DB'; // Nome do banco de dados
$username = 'root'; // Seu usuário do MySQL
$password = ''; // Sua senha do MySQL

// Conectar ao banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Função para adicionar um novo hábito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['habit_name'])) {
    $habit_name = $_POST['habit_name'];
    $stmt = $pdo->prepare("INSERT INTO habits (habit_name) VALUES (:habit_name)");
    $stmt->bindParam(':habit_name', $habit_name);
    $stmt->execute();
}

// Função para marcar um hábito como cumprido
if (isset($_POST['mark_habit_id'])) {
    $habit_id = $_POST['mark_habit_id'];
    $today = date('Y-m-d');

    // Verifica se o hábito já foi marcado no mesmo dia
    $stmt = $pdo->prepare("SELECT * FROM habits WHERE id = :id");
    $stmt->bindParam(':id', $habit_id);
    $stmt->execute();
    $habit = $stmt->fetch();

    if ($habit) {
        if ($habit['last_completed'] !== $today) {
            // Verifica se a última data completada é o dia anterior
            $streak = ($habit['last_completed'] == date('Y-m-d', strtotime('-1 day'))) ? $habit['streak'] + 1 : 1;

            // Atualiza o hábito com a nova sequência e a data de hoje
            $updateStmt = $pdo->prepare("UPDATE habits SET streak = :streak, last_completed = :last_completed WHERE id = :id");
            $updateStmt->bindParam(':streak', $streak);
            $updateStmt->bindParam(':last_completed', $today);
            $updateStmt->bindParam(':id', $habit_id);
            $updateStmt->execute();
        }
    }
}

// Buscar todos os hábitos
$stmt = $pdo->query("SELECT * FROM habits");
$habits = $stmt->fetchAll();
?>
