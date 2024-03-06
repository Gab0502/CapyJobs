<header>
<nav class="navbar navbar-expand navbar-light bg-verdeEscuro">
  <a class="" href="feed-temp.php"><img src="images/capyIcon.png" alt="" width="100px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item ">
        <a class="nav-link" style="color: #ffff;" aria-current="page" href="feed-vaga.php">Jobs</a>
    </li>
    
<?php if(isset($_SESSION['email']) && strpos($_SESSION['email'], '@capivarias') !== false): ?>
  <li class='nav-item'>
      <a class='nav-link active' style='color: #ffff;' aria-current='page' href='adm.php'>ADMIN</a>
  </li>
<?php endif; ?>

</ul>
<?php if(isset($_SESSION['idUser'])):?>
    <details>
        <summary><img src="images/<?php echo($_SESSION['profilePic']) ?>" alt="" class="iconNav"></summary>
        <a href="perfil.php?idUser=<?php echo($_SESSION['idUser'])?>" class="nav-link" style="color: #ffff;">Perfil</a>
        <a href="_logout.php" class="nav-link" style="color: #dc3545">logout</a>
    </details>
<?php else: ?>
    <a href="login.php" class="nav-link" style="color: #dc3545;">Faça login agora!</a>
<?php endif; ?>

   <form action="pesquisa.php" method="get" id="form-pesquisa" class="flex-generic">
        <input name = "pesquisa" id = "pesquisa "class="form-header me-2" type="search" placeholder="Procurar" aria-label="Search" requered>
        <button class="btn btn-success disabled1" type="submit">Buscar</button>
    </form>
  </div>
</nav>
</header>