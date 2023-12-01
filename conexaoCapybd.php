<?php
//Métodos de conexão com BD MySQLI, MySQL e PDO

//Conexão localhost com Dreamweaver
$hostname_conn_capybd = "localhost:85";
$database_conn_capybd = "capybd";
$username_conn_capybd = "root";
$password_conn_capybd = "";
//Criando a conexão usando as variáveis
$conn_capybd = mysqli_connect($hostname_conn_capybd, $username_conn_capybd, $password_conn_capybd, $database_conn_capybd) or trigger_error(mysqli_connect_errno(), e_user_error);

// Verificação de conexão
//echo("Conectado!");
?>
