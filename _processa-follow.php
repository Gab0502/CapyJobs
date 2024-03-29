<?php 
require("conn_capybd.php");
session_start();
header('Content-Type: application/json');


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $seguidor = $_SESSION['idUser'];
    $seguido = $_POST['userIdToFollow'];

    $checkFollowQuery = "SELECT * FROM tb_seg WHERE idSeg1 = $seguido AND idSeg2 = $seguidor";
    $followResult = $conn_capybd->query($checkFollowQuery);

    if ($followResult && $followResult->num_rows == 0) {
        // Se o usuário ainda não está seguindo, inserir o follow
        $insertFollowQuery = "INSERT INTO tb_seg (idSeg1, idSeg2) VALUES ($seguido, $seguidor)";
        $conn_capybd->query($insertFollowQuery);

        $result = 'follow';

        // Responder ao cliente (pode adicionar mais informações conforme necessário)
    } else {
        // Se o usuário já está seguindo, remover o follow
        $deleteFollowQuery = "DELETE FROM tb_seg WHERE idSeg1 = $seguido AND idSeg2 = $seguidor";
        $conn_capybd->query($deleteFollowQuery);
        $result = "unfollow";
    }
} 
echo json_encode(array("status" => $result));


// Fechar a conexão com o banco de dados
$conn_capybd->close();



?>