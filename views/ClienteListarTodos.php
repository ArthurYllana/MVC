<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Clientes</title>
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
                    <td><?= $cliente['ID'] ?></td>
                    <td><?= $cliente['nome'] ?></td>
                    <td><?= $cliente['email'] ?></td>
                    <td><?= $cliente['telefone'] ?></td>
                    <td class="action-buttons">
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $cliente['ID'] ?>">
                            <button type="submit" name="consultar">Editar</button>
                        </form>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $cliente['ID'] ?>">
                            <button type="submit" name="deletar" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>