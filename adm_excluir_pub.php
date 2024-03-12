<!-- Esta página serve apenas para excluir uma determinada publicação! -->
<?php 
require('conn_capybd.php');

if(isset($_GET['idPub'])){
    $idPub = $_GET['idPub'];
}

// Excluir as imagens da pasta
$query_rs_img = "SELECT * FROM tb_pub WHERE tb_pub.idPub = $idPub";
$rs_img = mysqli_query($conn_capybd, $query_rs_img);
$row_rs_img = mysqli_fetch_assoc($rs_img);
unlink("images/". $row_rs_img['midia1']);

// Excluir a publicação da tabela tb_pub
$query_delete_pub = "DELETE FROM tb_pub WHERE idPub = $idPub";
$rs_delete_pub = mysqli_query($conn_capybd, $query_delete_pub);

// Excluir os likes associados à publicação
$query_delete_likes = "DELETE FROM tb_likes WHERE idPub = $idPub";
$rs_delete_likes = mysqli_query($conn_capybd, $query_delete_likes);

if($rs_delete_pub && $rs_delete_likes){
    echo '<script>alert("Registro deletado com sucesso!"); window.location.href="adm_pub.php";</script>';
} else{
    echo "Falha ao deletar registro!";
}
?>
<!doctype html>
<html>
<head>
    <link rel="manifest" href="pwa/manifest.json">
    <meta charset="utf-8">
    <title>adm_excluir_pub</title>
    <link rel="icon" href="images/favicon-16x16.png">
</head>
<body>
    <script src="pwa/myscripts.js"></script>
</body>
</html>
