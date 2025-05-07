<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Clientes</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .action-buttons { display: flex; gap: 5px; }
    </style>
</head>
<body>
    <h2>Lista de Usuários</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($cliente = $clientes->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= htmlspecialchars($cliente['id']) ?></td>
                    <td><?= htmlspecialchars($cliente['nome']) ?></td>
                    <td><?= htmlspecialchars($cliente['email']) ?></td>
                    <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                    <td class="action-buttons">
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($cliente['id']) ?>">
                            <button type="submit" name="editar">Editar</button>
                        </form>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($cliente['id']) ?>">
                            <button type="submit" name="deletar" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>