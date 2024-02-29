<?php require("conn_capybd.php");
 
$query_rs_pub = "SELECT * FROM tb_pub ORDER BY tb_pub.idPub ";

$rs_pub = mysqli_query($conn_capybd, $query_rs_pub);

$row_rs_pub = mysqli_fetch_assoc($rs_pub);

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
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {        background-color: #3b9b75;
        color: #fff;
    }
    td img {
        display: block;
        margin: 0 auto;
    }
    td:first-child, td:nth-child(2) {
        width: 50px;
        text-align: center;
    }
    td:nth-child(19) img {
        max-width: 100px;
    }
    .descricao {
        display: none;
    }
    .descricao.active {
        display: block;
    }
    .descricao-toggle {
        cursor: pointer;
        color: blue;
    }
    hr {
        border: none;
        border-top: 1px solid #ddd;
        margin: 10px 0;
    }
</style>
</head>

<body>
<div class="container">
    <a href="feed-temp.php">
        <img src="images/capivaraPadraoIcon.jpg" width="100" alt="Capybara Icon">
    </a>
    <h1>Painel Administrativo - Lista de Publicações</h1>
    <a href="adm.php">Voltar</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Excluir</th>
                <th>Editar</th>
                <th>Pub ID</th>
                <th>User ID</th>
                <th>AD?</th>
                <th>Tag</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data (AD)</th>
                <th>Data (Pub)</th>
                <th>CEP</th>
                <th>UF</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Poster</th>
            </tr>
        </thead>
        <tbody>
            <!-- INÍCIO do Loop -->
            <?php do { ?>
                <tr>
                    <td>
                        <a href="adm_excluir_pub.php?idPub=<?php echo($row_rs_pub["idPub"])?>" onclick="return confirm('Deseja realmente excluir? <?php echo($row_rs_pub['idPub'])?>')">
                            <img src="images/adm/delete.gif" width="20" height="20" alt="Excluir">
                        </a>
                    </td>
                    <td>
                        <a href="adm_editar.php?idPub=<?php echo($row_rs_pub["idPub"])?>">
                            <img src="images/adm/edit.gif" width="20" height="20" alt="Editar">
                        </a>
                    </td>
                    <td><?php echo($row_rs_pub ['idPub']); ?></td>
                    <td><?php echo($row_rs_pub ['idUser']); ?></td>
                    <td><?php echo($row_rs_pub ['ad']); ?></td>
                    <td><?php echo($row_rs_pub ['tag']); ?></td>
                    <td><?php echo($row_rs_pub ['titulo']); ?></td>
                    <td>
                        <span class="descricao-toggle">Mostrar Descrição</span>
                        <div class="descricao">
                            <?php echo($row_rs_pub ['descricao']); ?>
                        </div>
                    </td>
                    <td><?php echo($row_rs_pub ['dia']); ?></td>
                    <td><?php echo($row_rs_pub ['dataPub']); ?></td>
                    <td><?php echo($row_rs_pub ['cep']); ?></td>
                    <td><?php echo($row_rs_pub ['uf']); ?></td>
                    <td><?php echo($row_rs_pub ['rua']); ?></td>
                    <td><?php echo($row_rs_pub ['numero']); ?></td>
                    <td><?php echo($row_rs_pub ['comp']); ?></td>
                    <td><?php echo($row_rs_pub ['bairro']); ?></td>
                    <td><?php echo($row_rs_pub ['cidade']); ?></td>
                    <td><img src="images/<?php echo($row_rs_pub['midia1']);?>" width="50" alt="Poster"></td>
                </tr>
            <?php } while($row_rs_pub = mysqli_fetch_assoc($rs_pub)); ?>
            <!-- FIM do Loop -->
        </tbody>
    </table>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var descricaoToggles = document.querySelectorAll(".descricao-toggle");
        descricaoToggles.forEach(function(descricaoToggle) {
            descricaoToggle.addEventListener("click", function() {
                var descricao = this.nextElementSibling;
                descricao.classList.toggle("active");
            });
        });
    });
</script>
</body>
</html>

       
