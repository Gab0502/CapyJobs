<?php 
require("conn_capybd.php");
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUser = $_SESSION['idUser']; // ID do usuário da sessão

    if (isset($_FILES['upload-photo']) && $_FILES['upload-photo']['error'] === UPLOAD_ERR_OK) {
        $nomeOriginal = $_FILES['upload-photo']['name'];
        $nomeTemporario = $_FILES['upload-photo']['tmp_name'];

        // Gerar um nome único para a imagem
        $nomeAleatorio = uniqid() . '_' . $nomeOriginal;
        $diretorioDestino = 'images/';
        $caminhoCompleto = $diretorioDestino . $nomeAleatorio;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($nomeTemporario, $caminhoCompleto)) {
            // Atualiza o campo 'fotoPerfil' na tabela 'tb_users' com o novo caminho da imagem
            $sql = "UPDATE tb_users SET fotoPerfil = '$nomeAleatorio' WHERE idUser = $idUser";
            if ($conn_capybd->query($sql) === TRUE) {
                echo json_encode(array("status" => "sucesso"));
            } else {
                echo json_encode(array("status" => "erro", "mensagem" => "Erro ao atualizar o caminho da imagem na tabela tb_users"));
            }
        } else {
            echo json_encode(array("status" => "erro", "mensagem" => "Erro ao mover o arquivo"));
        }
    } else {
        echo json_encode(array("status" => "erro", "mensagem" => "Nenhum arquivo enviado ou erro no envio do arquivo"));
    }
}


$conn_capybd->close();
?>