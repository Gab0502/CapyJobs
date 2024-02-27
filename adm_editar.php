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

$query_rs_pub = "SELECT * FROM tb_pub WHERE idPub = $id ";

$rs_pub = mysqli_query($conn_capybd, $query_rs_pub) or die(mysqli_error($conn_capybd));

$row_rs_pub = mysqli_fetch_assoc($rs_pub);

$totalRow_rs_pub = mysqli_num_rows($rs_pub);
//echo($totalRow_rs_pub);
//echo($row_rs_curso['idPub']);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Registro - Administração do Site</title>
<link rel="icon" href="images/favicon-16x16.png">
</head>

<body>
	
<h1>Editar Registro - Administração do Site</h1>	

	
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data" id="form_editar">
	
id da Publicação:<?php echo($row_rs_pub ['idPub']); ?><br><br>

id do Usuario<?php echo($row_rs_pub ['idUser']); ?><br><br>

ad:<?php echo($row_rs_pub ['ad']); ?><br><br>

tag:<?php echo($row_rs_pub ['tag']); ?><br><br>

titulo: <?php echo($row_rs_pub ['titulo']); ?><br><br>

Descrição: <?php echo($row_rs_pub ['descricao']); ?><br><br>

Data do evento: <?php echo($row_rs_pub ['dia']); ?><br><br>

Data da Publicação: <?php echo($row_rs_pub ['dataPub']); ?><br><br>

CEP: <?php echo($row_rs_pub ['cep']); ?><br><br>

UF: <?php echo($row_rs_pub ['uf']); ?><br><br>

Rua: <?php echo($row_rs_pub ['rua']); ?><br><br>

numero: <?php echo($row_rs_pub ['numero']); ?><br><br>

Compremento: <?php echo($row_rs_pub ['comp']); ?><br><br>

Bairro: <?php echo($row_rs_pub ['bairro']); ?><br><br>

Cidade: <?php echo($row_rs_pub ['cidade']); ?><br><br>

Imagem grande: <?php echo($row_rs_pub['midia1']); ?><br><br>
<img src="images/<?php echo($row_rs_pub['midia1']); ?>" width="100"><br>

<input name="midia11G" type="hidden" id="midia11G" value="<?php echo($row_rs_pub['midia1']); ?>"><br><br>

<input name="midia1" type="file" id="midia1" value=""><br><br>

Imagem pequena: <?php echo($row_rs_pub['midia1T']); ?><br><br>
<img src="images/<?php echo($row_rs_pub['midia1T']); ?>" width="100"><br>

<input name="midia1TGt" type="hidden" id="midia1TGt" value="<?php echo($row_rs_pub['midia1T']); ?>"><br><br>

<input name="midia1T" type="file" id="midia1T" value=""><br><br>
	
<br><br><br><br><br>
<input name="submit" type="submit" id="submit">	<br><br>
<a href=adm_pub.php><h1 style="color: black">Voltar</h1>
</form>	
	
	
</body>
</html>