<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="manifest" href="pwa/manifest.json">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            max-width: 100%; /* Alterado para ajustar a largura máxima para telas menores */
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
            padding: 10px; /* Adicionado espaço de preenchimento para facilitar o toque em dispositivos móveis */
        }
        nav a:hover {
            color: var(--bgBranco);
            background-color: var(--verdeClaro);
            border-radius: 4px;
            padding: 5px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px; /* Ajuste da margem para centralizar e adicionar espaço inferior */
            text-align: center;
        }

        /* Adicionado estilo para tornar a imagem do logotipo responsiva */
        .logo img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">

    <a href="feed-temp.php" class="logo"> <!-- Adicionado a classe "logo" -->
        <img src="images/capivaraPadraoIcon.jpg" width="100" alt="Capybara Icon">
    </a>
    <h1>Painel Administrativo - Listas</h1>

    <nav>
        <a href="adm_pub.php">PUBLICAÇÕES</a>
        <a href="adm_perfil.php">PERFIS</a>
        <a href="feed-temp.php">Voltar</a>
    </nav>
</div>
<script src="pwa/myscripts.js"></script>

</body>
</html>
