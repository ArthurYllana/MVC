<?php
session_start(); // Inicia a sessão para armazenamento de estados

require_once "../controllers/ClienteController.php";
$cliController = new ClienteController();

// Verificar se há usuário em edição na sessão
if (isset($_SESSION['usuario_edicao'])) {
    $usuario = $_SESSION['usuario_edicao'];
    unset($_SESSION['usuario_edicao']); // Limpa após uso
}

// Mostrar mensagens da sessão
if (isset($_SESSION['mensagem'])) {
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}

// Processar ações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar inputs
    $id = isset($_POST['id']) ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : null;
    $nome = isset($_POST['nome']) ? filter_var($_POST['nome'], FILTER_SANITIZE_STRING) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $telefone = isset($_POST['telefone']) ? filter_var($_POST['telefone'], FILTER_SANITIZE_STRING) : '';

    if (isset($_POST['adicionar'])) {
        $cliController->adicionar($nome, $email, $telefone);
    } else if (isset($_POST['atualizar'])) {
        $cliController->atualizar($id, $nome, $email, $telefone);
    } else if (isset($_POST['deletar'])) {
        $cliController->deletar($id);
    } else if (isset($_POST['editar'])) {
        $cliController->editar($id);
        exit(); // O redirecionamento é feito dentro do método editar
    }
    
    // Redirecionar para evitar reenvio do formulário
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuários</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
</head>
<body>
    <h1>Gerenciamento de Usuários</h1>
    
    <!-- Formulário para adicionar/editar usuário -->
    <form method="post" action="">
        <input type="hidden" name="id" value="<?= isset($usuario['id']) ? htmlspecialchars($usuario['id']) : '' ?>">

        <label>Nome: <input type="text" name="nome" required value="<?= isset($usuario['nome']) ? htmlspecialchars($usuario['nome']) : '' ?>"></label>
        <label>Email: <input type="email" name="email" required value="<?= isset($usuario['email']) ? htmlspecialchars($usuario['email']) : '' ?>"></label>
        <label>Telefone: <input type="text" name="telefone" required value="<?= isset($usuario['telefone']) ? htmlspecialchars($usuario['telefone']) : '' ?>"></label>

        <!-- Condição para exibir o botão de adicionar ou atualizar -->
        <?php if (isset($usuario['id']) && !empty($usuario['id'])): ?>
            <button type="submit" name="atualizar">Atualizar</button>
            <button type="button" onclick="window.location.href='index.php'">Cancelar</button>
        <?php else: ?>
            <button type="submit" name="adicionar">Adicionar</button>
        <?php endif; ?>
    </form>

    <?php
        // Listar todos os usuários
        $cliController->listarTodos();
    ?>
</body>
</html>