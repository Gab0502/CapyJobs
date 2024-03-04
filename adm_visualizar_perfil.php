<?php require("conn_capybd.php");

if(isset($_GET['idUser'])){
    $id = $_GET['idUser'];
};

$query_rs_perf = "SELECT * FROM tb_users WHERE idUser = $id";

$rs_perf = mysqli_query($conn_capybd, $query_rs_perf);


//$totalRow_rs_perf = mysqli_num_rows($rs_perf);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>CapyJobs - ADM Usuários</title>
<link rel="icon" href="images/favicon-16x16.png">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f3f5;
    }
    .container {
        max-width: 600px;
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
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #3b9b75;
        color: #fff;
        font-weight: bold;
    }
    td {
        vertical-align: middle;
    }
    img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }
    .delete-icon {
        width: 20px;
        height: 20px;
    }
    .delete-link {
        display: block;
        text-align: center;
        text-decoration: none;
        color: #c00;
    }
    .delete-link:hover {
        color: #f00;
    }
</style>
</head>
<body>
<div class="container">
    <a href="feed-temp.php">
        <img src="images/capivaraPadraoIcon.jpg" width="100" alt="Capybara Icon">
    </a>
    <h1>Painel Administrativo - Detalhes do Usuário</h1>
    <a href="adm.php">Voltar</a>
    <br><br>
    <table>
        <tr>
            <th>Detalhes do Usuário</th>
            <th>Imagem</th>
        </tr>
        <?php if($row_rs_perf = mysqli_fetch_assoc($rs_perf)) { ?>
        <tr>
            <td>
                <p><strong>User ID:</strong> <?php echo $row_rs_perf['idUser']; ?></p>
                <p><strong>Nome:</strong> <?php echo $row_rs_perf['nome']; ?></p>
                <p><strong>Email:</strong> <?php echo $row_rs_perf['email']; ?></p>
                <p><strong>Senha:</strong> <?php echo $row_rs_perf['senha']; ?></p>
                <p><strong>Contato:</strong> <?php echo $row_rs_perf['celular']; ?></p>
                <p><strong>Bio:</strong> <?php echo $row_rs_perf['bio']; ?></p>
                <p><strong>Linkedin:</strong> <a href="<?php echo $row_rs_perf['linkedin']; ?>"><?php echo $row_rs_perf['linkedin']; ?></a></p>
                <p><strong>Twitter:</strong> <a href="<?php echo $row_rs_perf['twitter']; ?>"><?php echo $row_rs_perf['twitter']; ?></a></p>
                <p><strong>Instagram:</strong> <a href="<?php echo $row_rs_perf['instagram']; ?>"><?php echo $row_rs_perf['instagram']; ?></a></p>
                <p><strong>CEP:</strong> <?php echo $row_rs_perf['cep']; ?></p>
                <p><strong>UF:</strong> <?php echo $row_rs_perf['uf']; ?></p>
                <p><strong>Rua:</strong> <?php echo $row_rs_perf['rua']; ?></p>
                <p><strong>Número:</strong> <?php echo $row_rs_perf['numero']; ?></p>
                <p><strong>Complemento:</strong> <?php echo $row_rs_perf['comp']; ?></p>
                <p><strong>Bairro:</strong> <?php echo $row_rs_perf['bairro']; ?></p>
                <p><strong>Cidade:</strong> <?php echo $row_rs_perf['cidade']; ?></p>
                <p><strong>CPF:</strong> <?php echo $row_rs_perf['cpf_cnpj']; ?></p>
            </td>
            <td>
                <img src="images/<?php echo $row_rs_perf['fotoPerfil']; ?>" alt="Foto de Perfil">
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
