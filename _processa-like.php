<?php 
require("conn_capybd.php");
session_start();
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter dados do POST
    $postId = $_POST['postId'];
    $userId = $_SESSION['idUser'];

    // Verificar se o usuário já curtiu a publicação
    $checkLikeQuery = "SELECT * FROM tb_likes WHERE idPub = $postId AND idUser = $userId";
    $likeResult = $conn_capybd->query($checkLikeQuery);

    if ($likeResult && $likeResult->num_rows == 0) {
        // Se o usuário ainda não curtiu, inserir o like
        $insertLikeQuery = "INSERT INTO tb_likes (idPub, idUser) VALUES ($postId, $userId)";
        $conn_capybd->query($insertLikeQuery);

        $result="like";

        // Responder ao cliente (pode adicionar mais informações conforme necessário)
    } else {
        // Se o usuário já curtiu, enviar mensagem de erro
        $deleteLikeQuery = "DELETE FROM tb_likes WHERE idPub = $postId AND idUser = $userId";
        $conn_capybd->query($deleteLikeQuery);
        $result="deslike";    
    }
}
echo json_encode(array("status" => $result));
// Fechar a conexão com o banco de dados
$conn_capybd->close();

?>