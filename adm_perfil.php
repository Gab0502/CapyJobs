<?php 
require("conn_capybd.php");

?>
<?php 

$query_rs_perf = "SELECT * FROM tb_users ORDER BY tb_users.idUser";

$rs_perf = mysqli_query($conn_capybd, $query_rs_perf);

$row_rs_perf = mysqli_fetch_assoc($rs_perf);

$totalRow_rs_perf = mysqli_num_rows($rs_perf);

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
      <td><strong>idUser</strong></td>
      <td><strong>nome</strong></td>
      <td><strong>banner</strong></td>
      <td><strong>foto de perfil</strong></td>
      <td><strong>email</strong></td>
      <td><strong>senha</strong></td>
      <td><strong>bio</strong></td>
      <td><strong>linkedin</strong></td>
      <td><strong>twitter</strong></td>
      <td><strong>instagram</strong></td>
      <td><strong>cep</strong></td>
      <td><strong>uf</strong></td>
      <td><strong>rua</strong></td>
      <td><strong>numero</strong></td>
      <td><strong>compremento</strong></td>
      <td><strong>bairro</strong></td>
      <td><strong>cidade</strong></td>
      <td><strong>cpf ou cnpj</strong></td>

    </tr>
	  
<!-- início do loop -->	  	
<?php do {?>   
    <tr>
      <td>
		  <a href="adm_excluir_perfil.php?idUser=<?php echo($row_rs_perf["idUser"])?>" onclick="return confirm('deseja realmente excluir? <?php echo($row_rs_perf['idUser'])?>')">
		  <img src="images/adm/delete.gif" width="20" height="20" alt=""/>
		</a>
	</td>




	</td>
      <td><?php echo($row_rs_perf['idUser']); ?></td>
      <td><?php echo($row_rs_perf['nome']); ?></td>
      <td><img src="images/<?php echo($row_rs_perf['banner']);?>" width=50 ></td>
      <td><img src="images/<?php echo($row_rs_pub['fotoPerfil']);?>" width=50 ></td>
      <td><?php echo($row_rs_perf['email']); ?></td>
      <td><?php echo($row_rs_perf['senha']); ?></td>
      <td><?php echo($row_rs_perf['celular']); ?></td>
      <td><?php echo($row_rs_perf['bio']); ?></td>
      <td><?php echo($row_rs_perf['linkedin']); ?></td>
      <td><?php echo($row_rs_perf['twitter']); ?></td>
      <td><?php echo($row_rs_perf['instagram']); ?></td>
      <td><?php echo($row_rs_perf['cep']); ?></td>
      <td><?php echo($row_rs_perf['uf']); ?></td>
      <td><?php echo($row_rs_perf['rua']); ?></td>
      <td><?php echo($row_rs_perf['numero']); ?></td>
      <td><?php echo($row_rs_perf['comp']); ?></td>
      <td><?php echo($row_rs_perf['bairro']); ?></td>
      <td><?php echo($row_rs_perf['cidade']); ?></td>
      <td><?php echo($row_rs_perf['cpf_cnpj']); ?></td>
     
      <?php } while($row_rs_perf = mysqli_fetch_assoc($rs_perf));?>
   </tbody>
</table>

   
</body>
</html>