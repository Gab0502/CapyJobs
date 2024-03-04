<?php
//Métodos de conexão com BD MySQLI, MySQL e PDO

/*
//Conexão localhost com Visual Studio Code
$hostname_conn_capybd = "localhost";
$database_conn_capybd = "capybd";
$username_conn_capybd = "root";
$password_conn_capybd = "";
//Criando a conexão usando as variáveis
$conn_capybd = mysqli_connect($hostname_conn_capybd, $username_conn_capybd, $password_conn_capybd, $database_conn_capybd) or trigger_error(mysqli_connect_errno(), E_USER_ERROR);

// Verificação de conexão
//echo("Conectado!");
//Barra de comentário para desativar conexão local
*/




//Conexão Locaweb
$hostname_conn_capybd = "robb0463.publiccloud.com.br:3306";
$database_conn_capybd = "ctsdigital2011_bdcapys";
$username_conn_capybd = "ctsdi_capysbd";
$password_conn_capybd = "Capys2024!";
//Criando a conexão usando as variáveis
$conn_capybd = mysqli_connect($hostname_conn_capybd, $username_conn_capybd, $password_conn_capybd, $database_conn_capybd) or trigger_error(mysqli_connect_errno(), E_USER_ERROR);




/*
//Barra de comentário para desativar conexão web
//Conexão LOCALWEB com Dreamweaver
/*$hostname_conn_capybd = "localhost";
$database_conn_capybd = "bd_ctec";
$username_conn_capybd = "root";
$password_conn_capybd = "";
//Criando a conexão usando as variáveis
$conn_capybd = mysqli_connect($hostname_conn_capybd, $username_conn_capybd, $password_conn_capybd, $database_conn_capybd) or trigger_error(mysqli_connect_errno(), e_user_error);
mysqli_set_charset('utf-8')
*/

// Verificação de conexão
//echo("Conectado!");

mysqli_set_charset($conn_capybd, 'utf8');
?>
