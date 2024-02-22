<?php
require("conn_capybd.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = '';

    // Verifica se os dados foram recebidos corretamente
    if (isset($_POST['valoresCampos'])) {
        $valoresCampos = $_POST['valoresCampos'];

        // Atribuir os valores aos respectivos campos
        $nome = $valoresCampos['nome'];
        $bio = $valoresCampos['bio'];
        $celular = $valoresCampos['celular'];
        $email = $valoresCampos['email'];
        $bairro = $valoresCampos['bairro'];
        $cidade = $valoresCampos['cidade'];
        $linkedin = $valoresCampos['linkedin'];
        $twitter = $valoresCampos['twitter'];
        $instagram = $valoresCampos['instagram'];
        $idUser = $_SESSION['idUser'];

        // Preparando a consulta SQL
        $sql = "UPDATE tb_users SET nome = ?, email = ?, bio = ?, linkedin = ?, twitter = ?, instagram = ?, bairro = ?, cidade = ? WHERE idUser = ?";

        // Preparando a declaração
        $stmt = mysqli_prepare($conn_capybd, $sql);

        // Vinculando parâmetros
        mysqli_stmt_bind_param($stmt, "ssssssssi", $nome, $email, $bio, $linkedin, $twitter, $instagram, $bairro, $cidade, $idUser);

        // Executando a declaração
        mysqli_stmt_execute($stmt);

        // Verificando se a atualização foi bem-sucedida
        $num_rows = mysqli_stmt_num_rows($stmt);
        if ($num_rows > 0) {
            // Atualização bem-sucedida
            $result = 'sucesso';
        } else {
            // Atualização falhou
            $result = 'erro';
        }
    } else {
        $result = 'dados não recebidos';
    }
        // Enviar uma resposta JSON de volta ao cliente
    echo json_encode(array("status" => $result));
}
?>
