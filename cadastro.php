<?php require("conexaoCapybd.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapyJobs - Cadastro</title>
    <meta name="description" content="x">
	<meta name="keywords" content="x">
    <?php include("_headComum.php")?>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="index.old.html"><img src="images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse center" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorias
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Bandas</a>
                    <a class="dropdown-item" href="#">Entreterimento</a>
                    <a class="dropdown-item" href="#">Decoração</a>
                  </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.html">CADASTRE-SE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.html">LOGIN</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    <main>
        <section class="container-fluid">
        
            <div class="row bg-branco">
                <div class="col-xl-6">
                    <div class="container-custom ">
                        <h1 class="tittle">Apenas mais alguns clicks...</h1>
                        <form onsubmit="cadastro(); return false" class="form-login bg-verdeMedio" style="border-radius: 25px;">
                            <input type="text" id="nome" placeholder="NOME">
                            <input type="text" id="email" placeholder="EMAIL" style="width: 84%;">
                            <input type="password" id="senha" placeholder="SENHA" style="width: 84%;">
                            <div class="flex-generic">
                                <input type="text" placeholder="CEP" id="cep" style="width: 65%;">
                                <input type="text" placeholder="N°" style="width: 15%;">
                            </div>
                            <input type="text" placeholder="CCOMPLEMENTO" id="CCOMPLEMENTO">
                            
                            <input type="submit">
                        </form>

                    </div>
                </div>
               
                <div class="col-xl-6">
                    <img src="/images/Puppet show-amico.png" class="img-grande" width="50%" alt="">
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