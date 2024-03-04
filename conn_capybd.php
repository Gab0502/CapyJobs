<?php
// Métodos de conexão com BD MySQLI, MySQL e PDO

/**/ // Barra de comentário para desativar conexão local
// Conexão localhost com Visual Studio Code
$hostname_conn_capybd = "localhost";
$database_conn_capybd = "capybd";
$username_conn_capybd = "root";
$password_conn_capybd = "";
// Criando a conexão usando as variáveis
$conn_capybd = mysqli_connect($hostname_conn_capybd, $username_conn_capybd, $password_conn_capybd, $database_conn_capybd) or trigger_error(mysqli_connect_errno(), E_USER_ERROR);
// Verificação de conexão
//echo("Conectado!");

/* 
// Conexão localweb com Visual Studio Code
$hostname_conn_capybd = "localhost";
$hostname_conn_capybd = "robb0463.publiccloud.com.br:3306";
$database_conn_capybd = "ctsdigital2011_bdcapys";
$username_conn_capybd = "ctsdi_capysbd";
$password_conn_capybd = "Capys2024!";
// Criando a conexão usando as variáveis
$conn_capybd = mysqli_connect($hostname_conn_capybd, $username_conn_capybd, $password_conn_capybd, $database_conn_capybd) or trigger_error(mysqli_connect_errno(), E_USER_ERROR);
mysqli_set_charset('utf-8')
// Verificação de conexão
//echo("Conectado!");
*/ // Barra de comentário para desativar conexão web