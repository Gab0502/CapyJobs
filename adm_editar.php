<?php 
require('conn_capybd.php');

//Capturar post do form e validar com isset
if(isset($_POST['submit'])){
$idPub = $_POST['idPub'];
$idUser = $_POST['idUser'];
$ad = $_POST['ad'];
$tag = $_POST['tag'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$dia = $_POST['dia'];
$dataPub = $_POST['dataPub'];
$cep = $_POST['cep'];
$uf= $_POST['uf'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$comp = $_POST['comp'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];	
$midia1 = $_POST['midia1'];	
$midia1T = $_POST['midia1T'];	

//upload das imagens
$diretorio = "images/";

//img1
set_time_limit(0);
$id_midia1 = "midia1"; //var para o nome do campo 
$midia1Nome = $_FILES[$id_midia1]['name'];
//corrigir erro ao gravar o campo vazio 
if($midia1Nome != ''){
	unlink($diretorio.$_REQUEST['midia1G']);
	$midia1Temp = $_FILES[$id_midia1]["tmp_name"];
	move_uploaded_file($midia1Temp, $diretorio.$midia1Nome);
} else{
	$midia1Nome = $_REQUEST['midia1G'];
};

//img1
set_time_limit(0);
$id_midia1T = "midia1T"; //var para o nome do campo 
$midia1T = $_FILES[$id_midia1T]['name'];
//corrigir erro ao gravar o campo vazio 
if($midia1T != ''){
	unlink($diretorio.$_REQUEST['midia1TG']);
	$midia1Tempt = $_FILES[$id_midia1T]["tmpt_name"];
	move_uploaded_file($midia1Tempt, $diretorio.$midia1TNome);
} else{
	$midia1T = $_REQUEST['midia1TGt'];
};



//Editar dados do registro
$editar = "UPDATE tb_pub SET  idUser = '$idUser', ad = '$ad', tag = '$tag', titulo = '$titulo', descricao = '$descricao', cep = '$cep', uf = '$uf', rua = '$rua', numero = '$numero', comp = '$comp', bairro = '$bairro', cidade = '$cidade', midia1 = '$midia1', midia1T = '$midia1T' WHERE tb_pub.idPub = $idPub";

$resultado = mysqli_query($conn_capybd, $editar) or die(mysqli_error($conn_capybd));

if(!$resultado){
	die("ERROR".mysqli_error($conn_capybd));
} else{
	header("Location: adm-lista.php");
};
	
}; //fechamento do isset de update

//Consulta para passagem de parametro
if(isset($_GET['idPub'])){
	$id = $_GET['idPub'];
}; //fechamento isset da consulta

$query_rs_pub = "SELECT * FROM tb_pub WHERE idPub = $id";

$rs_pub = mysqli_query($conn_capybd, $query_rs_pub) or die(mysqli_error($conn_capybd));

$row_rs_pub = mysqli_fetch_assoc($rs_pub);

$totalRow_rs_pub = mysqli_num_rows($rs_pub);
//echo($totalRow_rs_pub);
//echo($row_rs_curso['idPub']);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="manifest" href="pwa/manifest.json">
<meta charset="UTF-8">
<title>Editar Registro - Administração do Site</title>
<link rel="icon" href="images/favicon-16x16.png">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f3f5;
        margin: 0;
        padding: 0;
    }
    h1 {
        text-align: center;
        margin-bottom: 30px;
    }
    form {
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th {
        background-color: #3b9b75;
        color: #fff;
        padding: 10px 20px;
        text-align: left;
    }
    td {
        padding: 10px 20px;
    }
    label {
        font-weight: bold;
    }
    img {
        display: block;
        margin: 10px auto;
        border-radius: 8px;
        max-width: 100%;
        height: auto;
    }
    .btn {
        display: inline-block;
        padding: 15px 30px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 15px;
        margin-top: 20px;
        text-align: center;
    }
    .btn:hover {
        background-color: #45a049;
    }
    .delete-link {
        display: inline-block;
        padding: 15px 30px;
        background-color: #f44336;
        color: white;
        text-decoration: none;
        border-radius: 15px;
        margin-top: 20px;
        text-align: center;
    }
    .delete-link:hover {
        background-color: #d32f2f;
    }
</style>
</head>
<body>
<h1>Editar Registro - Administração do Site</h1>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data" id="form_editar">
<table>
    <tr>
        <th colspan="2">Detalhes da Publicação</th>
    </tr>
    <tr>
        <td>
            <label for="idPub">ID da Publicação:</label><br>
            <?php echo($row_rs_pub ['idPub']); ?><br><br>
            <label for="idUser">ID do Usuário:</label><br>
            <?php echo($row_rs_pub ['idUser']); ?><br><br>
            <label for="ad">Ad:</label><br>
            <?php echo($row_rs_pub ['ad']); ?><br><br>
            <label for="tag">Tag:</label><br>
            <?php echo($row_rs_pub ['tag']); ?><br><br>
            <label for="titulo">Título:</label><br>
            <?php echo($row_rs_pub ['titulo']); ?><br><br>
            <label for="descricao">Descrição:</label><br>
            <?php echo($row_rs_pub ['descricao']); ?><br><br>
            <label for="dia">Data do Evento:</label><br>
            <?php echo($row_rs_pub ['dia']); ?><br><br>
            <label for="dataPub">Data da Publicação:</label><br>
            <?php echo($row_rs_pub ['dataPub']); ?><br><br>
            <label for="cep">CEP:</label><br>
            <?php echo($row_rs_pub ['cep']); ?><br><br>
        </td>
        <td>
            <label for="uf">UF:</label><br>
            <?php echo($row_rs_pub ['uf']); ?><br><br>
            <label for="rua">Rua:</label><br>
            <?php echo($row_rs_pub ['rua']); ?><br><br>
            <label for="numero">Número:</label><br>
            <?php echo($row_rs_pub ['numero']); ?><br><br>
            <label for="comp">Complemento:</label><br>
            <?php echo($row_rs_pub ['comp']); ?><br><br>
            <label for="bairro">Bairro:</label><br>
            <?php echo($row_rs_pub ['bairro']); ?><br><br>
            <label for="cidade">Cidade:</label><br>
            <?php echo($row_rs_pub ['cidade']); ?><br><br>
            <label for="midia1">Imagem Grande:</label><br>
            <img src="images/<?= $row_rs_pub['midia1']; ?>"><br><br>
            <label for="midia1T">Imagem Pequena:</label><br>
            <img src="images/<?= $row_rs_pub['midia1T']; ?>"><br><br>
        </td>
    </tr>
</table>
<a class="btn" href="adm_pub.php">Voltar</a>
</form>
<script src="pwa/myscripts.js"></script>
</body>
</html>
