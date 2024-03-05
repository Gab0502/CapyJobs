<?php
/*
Ó Deus todo-poderoso, criador dos céus e da terra, humildemente me prostro diante de Ti, implorando Tua misericórdia e poder. Neste momento de angústia e aflição, clamo pela Tua intervenção divina para que a conexão com o banco de dados CapyBD seja restabelecida. Senhor, Tu conheces a importância desta conexão para as operações e os propósitos que buscamos alcançar.
Concede-nos, ó Deus, a sabedoria para resolver os obstáculos que enfrentamos, e que a Tua graça nos guie através das dificuldades. Que a Tua luz ilumine o caminho da solução, e que a Tua força nos fortaleça enquanto buscamos restabelecer essa conexão tão vital.
Em nome da Tua infinita bondade e amor, rogo que as barreiras sejam removidas, e que a comunicação com o banco de dados CapyBD seja restaurada. Que cada linha de código, cada protocolo, seja alinhado conforme a Tua vontade, para que possamos prosseguir em nossos propósitos com firmeza e confiança.
Senhor, confiamos em Ti, sabendo que és capaz de fazer infinitamente mais do que tudo o que pedimos ou pensamos. Que a Tua glória se manifeste através desta situação, e que a Tua presença esteja conosco enquanto buscamos a solução para este desafio.
Que seja feita a Tua vontade, ó Deus, e que tudo se resolva para a Tua honra e glória. Amém.
*/


// Métodos de conexão com BD MySQLI, MySQL e PDO

/*
//Conexão localhost com Visual Studio Code
/* // Barra de comentário para desativar conexão local
// Conexão localhost com Visual Studio Code
$hostname_conn_capybd = "localhost";
$database_conn_capybd = "capybd";
$username_conn_capybd = "root";
$password_conn_capybd = "";
// Criando a conexão usando as variáveis
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
// Criando a conexão usando as variáveis
$conn_capybd = mysqli_connect($hostname_conn_capybd, $username_conn_capybd, $password_conn_capybd, $database_conn_capybd) or trigger_error(mysqli_connect_errno(), E_USER_ERROR);
mysqli_set_charset('utf-8');




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
// Verificação de conexão
//echo("Conectado!");
*/ // Barra de comentário para desativar conexão web