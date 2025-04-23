<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuários</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        form { margin-bottom: 20px; }
        .action-buttons { display: flex; gap: 5px; }
    </style>
</head>
<body>
    <h1>Gerenciamento de Usuários</h1>
    
    <!-- Formulário para adicionar/editar usuário -->
    <form method="post" action="">
        <input type="hidden" name="id" value="<?= isset($_POST['id']) ? $_POST['id'] : (isset($usuario['id']) ? $usuario['id'] : '') ?>">

        <label>Nome: <input type="text" name="nome" required value="<?= isset($_POST['nome']) ? $_POST['nome'] : (isset($usuario['nome']) ? $usuario['nome'] : '') ?>"></label>
        <label>Email: <input type="email" name="email" required value="<?= isset($_POST['email']) ? $_POST['email'] : (isset($usuario['email']) ? $usuario['email'] : '') ?>"></label>
        <label>Telefone: <input type="text" name="telefone" required value="<?= isset($_POST['telefone']) ? $_POST['telefone'] : (isset($usuario['telefone']) ? $usuario['telefone'] : '') ?>"></label>

        <!-- Condição para exibir o botão de adicionar ou atualizar -->
        <?php if (isset($_POST['id']) && !empty($_POST['id'])): ?>
            <button type="submit" name="adicionar">Adicionar</button>
        <?php else: ?>
            <button type="submit" name="atualizar">Atualizar</button>
        <?php endif; ?>
    </form>

    <?php
        require_once "../controllers/ClienteController.php";
        $cliController = new ClienteController();

        // Processar ações
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['adicionar'])) {
                $cliController->adicionar($_POST['nome'], $_POST['email'], $_POST['telefone']);
            } else if (isset($_POST['atualizar'])) {
                // Verificar se está atualizado com o ID correto
                $cliController->atualizar($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['telefone']);
            } else if (isset($_POST['deletar'])) {
                $cliController->deletar($_POST['id']);
            } else if (isset($_POST['consultar'])) {
                $cliController->consultar($_POST['id']);
            }
        }

        // Listar todos os usuários
        $cliController->listarTodos();

    ?>
</body>
</html>