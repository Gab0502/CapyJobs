<?php 
require("conn_capybd.php");
session_start();
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ad = isset($_POST['ad']) && $_POST['ad'] == 'on' ? 1 : 0;
    $descricao = $_POST['pubText'];
    $tags = $_POST['tags'];
    $titulo = $_POST['titulo'];
    $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
    $dia = $_POST['data'];
    $num = $_POST['numero'];

    if (!empty($cep)) {
        $api_url = "https://viacep.com.br/ws/" . $cep . "/json";
        $options = [
            'http' => [
                'header' => "Content-type: application/json\r\n",
                'method' => 'GET',
            ],
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($api_url, false, $context);

        if ($response !== false) {
            $data = json_decode($response, true);
        } else {
            echo "Erro na requisição do CEP.";
            exit;
        }
    }

    if (isset($_FILES['upload-photo']) && $_FILES['upload-photo']['error'] === UPLOAD_ERR_OK) {
        $nomeOriginal = $_FILES['upload-photo']['name'];
        $tipoArquivo = $_FILES['upload-photo']['type'];
        $tamanhoArquivo = $_FILES['upload-photo']['size'];
        $nomeTemporario = $_FILES['upload-photo']['tmp_name'];

        $nomeAleatorio = uniqid() . '_' . $nomeOriginal;
        $diretorioDestino = 'images/';

        $caminhoCompleto = $diretorioDestino . $nomeAleatorio;
        if (move_uploaded_file($nomeTemporario, $caminhoCompleto)) {
            if ($ad && !empty($cep)) {
                $sql = "INSERT INTO tb_pub (idUser, ad, tag, titulo, descricao, dia, cep, uf, rua, numero, comp, bairro, cidade, midia1) VALUES 
                ('{$_SESSION['idUser']}', '$ad', '$tags', '$titulo', '$descricao', '$dia', '$cep', '{$data['uf']}', '{$data['logradouro']}', '$num', '{$data['complemento']}', '{$data['bairro']}', '{$data['localidade']}', '$nomeAleatorio')";
                $stmt = $conn_capybd->query($sql);
            } else {
                $fill = '';
                $sql = "INSERT INTO tb_pub (idUser, ad, tag, titulo, descricao, dia, cep, uf, rua, numero, comp, bairro, cidade, midia1) VALUES 
                ('{$_SESSION['idUser']}', '$ad', '$tags', '$titulo', '$descricao', '$dia', '$fill', '{$_SESSION['UF']}', '$fill', '$num', '$fill', '$fill', '$fill', '$nomeAleatorio')";
                $stmt = $conn_capybd->query($sql);
            }
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        $nomeAleatorio = '';
        if ($ad && !empty($cep)) {
            $sql = "INSERT INTO tb_pub (idUser, ad, tag, titulo, descricao, dia, cep, uf, rua, numero, comp, bairro, cidade, midia1) VALUES 
            ('{$_SESSION['idUser']}', '$ad', '$tags', '$titulo', '$descricao', '$dia', '$cep', '{$data['uf']}', '{$data['logradouro']}', '$num', '{$data['complemento']}', '{$data['bairro']}', '{$data['localidade']}', '$nomeAleatorio')";
            $stmt = $conn_capybd->query($sql);
        } else {
            $fill = '';
            $sql = "INSERT INTO tb_pub (idUser, ad, tag, titulo, descricao, dia, cep, uf, rua, numero, comp, bairro, cidade, midia1) VALUES 
            ('{$_SESSION['idUser']}', '$ad', '$tags', '$titulo', '$descricao', '$dia', '$fill', '{$_SESSION['UF']}', '$fill', '$num', '$fill', '$fill', '$fill', '$nomeAleatorio')";
            $stmt = $conn_capybd->query($sql);
        }
    }
}
$conn_capybd->close();
header('Location: feed-temp.php');
exit(); 


?>