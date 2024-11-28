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
        <h1>Bem-vindo,</h1>
        <?php 
        echo isset($nome) ? htmlspecialchars($nome) : "Convidado"; 
        ?>
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
