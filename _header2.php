<header>
<nav class="navbar navbar-expand navbar-light bg-verdeEscuro">
  <a href="feed-temp.php" title="feed"><img src="images/logofull.png" alt="icone capyjobs" width="350" title="feed" id="capyIcon"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item ">
        <a class="nav-link" style="color: #ffff;" aria-current="page" href="feed-vaga.php" title="jobs">Jobs</a>
    </li>
    
<?php if(isset($_SESSION['email']) && strpos($_SESSION['email'], '@capivarias') !== false): ?>
  <li class='nav-item'>
      <a class='nav-link active' style='color: #ffff;' aria-current='page' href='adm.php' title="administrativo">ADMIN</a>
  </li>
<?php endif; ?>

</ul>
<?php if(isset($_SESSION['idUser'])):?>
    <details>
        <summary><img src="images/<?php echo($_SESSION['profilePic']) ?>" alt="<?php echo($_SESSION['name']);?>" class="iconNav"></summary>
        <a href="perfil.php?idUser=<?php echo($_SESSION['idUser'])?>" class="nav-link" style="color: #ffff;" title="<?php echo($_SESSION['name']);?>">Perfil</a>
        <a href="_logout.php" class="nav-link" style="color: #dc3545" title="logout" >logout</a>
    </details>
<?php else: ?>
    <a href="login.php" class="nav-link" style="color: #dc3545;" title="login" >Faça login agora!</a>
<?php endif; ?>

   <form action="pesquisa.php" method="get" id="form-pesquisa" class="flex-generic">
        <input name = "pesquisa" id = "pesquisa "class="form-header me-2" type="search" placeholder="Procurar" aria-label="Search" requered>
        <button class="btn btn-success disabled1" type="submit" title="busca" >Buscar</button>
    </form>
  </div>
</nav>
<script src="responsividade\script-Icon.js"></script>
</header>