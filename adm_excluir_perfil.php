<!-- Esta página serve apenas para excluir o perfil de um determinado usuário! -->
<?php require('conn_capybd.php');

if(isset($_GET['idUser'])){
    $idUser = $_GET['idUser'];
};

// Excluir as imagens da pasta
$query_rs_img = "SELECT * FROM tb_users WHERE tb_users.idUser = $idUser";
$rs_img = mysqli_query($conn_capybd, $query_rs_img);
$row_rs_img = mysqli_fetch_assoc($rs_img);

if($row_rs_img['fotoPerfil'] != 'capivaraPadraoIcon.jpg' || $row_rs_img['fotoPerfil'] != 'capivaraTernoIcon.jpg' || $row_rs_img['fotoPerfil'] != 'capivaraPalhacoIcon.jpg' || $row_rs_img['fotoPerfil'] != 'capivaraPagodeIcon.jpg' || $row_rs_img['fotoPerfil'] != 'capivaraFestivaIcon.jpg' || $row_rs_img['fotoPerfil'] != 'capivaraCozinheiraIcon.jpg' ){

	//unlink("images/$row_rs_img['fotoPerfil']");

}

$query_rs_perf = "DELETE tb_users, tb_seg
                 FROM tb_users
                 LEFT JOIN tb_seg ON tb_users.idUser = tb_seg.idSeg1
                 WHERE tb_users.idUser = $idUser";

$rs_perf = mysqli_query($conn_capybd, $query_rs_perf);


if($rs_perf == 1){
	echo('<script> alert("Registro deletado com sucesso!");
	window.location.href="adm_perfil.php"; </script>');
} else{
	echo("Falha ao deletar registro!");
};

//header('location:adm-lista.php');
//exit();

?>
<!doctype html>
<html>
<head>
<link rel="manifest" href="pwa/manifest.json">

<meta charset="utf-8">
<title>adm_excluir_perfil</title>
<link rel="icon" href="images/favicon-16x16.png">
</head>
<body>
<script src="pwa/myscripts.js"></script>

</body>
</html>