<?php require("conn_capybd.php");

$query_rs_perf = "SELECT * FROM tb_users ORDER BY tb_users.idUser";

$rs_perf = mysqli_query($conn_capybd, $query_rs_perf);

$row_rs_perf = mysqli_fetch_assoc($rs_perf);

//$totalRow_rs_perf = mysqli_num_rows($rs_perf);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CapyJobs - ADM Usuários</title>
</head>

<body>
<img src="images/capivaraPadraoIcon.jpg" width="100" alt=""/>
<h1>Painel Administrativo - Lista de Usuários</h1>
<a src="adm.php">Voltar</a>
<br><br><br>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td><strong>Excluir</strong></td>
      <td><strong>User ID</strong></td>
      <td><strong>Nome</strong></td>
      <td><strong>Banner</strong></td>
      <td><strong>Foto de Perfil</strong></td>
      <td><strong>Email</strong></td>
      <td><strong>Senha</strong></td>
      <td><strong>Contato</strong></td>
      <td><strong>Bio</strong></td>
      <td><strong>Linkedin</strong></td>
      <td><strong>Twitter</strong></td>
      <td><strong>Instagram</strong></td>
      <td><strong>CEP</strong></td>
      <td><strong>UF</strong></td>
      <td><strong>Rua</strong></td>
      <td><strong>Número</strong></td>
      <td><strong>Compremento</strong></td>
      <td><strong>Bairro</strong></td>
      <td><strong>Cidade</strong></td>
      <td><strong>CPF</strong></td>
    </tr>
	  
    <!-- INÍCIO do Loop -->	  	
    <?php do {?>   
      <tr>
        <td>
          <a href="adm_excluir_perfil.php?idUser=<?php echo($row_rs_perf["idUser"])?>" onclick="return confirm('deseja realmente excluir? <?php echo($row_rs_perf['idUser'])?>')">
            <img src="images/adm/delete.gif" width="20" height="20" alt=""/>
          </a>
        </td>
      </tr>
      <td><?php echo($row_rs_perf['idUser']);?></td>
      <td><?php echo($row_rs_perf['nome']);?></td>
      <td><img src="images/<?php echo($row_rs_perf['banner']);?>" width=50 ></td>
      <td><img src="images/<?php echo($row_rs_pub['fotoPerfil']);?>" width=50 ></td>
      <td><?php echo($row_rs_perf['email']);?></td>
      <td><?php echo($row_rs_perf['senha']);?></td>
      <td><?php echo($row_rs_perf['celular']);?></td>
      <td><?php echo($row_rs_perf['bio']);?></td>
      <td><?php echo($row_rs_perf['linkedin']);?></td>
      <td><?php echo($row_rs_perf['twitter']);?></td>
      <td><?php echo($row_rs_perf['instagram']);?></td>
      <td><?php echo($row_rs_perf['cep']);?></td>
      <td><?php echo($row_rs_perf['uf']);?></td>
      <td><?php echo($row_rs_perf['rua']);?></td>
      <td><?php echo($row_rs_perf['numero']);?></td>
      <td><?php echo($row_rs_perf['comp']);?></td>
      <td><?php echo($row_rs_perf['bairro']);?></td>
      <td><?php echo($row_rs_perf['cidade']);?></td>
      <td><?php echo($row_rs_perf['cpf_cnpj']);?></td>
      
    <?php } while($row_rs_perf = mysqli_fetch_assoc($rs_perf));?>
    <!-- FIM do Loop -->
  </tbody>
</table>
</body>
</html>