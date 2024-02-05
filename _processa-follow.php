<?php 
require("conn_capybd.php");
session_start();
header('Content-Type: application/json');

echo("recebido");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $seguidor = $_SESSION['idUser'];
    $seguido = $_POST['userIdToFollow'];

    $checkFollowQuery = "SELECT * FROM tb_seg WHERE idSeg1 = $seguido AND idSeg2 = $seguidor";
    $followResult = $conn_capybd->query($checkFollowQuery);

    if ($followResult && $followResult->num_rows == 0) {
        // Se o usuário ainda não está seguindo, inserir o follow
        $insertFollowQuery = "INSERT INTO tb_seg (idSeg1, idSeg2) VALUES ($seguido, $seguidor)";
        $conn_capybd->query($insertFollowQuery);

        echo"tudo certo";

        // Responder ao cliente (pode adicionar mais informações conforme necessário)
    } else {
        // Se o usuário já está seguindo, remover o follow
        $deleteFollowQuery = "DELETE FROM tb_seg WHERE idSeg1 = $seguido AND idSeg2 = $seguidor";
        $conn_capybd->query($deleteFollowQuery);

        // Responder ao cliente (pode adicionar mais informações conforme necessário)
    }
} else {
    // Caso não seja uma solicitação POST, retornar erro
    http_response_code(400);
    echo json_encode(['error' => 'Bad Request']);
}

// Fechar a conexão com o banco de dados
$conn_capybd->close();



?>