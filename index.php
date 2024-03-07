<?php require("conn_capybd.php");

$topusers = "SELECT u.idUser, u.nome, u.fotoPerfil, u.bio, COUNT(s.idSeg) AS num_seg 
FROM tb_users u 
LEFT JOIN tb_seg s ON u.idUser = s.idSeg1 
GROUP BY u.idUser 
ORDER BY num_seg DESC 
LIMIT 4;
";
$topusers_exe = mysqli_query($conn_capybd, $topusers) or die(mysqli_error($conn_capybd));

$minifeed = "SELECT p.idPub, p.tag, p.titulo, p.descricao, u.idUser, u.nome, u.fotoPerfil, COUNT(l.idLike) AS num_likes 
FROM tb_pub p 
INNER JOIN tb_users u ON p.idUser = u.idUser 
LEFT JOIN tb_likes l ON p.idPub = l.idPub 
GROUP BY p.idPub 
ORDER BY num_likes DESC 
LIMIT 3 ;
";
$minifeed_exe = mysqli_query($conn_capybd, $minifeed) or die(mysqli_error($conn_capybd));

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<link rel="manifest" href="pwa/manifest.json">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta name="keywords" content="Rede Social, vagas, trabalho, freelancer, free-lancer, eventos">
  <meta name="author" content="CapyCorps">
  <meta name="publisher" content="Professor Sandromir Almeida">
  <meta name="robots" content="index,follow">
  <meta name="description" content="Capyjobs, o site ideal para buscar oportunidades ou profissionais">
  <link rel="manifest" href="manifest.webmanifest">

  <title>CapyJobs - Seu Site de Eventos</title>
  <link rel="icon" href="images/favicon-16x16.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style-login.css">
  <link rel="stylesheet" href="style-responsive.css">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
  <link rel="stylesheet" href="style-animation.css">
</head>

