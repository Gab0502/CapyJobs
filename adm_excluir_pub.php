<!-- Esta pagina serve apenas para excluir uma determinada publicação! -->
<?php require('conn_capybd.php');

if(isset($_GET['idPub'])){
    $idPub = $_GET['idPub'];
};

// Excluir as imagens da pasta
//$query_rs_img = "SELECT * FROM tb_pub WHERE tb_pub.idPub = $idPub";
//$rs_img = mysqli_query($conn_capybd, $query_rs_img);
//$row_rs_img = mysqli_fetch_assoc($rs_img);
//unlink("imagens/upload/$");

$query_rs_pub = "DELETE FROM tb_pub WHERE tb_pub.idPub = $idPub";

$rs_pub = mysqli_query($conn_capybd, $query_rs_pub);


if($rs_pub == 1){
	echo('<script> alert("Registro deletado com sucesso!");
	window.location.href="adm_pub.php"; </script>');
} else{
	echo("Falha ao deletar registro!");
};

//header('location:adm-lista.php');
//exit();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>adm_excluir_pub</title>
</head>
<body>
</body>
</html>