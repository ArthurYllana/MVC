<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testando Projeto MVC</title>
</head>
<body>
    <?php
        require_once "../controllers/ClienteController.php";
        $cliController = new ClienteController();

        $cliController->listarTodos();
    

    ?>
</body>
</html>