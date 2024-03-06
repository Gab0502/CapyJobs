<?php require("conn_capybd.php");
session_start();

if (isset($_SESSION['username'])) {
    header('Location: feed-temp.php');
    exit();
};

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="manifest" href="pwa/manifest.json">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapyJobs - Entrar</title>
    <link rel="icon" href="images/favicon-16x16.png">
    <meta name="description" content="Entre com seu login">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <!-- Header -->
    <?php include("_header.php")?>
    <!-- login -->
    <!--FIM Header-->
    <main>
        <section class="container-fluid">
        
            <div class="row bg-branco">
                <div class="col-xl-6">
                    <div class="container-custom">
                        <h1 class="tittle">Precisando de um job?</h1>
                        <h2 class="subTittle">Entre agora</h2>
                        <form action='_login-form.php' method="post" class="form-login bg-verdeMedio" style="border-radius: 25px;">
                            <h3>Login</h3>
                            <input type="text" id="username" name="username" placeholder="EMAIL">
                            <h3>Senha</h3>
                            <input type="password" id="password" name="password" placeholder="SENHA">
                            <input type="submit" id="logar">
                            <div class="flex-generic" style=" margin-left: 50px;">
                                <hr class="bg-white" style="width: 35%;">
                                <h3 class="text-white">ou</h3>
                                <hr class="bg-white" style="width: 35%;">
                            </div>
                            <a href="cadastro.php" class="text-white">Não possui conta? cadastre-se agora</a>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <img src="images/Puppetshow-amico.png" class="img-grande" alt="imagem login">
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
  <?php include("_footer.php");?>
  <!-- FIM Footer -->
</body>

<script src="script.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>