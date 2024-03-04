<?php require("conn_capybd.php");

$query_rs_perf = "SELECT * FROM tb_users ORDER BY tb_users.idUser DESC";

$rs_perf = mysqli_query($conn_capybd, $query_rs_perf);

$row_rs_perf = mysqli_fetch_assoc($rs_perf);

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
    <h1>Painel Administrativo - Lista de Usuários</h1>
    <a href="adm.php">Voltar</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>User ID</th>
                <th>Nome</th>
                <th>Banner</th>
                <th>Foto de Perfil</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row_rs_perf = mysqli_fetch_assoc($rs_perf)) { ?>
            <tr>
                <td>
                    <a href="adm_visualizar_perfil.php<?php echo($row_rs_perf["idUser"])?>"></a>
                        <img class="delete-icon" src="images/adm/delete.gif" alt="Excluir">
                    </a>
                </td>
                <td><a href="adm_visualizar_perfil.php?idUser=<?php echo($row_rs_perf["idUser"]); ?>"></a><?php echo($row_rs_perf['idUser']);?></a></td>
                <td><a href="adm_visualizar_perfil.php?idUser=<?php echo($row_rs_perf["idUser"]); ?>"><?php echo($row_rs_perf['nome']);?></a></td>
                <td><a href="adm_visualizar_perfil.php?idUser=<?php echo($row_rs_perf["idUser"]); ?>"><img src="images/<?php echo($row_rs_perf['banner']);?>"></a></td>
                <td><a href="adm_visualizar_perfil.php?idUser=<?php echo($row_rs_perf["idUser"]); ?>"><img src="images/<?php echo($row_rs_perf['fotoPerfil']);?>"></a></td>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
