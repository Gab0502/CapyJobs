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

$query ="DELETE FROM tb_pub WHERE tb_pub.idPub = $pub";
$conn_capybd->query($query);    
header('Location: feed-temp.php');
exit(); 
}

$conn_capybd->close();
?>