<body>
  <?php include("_header.php");?>
  <main>
    <section class="image-fluid bg-verdeMedio">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-6 form-pesquisa" id="banner1">
            <form action="pesquisa.php" method="get" class="form-pesquisa-input">
              <input type="text" placeholder="    Pesquise por uma vaga ou prestador de serviço:" name="pesquisa"
                id="barradepesquisa">
              <button type="submit" class='disabled1'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                  viewBox="0 0 16 16">
                  <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
              </button>
              <br><br>
              <div class="input-buttons">
                <h3 style="color: white">Relevantes: </h3>
                <button class="buttons">Bandas</button>
                <button class="buttons">Cozinha</button>
                <button class="buttons">Brinquedos</button>
              </div>
            </form>
          </div>
          <div class="col-xl-6 bg-verdeClaro" id="banner2">
            <img src="images/banner.png" id="bannerDisabled" style="margin-left:-15px; width:90%;" alt="banner CapyJobs" title="banner CapyJobs">
          </div>
        </div>
      </div>
    </section>

    <div class="faixa bg-bege"></div> <!-- NÃO ALTERAR LINHA! (apenas estilo) -->

    <section>
      <h1 style="margin-left:55px; margin-top: 15px;" class="fonteIndex">Procurando por...</h1>
      <div class="flex-cards">
        <?php while ($topusers_row = mysqli_fetch_assoc($topusers_exe)) { ?>
          
            <div class="card">
                <img src="images/<?php echo($topusers_row['fotoPerfil']) ?>" alt="Foto de perfil de <?php echo ($topusers_row['nome']) ?>." title="Foto de perfil de <?php echo ($topusers_row['nome'])?>.">
                <p><?php echo ($topusers_row['nome']); ?></p>
                <P><?php echo ($topusers_row['bio']); ?></P>
            </div>
        <?php } ?>
    </div>

      </section>
      <div class="flex-cards" id='mini-feed'>
        <?php while($minifeed_row = mysqli_fetch_assoc($minifeed_exe)){ ?>
        <div class="col-xl-3">
        <section class="feed">
          <div class="">
            <div  style="align-items: center;">
              <div class="post-user-name pub-perfil">
                <img src="images/<?php echo($minifeed_row['fotoPerfil']) ?>" alt="Foto de perfil do usuário." width="5" title="Foto de perfil de <?php echo ($minifeed_row['nome'])?>.">
                <h5><?php echo($minifeed_row['nome']);?></h5>
              </div>
              <div class="post-content">
                <h6 class="tags"><?php echo($minifeed_row['tag']);?></h6>
              </div>
              <p><?php echo($minifeed_row['titulo']);?></p>
            </div>
              <p> <?php echo($minifeed_row['descricao']);?></p>
          </div>
          </section>
        </div>
        <?php }?>
        </div>

    <section>
      <div class="container-fluid bullet-points">
        <div class="row">
          <div class="col-xl-6">
            <div class="texto divisao">
              <h1 class="fonteIndex centrarAo">
                seja bem vindo
              </h1>

            </div>
            <div class="caixa-flex">
              <div class="caixa1">
                <div class="box">
                  <img src="images/jazzband-amico.png" alt="svg banda" title="svg banda">
                </div>
                <div class="box">
                  <img src="images/femalechef-pana.png" class="disabled1" alt="svg chefe" title="svg chefe">
                </div>
              </div>
              <div class="caixa1">
                <div class="box">
                  <img src="images/pastrychef-pana.png" class="disabled2" alt="svg chefe" title="svg chefe">
                </div>
                <div class="box">
                  <img src="images/Puppetshow-amico.png" class="disabled2" alt="svg show de bonecos" title="svg show de bonecos">
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 fonteIndex">
            <div class="divisao">
              <h2>Oportunidades no Mundo do Entretenimento</h2>

              <h3>Acesso a uma ampla gama de oportunidades emocionantes na indústria do entretenimento e eventos,
                incluindo colaborações com músicos, organizadores de eventos e talentos criativos.</h3>
              <h2>Pesquisa Fácil e Eficaz</h2>

              <h3>Recursos avançados de pesquisa e filtros que permitem encontrar rapidamente o talento ou as
                oportunidades certas para seus projetos, economizando tempo e esforço.</h3>
              <h2>Perfil Personalizado</h2>

              <h3>A capacidade de criar um perfil personalizado para mostrar suas habilidades, experiência e paixão,
                permitindo que as oportunidades venham até você, se você é um talento em busca de visibilidade.</h3>
              <h2>Conexões Significativas</h2>

              <h3>Uma plataforma que facilita a criação de conexões significativas com artistas, bandas, organizadores
                de eventos e profissionais da indústria, ampliando suas redes e possibilidades.</h3>
              <h2>Sucesso na Indústria do Entretenimento</h2>

              <h3>Compromisso em ajudar os membros a alcançar o sucesso na indústria do entretenimento, seja por meio de
                descobertas de talento ou pela busca de oportunidades que impulsionem suas carreiras.</h3>

            </div>
          </div>

        </div>
      </div>
    </section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-6">
          <div class="batata">
            <h1 class="fonteIndex">Junte-se a nós!!</h1>
            <h5>
              Descubra novas oportunidades no CapyJobs!
              Seja você um músico, palhaço ou organizador de festas, nossa plataforma é o lugar perfeito para se
              destacar.
              Registre-se e conecte-se a eventos que buscam seu talento único.
              Estamos aqui para impulsionar sua carreira e proporcionar experiências inesquecíveis.
              Entre no palco do sucesso com o CapyJobs -
              A rede que transforma sonhos em realidade! #CapyJobs #Eventos
            </h5>
          </div>
        </div>
        <div class="col-xl-6 fonteIndex">
          <div class="arroz">
            <div class="container-custom">
              <form action="_login-form.php" method="post" class="form-login-index">
                <h3>Login</h3>
                <input type="text" id="username" name="username">
                <h3>Senha</h3>
                <input type="password" id="password" name="password">
                <button>Entrar</button>
              </form>
              <div class="flex-generic">
                <hr class="bg-branco" style="width: 35%;">
                <h3 class="text-white">ou</h3>
                <hr class="bg-branco" style="width: 35%;">
              </div>
              <a href="cadastro.php" class="text-white" title='cadastro'>Não possui conta? cadastre-se agora</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include("_footer.php");?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script src="responsividade/script-responsive.js"></script>
</body>
</html>
