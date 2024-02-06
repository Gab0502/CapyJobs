<?php
//essa pagina sera para excluir a publicaçao
//Excluindo o registro que o usuario escolher e voltar para a pagina lista 
require('conn_capybd.php');

if(isset($_GET['idUser'])){
    $idUser = $_GET['idUser'];
};
//Excluir as imagens da pasta 
//unlink("imagens/upload/");

$query_rs_img = "SELECT * FROM tb_users WHERE tb_users.idUser = $idUser";
$rs_img = mysqli_query($conn_capybd, $query_rs_img);
$row_rs_img = mysqli_fetch_assoc($rs_img);




$query_rs_perf = "DELETE FROM tb_users WHERE tb_users.idUser = $idUser";

$rs_perf = mysqli_query($conn_capybd, $query_rs_perf);


if($rs_perf == 1){
	echo('<script> alert("Excluido com sucesso!!!");
	window.location.href="adm_perfil.php"; </script>');
} else{
	echo("Falha ao excluir dados!");
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
<title>Excluir</title>
</head>

<body>
<img src="imagens/logo-ctec.png" width="100" alt=""/>

<h1>Excluir</h1>	
	
</body>
</html>