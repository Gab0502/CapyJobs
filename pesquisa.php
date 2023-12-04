<?php
    if(isset($_GET['pesquisa'])){
        $pesquisa = $_GET['pesquisa'];
        $query_vaga = "SELECT * FROM tb_pub INNER JOIN tb_tags ON tb_pub.idTag = tb_tags.idTag WHERE tb_pub.ad = 1 AND title LIKE '%$pesquisa%' OR tag LIKE '%$pesquisa%' ORDER BY tb_pub.idPub DESC";
        $resultado = $conn_capybd->query($query_vaga);
        echo($resultado);
    }
?>