<?php 
require("conn_capybd.php");

?>
<?php 
$query_rs_pub = "SELECT * FROM tb_pub ORDER BY tb_pub.idPub ";

$rs_pub = mysqli_query($conn_capybd, $query_rs_pub);

$row_rs_pub = mysqli_fetch_assoc($rs_pub);

$totalRow_rs_pub = mysqli_num_rows($rs_pub);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Painel Administrativo do Site</title>
</head>

<body>
<img src="images/capivaraPadraoIcon.jpg" width="100" alt=""/>

<h1>Painel Administrativo do Site - Lista</h1>	
	
	
<table width="100%" border="0">
  <tbody>
    <tr>
      <td><strong>Excluir</strong></td>
      <td><strong>IdPub</strong></td>
      <td><strong>idUser</strong></td>
      <td><strong>ad</strong></td>
      <td><strong>tag</strong></td>
      <td><strong>titulo</strong></td>
      <td><strong>descriçao</strong></td>
      <td><strong>dia</strong></td>
      <td><strong>dataPub</strong></td>
      <td><strong>cep</strong></td>
      <td><strong>uf</strong></td>
      <td><strong>rua</strong></td>
      <td><strong>numero</strong></td>
      <td><strong>compremento</strong></td>
      <td><strong>bairro</strong></td>
      <td><strong>cidade</strong></td>
      <td><strong>midia1</strong></td>
    </tr>
	  
<!-- início do loop -->	 
<?php do {?> 	  
    <tr>
      <td>
		    <a href="adm_excluir_pub.php?idPub=<?php echo($row_rs_pub["idPub"])?>" onclick="return confirm('deseja realmente excluir? <?php echo($row_rs_pub['idPub'])?>')">
		    <img src="images/adm/delete.gif" width="20" height="20" alt=""/>
		  </a>
	  </td>
      <td><?php echo($row_rs_pub['idPub']); ?></td>
      <td><?php echo($row_rs_pub['idUser']); ?></td>
      <td><?php echo($row_rs_pub['ad']); ?></td>
      <td><?php echo($row_rs_pub['tag']); ?></td>
      <td><?php echo($row_rs_pub['titulo']); ?></td>
      <td><?php echo($row_rs_pub['descricao']); ?></td>
      <td><?php echo($row_rs_pub['dia']); ?></td>
      <td><?php echo($row_rs_pub['dataPub']); ?></td>
      <td><?php echo($row_rs_pub['cep']); ?></td>
      <td><?php echo($row_rs_pub['uf']); ?></td>
      <td><?php echo($row_rs_pub['rua']); ?></td>
      <td><?php echo($row_rs_pub['numero']); ?></td>
      <td><?php echo($row_rs_pub['comp']); ?></td>
      <td><?php echo($row_rs_pub['bairro']); ?></td>
      <td><?php echo($row_rs_pub['cidade']); ?></td>
      <td><img src="images/<?php echo($row_rs_pub['midia1']);?>" width=50 ></td>
      <td colspan="10"><hr></td>
    </tr>
   <?php } while($row_rs_pub = mysqli_fetch_assoc($rs_pub));?>
   </tbody>
</table>

</body>
</html>