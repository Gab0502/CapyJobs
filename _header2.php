<!DOCTYPE html>

<?php require("conn_capybd.php");
session_start();

if (isset($_SESSION['username'])) {
    header('Location: feed.html');
    exit();
};

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed-Pesquisa</title>
    
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="lightbox2/dist/css/lightbox.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-responsive.css">
    
</head>
<body>
<header>
<nav class="navbar navbar-expand navbar-light bg-verdeEscuro">
  <a class="" href="#"><img src="images/logo.png" alt="" width="250px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav mr-auto">

    <?php 
    if (strpos($_SESSION['email'], '@capivarias') !== false) {
        echo " <li class='nav-item'>
        <a class='nav-link active' style='color: #ffff;' aria-current='page' href='adm.php'>ADMIN</a>
                </li>";
    }
    ?>
   </ul>
    <details >
        <summary><img src="images/<?php echo($_SESSION['profilePic'])  ?>" alt="" class="iconNav"></summary>
        <a href="perfil.php?idUser=<?php echo($_SESSION['idUser'])?>" class="nav-link" style="color: #ffff;">Perfil</a>
        <a href="_logout.php" class="nav-link" style="color: #dc3545">logout</a>
    </details>
   <form action="pesquisa.php" method="get" id="form-pesquisa" class="flex-generic">
                        <input name = "pesquisa" id = "pesquisa "class="form-header me-2" type="search" placeholder="Procurar" aria-label="Search" requered>
                        <button class="btn btn-success" type="submit">Buscar</button>
    </form>
  </div>
</nav>
</header>
</body>
</html>