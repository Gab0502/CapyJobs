<?php require("conn_capybd.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapyJobs - Entrar</title>
    <meta name="description" content="Entre com seu login">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <!-- Header -->
    <?php include("_header.php")?>
    <!-- login -->
    <?php
        print_r($_SESSION);
        if (isset($_SESSION['username'])) {
            header('Location: feed.html');
            exit();
        };

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = "SELECT * FROM tb_users WHERE email = ? AND senha = ?"; 
            $stmt = $conn_capybd->prepare($login);
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();
            $result=$stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $idUsuario = $row['idUser'];
                $_SESSION['idUser'] = $row['idUser'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['bio'] = $row['bio'];
                $_SESSION['profilePic'] = $row['fotoPerfil'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['UF'] = $row['UF'];



                header('Location: feed-temp.php');  // Redirecionar para a página após o login
                exit(); 
            }
        }
    ?>
    <!--FIM Header-->
    <main>
        <section class="container-fluid">
        
            <div class="row bg-branco">
                <div class="col-xl-6">
                    <div class="container-custom">
                        <h1 class="tittle">Precisando de um job?</h1>
                        <h2 class="subTittle">Entre agora</h2>
                        <form onsubmit="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-login bg-verdeMedio" style="border-radius: 25px;">
                            <h3>Login</h3>
                            <input type="text" id="username" name="username" placeholder="EMAIL">
                            <h3>Senha</h3>
                            <input type="password" id="password" name="password" placeholder="SENHA">
                            <input type="submit">
                            <div class="flex-generic" style=" margin-left: 50px;">
                                <hr class="bg-white" style="width: 35%;">
                                <h3 class="text-white">ou</h3>
                                <hr class="bg-white" style="width: 35%;">
                            </div>
                            <a href="/cadastro.html" class="text-white">Não possui conta? cadastre-se agora</a>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <img src="images/Puppet show-amico.png" class="img-grande" width="50%" alt="">
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
  <?php include("_footer.php");?>
  <!-- FIM Footer -->
</body>
<script src="script-login.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>