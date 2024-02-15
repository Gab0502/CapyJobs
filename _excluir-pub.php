<?php 
require("conn_capybd.php");
session_start();
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$pub = $_POST['idPub'];

$query_rs_img = "SELECT * FROM tb_pub WHERE tb_pub.idPub = $pub";
$rs_img = mysqli_query($conn_capybd, $query_rs_img);
$row_rs_img = mysqli_fetch_assoc($rs_img);
unlink("images/". $row_rs_img['midia1']);

$query = 
"DELETE tb_pub, tb_likes 
FROM tb_pub 
LEFT JOIN tb_likes ON tb_pub.idPub = tb_likes.idPub
WHERE tb_pub.idPub = $pub";
$conn_capybd->query($query);    
header('Location: feed-temp.php');
exit(); 
}

$conn_capybd->close();
?>