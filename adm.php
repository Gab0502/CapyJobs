<?php require("conn_capybd.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo - Listas</title>
    <style>
        :root {
            --verdeEscuro: #027449;
            --verdeMedio: #3b9b75;
            --verdeClaro: #8ee0b7;
            --bege: #ffdead;
            --bgBranco: #f0f3f5;
            --bgTextArea: #e2e7eb;
            --bgPagina: #f0f3f5;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bgBranco);
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: var(--verdeMedio);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: var(--bgBranco);
        }
        nav {
            text-align: center;
            margin-top: 30px;
        }
        nav a {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            text-decoration: none;
            color: var(--bgBranco);
        }
        nav a:hover {
            color: var(--bgBranco);
            background-color: var(--verdeClaro);
            border-radius: 4px;
            padding: 5px;
        }
        .logo {
            display: block;
            margin: 100;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">

    <a href="feed-temp.php">
        <img src="images/capivaraPadraoIcon.jpg" width="100" alt="Capybara Icon">
    </a>
    <h1>Painel Administrativo - Listas</h1>

    <nav>
        <a href="adm_pub.php">PUBLICAÇÕES</a>
        <a href="adm_perfil.php">PERFIS</a>
        <a href="feed-temp.php">Voltar</a>
    </nav>
</div>

</body>
</html>
