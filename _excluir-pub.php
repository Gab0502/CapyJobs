<?php 
require("conn_capybd.php");
session_start();
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$pub = $_POST['idPub'];
$query ="DELETE FROM tb_pub WHERE tb_pub.idPub = $pub";
$conn_capybd->query($query);    
header('Location: feed-temp.php');
exit(); 
}

$conn_capybd->close();


?>