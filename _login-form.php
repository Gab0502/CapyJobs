<?php
require("conn_capybd.php");
session_start();
var_dump($password);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST[ 'username'];
            $password = md5($_POST['password'].'#capy');
            var_dump($password);

            $login = "SELECT * FROM tb_users WHERE email = ? AND senha = ?"; 
            $stmt = $conn_capybd->prepare($login);
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();
            $result=$stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $idUsuario = $row['idUser'];
                $_SESSION['idUser'] = $row['idUser'];
                $_SESSION['name'] = $row['nome'];
                $_SESSION['bio'] = $row['bio'];
                $_SESSION['profilePic'] = $row['fotoPerfil'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['UF'] = $row['UF'];



                header('Location: feed-temp.php');  // Redirecionar para a página após o login
                exit(); 
            }else{
                echo "<script>alert('Login e/ou senha não encontrados');
                window.location.href = 'login.php';</script>";
                exit();
            }
        }
    ?>