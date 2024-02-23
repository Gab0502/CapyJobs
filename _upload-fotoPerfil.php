<?php 
require("conn_capybd.php");
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUser = $_SESSION['idUser']; // ID do usuário da sessão

    // Verifica se um arquivo foi enviado corretamente
    if (isset($_FILES['upload-photo']) && $_FILES['upload-photo']['error'] === UPLOAD_ERR_OK) {
        // Verifica o tipo de arquivo enviado
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        $temp = explode('.', $_FILES['upload-photo']['name']);
        $extension = strtolower(end($temp));
        
        if (!in_array($extension, $allowedExtensions)) {
            echo json_encode(array("status" => "error", "message" => "Apenas arquivos JPG, JPEG, PNG e GIF são permitidos."));
            exit();
        }

        // Gera um nome único para a imagem
        $nomeAleatorio = uniqid('', true) . '_' . $_FILES['upload-photo']['name'];
        $diretorioDestino = 'images/';
        $caminhoCompleto = $diretorioDestino . $nomeAleatorio;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES['upload-photo']['tmp_name'], $caminhoCompleto)) {
            // Prepara a declaração SQL usando declarações preparadas para evitar injeção de SQL
            $sql = "UPDATE tb_users SET fotoPerfil = ? WHERE idUser = ?";
            $stmt = $conn_capybd->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("si", $nomeAleatorio, $idUser);
                if ($stmt->execute()) {
                    echo json_encode(array("status" => "success"));
                } else {
                    echo json_encode(array("status" => "error", "message" => "Erro ao executar a atualização da imagem."));
                }
                $stmt->close();
            } else {
                echo json_encode(array("status" => "error", "message" => "Erro ao preparar a declaração SQL."));
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Erro ao mover o arquivo para o diretório de destino."));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Nenhum arquivo enviado ou erro no envio do arquivo."));
    }
}

$conn_capybd->close();
?>
