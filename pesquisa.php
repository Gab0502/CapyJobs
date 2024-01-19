<!-- Solicitação de acesso única -->
<?php require("conexaobd.php");?>
<?php
	//Criar variável a receber valor para consulta com isset para verificação de nulidade
    if(isset($_GET['pesquisa'])){
		$pesquisa = $_GET['pesquisa'];
	};
	// Criação da consulta do BD
	$query_rs_pub = "SELECT * FROM tb_pub INNER JOIN tb_tags ON tb_pub.idTag = tb_tags.idTag WHERE tb_pub.ad = 1 AND tb_pub.title = "%$SP%" OR tb_pub.desc = "%$SP%" OR tb_pub.uf = "%$SP%" OR tb_pub.bairro = "%$SP%" OR tb_pub.cidade = "%$SP%" ORDER BY tb_pub.idPub DESC";
    
    //Executar a consulta
    $rs_pub = mysqli_query($conn_capybd, $query_rs_pub) or die(mysqli_error($conn_capybd));

    //Total de registros encontrados na consulta
    $totalRow_rs_pub = mysqli_num_rows($rs_pub);
    //echo($totalRow_rs_pub);

    //Obter UMA linha do resultado com array
    $row_rs_curso = mysqli_fetch_assoc($rs_pub);
    //echo($row_rs_pub["title"]);
    //echo($row_rs_pub["idPub"]);
?>