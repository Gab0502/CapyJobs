<?php require("conn_capybd.php");
 
$query_rs_pub = "SELECT * FROM tb_pub ORDER BY tb_pub.idPub ";

$rs_pub = mysqli_query($conn_capybd, $query_rs_pub);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>CapyJobs - ADM Publicações</title>
<link rel="icon" href="images/favicon-16x16.png">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f3f5;
    }
    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        margin-bottom: 30px;
    }
    .feed {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start; /* Alterado para alinhar as publicações à esquerda */
        gap: 20px; /* Espaçamento entre as publicações */
        margin-bottom: -20px; /* Ajuste para o último item não criar espaço extra */
        max-width: 800px; /* Definindo a largura máxima do .feed */
        margin-left: auto; /* Centralizando o .feed */
        margin-right: auto; /* Centralizando o .feed */
    }
    .post {
        width: calc(50% - 20px);
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .post-content {
        margin-bottom: 10px;
    }
    .post img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }
    .post-date {
        text-align: right;
        color: #999;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
    }
    .btn:hover {
        background-color: #45a049;
    }
</style>
</head>

<body>
<div class="container">
    <a href="feed-temp.php">
        <img src="images/capivaraPadraoIcon.jpg" width="100" alt="Capybara Icon">
    </a>
    <h1>Painel Administrativo - Lista de Publicações</h1>
    <a href="adm.php" class="btn">Voltar</a>
    <br><br>
    <div class="feed">
        <?php while($row_rs_pub = mysqli_fetch_assoc($rs_pub)) { ?>
        <div class="post">
            <div class="post-content">
                <h6><?php echo $row_rs_pub['idPub']; ?></h6>
                <p><?php echo $row_rs_pub['titulo']; ?></p>
            </div>
            <a href="adm_editar.php?idPub=<?php echo $row_rs_pub['idPub']; ?>">
                <img src="images/<?php echo $row_rs_pub['midia1']; ?>" width="100" alt="Poster">
            </a>
            <p class="post-date"><?php echo $row_rs_pub['dataPub']; ?></p>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
