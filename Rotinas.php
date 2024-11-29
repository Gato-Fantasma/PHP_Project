<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luiz Eduardo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
</head>
    <?php
        include 'verificar_sessão.php';
    ?>
</head>
<body>
    <div class="container mt-4">
        <!-- Cabeçalho -->
        <header class="d-flex justify-content-between align-items-center p-3 bg-secondary text-white rounded">
            <h1>Bem-vindo,</h>
            <span class="ms-2 fs-4 fw-bold"><?php echo htmlspecialchars($nomeUsuario); ?></span>
        </header>

        </header>

        <div class="container mt-5">
    <!-- Título de Hábitos -->
    <h2>Meus Hábitos</h2>

    <!-- Botão para abrir o modal de adicionar hábito -->
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalHabito">
      Adicionar Hábito
    </button>

    <!-- Modal para adicionar um novo hábito -->
    <div class="modal fade" id="modalHabito" tabindex="-1" aria-labelledby="modalHabitoLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalHabitoLabel">Adicionar Hábito</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formHabito">
              <div class="mb-3">
                <label for="nomeHabito" class="form-label">Nome do Hábito</label>
                <input type="text" class="form-control" id="nomeHabito" required>
              </div>
              <div class="mb-3">
                <label for="descricaoHabito" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricaoHabito" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Criar Hábito</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Lista de hábitos -->
    <div id="listaHabitos" class="mt-4">
      <!-- Os hábitos adicionados serão exibidos aqui -->
    </div>

    <!-- Título de Metas -->
    <h2 class="mt-5">Minhas Metas</h2>

    <!-- Botão para abrir o modal de adicionar meta -->
    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalMeta">
      Adicionar Meta
    </button>

    <!-- Modal para adicionar uma nova meta -->
    <div class="modal fade" id="modalMeta" tabindex="-1" aria-labelledby="modalMetaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalMetaLabel">Adicionar Meta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formMeta">
              <div class="mb-3">
                <label for="tituloMeta" class="form-label">Título da Meta</label>
                <input type="text" class="form-control" id="tituloMeta" required>
              </div>
              <div class="mb-3">
                <label for="descricaoMeta" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricaoMeta" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Criar Meta</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Lista de metas -->
    <div id="listaMetas" class="mt-4">
      <!-- As metas adicionadas serão exibidas aqui -->
    </div>
  </div>

  <script>
    // Função para adicionar um novo hábito à lista
    document.getElementById("formHabito").addEventListener("submit", function(event) {
      event.preventDefault(); // Impede o envio do formulário

      // Pegando os valores do formulário
      const nomeHabito = document.getElementById("nomeHabito").value;
      const descricaoHabito = document.getElementById("descricaoHabito").value;

      if (nomeHabito && descricaoHabito) {
        // Criando um novo item de hábito
        const habitItem = document.createElement("div");
        habitItem.classList.add("habit-item", "mb-3", "p-3", "border", "border-success", "rounded");

        habitItem.innerHTML = `
          <h5>${nomeHabito}</h5>
          <p>${descricaoHabito}</p>
        `;

        // Adicionando o novo hábito à lista de hábitos
        document.getElementById("listaHabitos").appendChild(habitItem);

        // Limpando o formulário e fechando o modal
        document.getElementById("formHabito").reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById("modalHabito"));
        modal.hide();
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Campos obrigatórios',
          text: 'Por favor, preencha o nome e a descrição do hábito!'
        });
      }
    });

    // Função para adicionar uma nova meta à lista
    document.getElementById("formMeta").addEventListener("submit", function(event) {
      event.preventDefault(); // Impede o envio do formulário

      // Pegando os valores do formulário
      const tituloMeta = document.getElementById("tituloMeta").value;
      const descricaoMeta = document.getElementById("descricaoMeta").value;

      if (tituloMeta && descricaoMeta) {
        // Criando um novo item de meta
        const metaItem = document.createElement("div");
        metaItem.classList.add("meta-item", "mb-3", "p-3", "border", "border-info", "rounded");

        metaItem.innerHTML = `
          <h5>${tituloMeta}</h5>
          <p>${descricaoMeta}</p>
        `;

        // Adicionando a nova meta à lista de metas
        document.getElementById("listaMetas").appendChild(metaItem);

        // Limpando o formulário e fechando o modal
        document.getElementById("formMeta").reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById("modalMeta"));
        modal.hide();
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Campos obrigatórios',
          text: 'Por favor, preencha o título e a descrição da meta!'
        });
      }
    });
  </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$host = 'localhost'; // Host do banco de dados
$dbname = 'HabitosDB'; // Nome do banco de dados
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
