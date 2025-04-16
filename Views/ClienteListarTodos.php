<!--Vai existir a variavel $clientes-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Clientes</title>
</head>
<body>

    <h1>Listagem de Clientes</h1>
    <tabel>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Telefone</td>
            </tr>
        </thead>
        <tbody>
            <!--Criar uma repetição para exibir todos os clientes-->
            <?php
                while($cliente = $clientes->fetch(PDO::FETCH_ASSOC)): 
                    echo "<tr>";
                    echo "<td>".$cliente["id"]."</td>";
                    echo "<td>".$cliente["nome"]."</td>";
                    echo "<td>".$cliente["email"]."</td>";
                    echo "<td>".$cliente["telefone"]."</td>";
                    echo "</tr>";

                endwhile;
            ?>
        </tbody>
    </tabel>

</body>
</html>