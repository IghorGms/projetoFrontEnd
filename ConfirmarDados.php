<?php
session_start();
ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ConfirmarDados.css">
    <link rel="shortcut icon" href="media/icons/navIcon.png" type="image/x-icon" />

    <title>Dados Enviados</title>
    <script src="ConfirmarDados.js"></script>

</head>
<body>
<div class="box-container">
        <div class="box">
            <div class="ConfirmarDados">
    <h1>Confirme alguns dados seus! </h1>
    <p>Nome: <?php echo isset($_GET['Nome']) ? $_GET['Nome'] : ''; ?></p>
    <p>Sobrenome: <?php echo isset($_GET['Sobrenome']) ? $_GET['Sobrenome'] : ''; ?></p>
    <p>Email: <?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?></p>
    <p>Telefone: <?php echo isset($_GET['telefone']) ? $_GET['telefone'] : ''; ?></p>
    <p>Sua Idade: <?php echo isset($_GET['idade']) ? $_GET['idade'] : ''; ?></p>
    <p>Sua Opnião: <?php echo isset($_GET['opinion']) ? $_GET['opinion'] : ''; ?></p>
    <p>Produto selecionado: <?php echo isset($_GET['pedido']) ? $_GET['pedido'] : ''; ?></p>
    <p>Quantidade de produtos comprados: <?php echo isset($_GET['quantidade']) ? $_GET['quantidade'] : ''; ?></p>


    
    <div class="botaozinho">
        <br><button type="submit" id="botaozinho" class="botao-padrao" onclick="continarPagina()">Enviar</button>
    </div>
    </div>
</div>
</div>
</body>
</html>
