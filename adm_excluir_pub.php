<?php
//essa pagina sera para excluir a publicaçao
//Excluindo o registro que o usuario escolher e voltar para a pagina lista 
require('conn_capybd.php');

if(isset($_GET['idPub'])){
    $idPub = $_GET['idPub'];
};
//Excluir as imagens da pasta 
//unlink("imagens/upload/");

//$query_rs_img = "SELECT * FROM tb_pub WHERE tb_pub.idPub = $idPub";
//$rs_img = mysqli_query($conn_capybd, $query_rs_img);
//$row_rs_img = mysqli_fetch_assoc($rs_img);

$query_rs_pub = "DELETE FROM tb_pub WHERE tb_pub.idPub = $idPub";

$rs_pub = mysqli_query($conn_capybd, $query_rs_pub);


if($rs_pub == 1){
	echo('<script> alert("Registro deletado com sucesso!");
	window.location.href="adm_pub.php"; </script>');
} else{
	echo("Falha ao excluir registro!");
};
/*
$curso = $_GET['idCurso'];
 
$idCurso = $_GET['idCurso'];
   
$query = "DELETE FROM tb_cursos WHERE tb_cursos.idCurso = $idCurso";
  
$conn_bd_ctec->query($query);*/

//header('location:adm-lista.php');
//exit();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Excluir-Pub</title>
</head>
<body>
</body>
</html>