<?php 
//Métodos de conexão com o BD mysqli, mysql e pdo

$hostname_conn_bd_ctec = "localhost";
$database_conn_bd_ctec = "capybd";
$username_conn_bd_ctec = "root";
$password_conn_bd_ctec = "";

$conn_bd_ctec = mysqli_connect
($hostname_conn_bd_ctec, $username_conn_bd_ctec, $password_conn_bd_ctec, $database_conn_bd_ctec)
	or trigger_error(mysqli_connect_errno(),e_user_error);

//criar a consulta com o BD
// o conteúdo da página deverá vir da da consulta ao Bd
$query_rs_curso = "SELECT * FROM tb_users INNER JOIN tb_tb_pub ON tb_users.idUser = tb_pub.idUser ORDER BY tb_pub.idPub DESC";

//Executar a consulta
$rs_curso = mysqli_query($conn_bd_ctec,$query_rs_curso) or die (mysqli_error($conn_bd_ctec));

//total de registros encontrados na consulta
$totalRow_rs_cursos = mysqli_num_rows($rs_curso);
echo($totalRow_rs_cursos);


//obeter UMA LINHA do resultado como ARRAY
$row_rs_cursos = mysqli_fetch_assoc($rs_curso);
//echo($row_rs_cursos["titulo"]);
//echo($row_rs_cursos["idCurso"]);






?>
