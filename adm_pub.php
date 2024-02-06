<?php require("conn_capybd.php");
 
$query_rs_pub = "SELECT * FROM tb_pub ORDER BY tb_pub.idPub ";

$rs_pub = mysqli_query($conn_capybd, $query_rs_pub);

$row_rs_pub = mysqli_fetch_assoc($rs_pub);

//$totalRow_rs_pub = mysqli_num_rows($rs_pub);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CapyJobs - ADM Publicações</title>
</head>

<body>
<img src="images/capivaraPadraoIcon.jpg" width="100" alt=""/>
<h1>Painel Administrativo - Lista de Publicações</h1>

<table width="100%" border="0">
  <tbody>
    <tr>
      <td><strong>Excluir</strong></td><hr>
      <td><strong>Pub ID</strong></td><hr>
      <td><strong>User ID</strong></td><hr>
      <td><strong>AD?</strong></td><hr>
      <td><strong>Tag</strong></td><hr>
      <td><strong>Título</strong></td><hr>
      <td><strong>Descrição</strong></td><hr>
      <td><strong>Data (AD)</strong></td><hr>
      <td><strong>Data (Pub)</strong></td><hr>
      <td><strong>CEP</strong></td><hr>
      <td><strong>UF</strong></td><hr>
      <td><strong>Rua</strong></td><hr>
      <td><strong>Número</strong></td><hr>
      <td><strong>Compremento</strong></td><hr>
      <td><strong>Bairro</strong></td><hr>
      <td><strong>Cidade</strong></td><hr>
      <td><strong>Poster</strong></td><hr>
    </tr>
	  
    <!-- INÍCIO do Loop -->	 
    <?php do {?>
      <tr>
        <td>
          <a href="adm_excluir_pub.php?idPub=<?php echo($row_rs_pub["idPub"])?>" onclick="return confirm('deseja realmente excluir? <?php echo($row_rs_pub['idPub'])?>')">
            <img src="images/adm/delete.gif" width="20" height="20" alt=""/>
          </a>
        </td>
        <td><?php echo($row_rs_pub['idPub']);?></td>
        <td><?php echo($row_rs_pub['idUser']);?></td>
        <td><?php echo($row_rs_pub['ad']);?></td>
        <td><?php echo($row_rs_pub['tag']);?></td>
        <td><?php echo($row_rs_pub['titulo']);?></td>
        <td><?php echo($row_rs_pub['descricao']);?></td>
        <td><?php echo($row_rs_pub['dia']);?></td>
        <td><?php echo($row_rs_pub['dataPub']);?></td>
        <td><?php echo($row_rs_pub['cep']);?></td>
        <td><?php echo($row_rs_pub['uf']);?></td>
        <td><?php echo($row_rs_pub['rua']);?></td>
        <td><?php echo($row_rs_pub['numero']);?></td>
        <td><?php echo($row_rs_pub['comp']);?></td>
        <td><?php echo($row_rs_pub['bairro']);?></td>
        <td><?php echo($row_rs_pub['cidade']);?></td>
        <td><img src="images/<?php echo($row_rs_pub['midia1']);?>" width=50 ></td>
        <td colspan="10"><hr></td>
      </tr>
    <?php } while($row_rs_pub = mysqli_fetch_assoc($rs_pub));?>
    <!-- FIM do Loop -->
  </tbody>
</table>

</body>
</html>