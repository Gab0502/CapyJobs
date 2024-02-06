<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CapyJobs - Seu Site de Eventos</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style-login.css">
  <link rel="stylesheet" href="style-responsive.css">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
  <link rel="stylesheet" href="style-animation.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="index.php"><img src="images/logo.png" title="" alt=""></a>
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
            <a class="nav-link" href="cadastro.php">CADASTRE-SE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">LOGIN</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main>
    <section class="image-fluid bg-verdeMedio">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-6 form-pesquisa" id="banner1">
            <form onsubmit="" class="form-pesquisa-input">
              <input type="text" placeholder="  Pesquise por uma vaga ou prestador de serviço:" name="pesquisa"
                id="barradepesquisa">
              <button>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                  viewBox="0 0 16 16">
                  <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
              </button>
              <div class="input-buttons">
                <p>Relevantes:</p>
                <button class="buttons">banda</button>
                <button class="buttons">entrenimento</button>
                <button class="buttons">brinquedos</button>
              </div>
            </form>
          </div>
          <div class="col-xl-6 bg-verdeClaro" id="banner2">
            <img src="images/banner.png" id="bannerDisabled" width="90%" style="margin-left:-15px ;" alt="">
          </div>
        </div>
      </div>
    </section>
    </section>

    <!-- não alterar e colocar nada nessa linha, apenas estilo -->
    <div class="faixa bg-bege"></div>
    <section>
      <h1 style="margin-left:55px; margin-top: 15px;" class="fonteIndex">Procurando por...</h1>
      <div class="flex-cards">
        <div class="card">
          <img src="images/capivaraCozinheiraIcon.jpg" alt="">
          <p> cozinheiro</p>
          <P>cozinheiro Profissional | nodeste |Festas em Familia | Entreterimento</P>
        </div>
        <div class="card">
          <img src="images/capivaraTernoIcon.jpg" alt="">
          <p> organizador de eventos</p>
          <P>organização de eventos | contração |Festas em Familia | Entreterimento</P>
        </div>
        <div class="card">
          <img src="images/capivaraPalhacoIcon.jpg" alt="">
          <p> MANO LOUCOS SHOW</p>
          <P>Palhaço Profissional | Balões |Festas em Familia | Entreterimento</P>
        </div>
        <div class="card">
          <img src="images/capivaraPagodeIcon.jpg" alt="">
          <p> cantor de eventos</p>
          <P>pagode | samba |Festas em Familia e new era | Entreterimento</P>
        </div>

      </div>
    </section>
    
      <div class="col-xl-3">
        <section class="feed">

          <div class="flex-generic">
            <div class="flex-generic" style="align-items: center;">
              <div class="post-user-name pub-perfil">
                <img src="images/OIP.jfif" alt="">
                <h5> Armando pagodeiro</h5>
                <p>Ratos do porão | palhaço nas horas vagas</p>
              </div>
            </div>
            <div>
            </div>
          </div>

          <div class="post-content">
            <h6 class="tags">#festa #jonasBrothers #kanyeWest</h6>
          </div>

          <p>É com alegria que anunciamos a incrível artista circense, nossa palhaça
            extraordinária! Seu brilho cativante e sua habilidade única encantam multidões,


          </p>
        </section>
      </div>
    </div>
    </div>
    </div>
    </section>
    <section>
      <div class="container-fluid bullet-points">
        <div class="row">
          <div class="col-xl-6">
            <div class="texto divisao">
              <h1 class="fonteIndex centrarAo">
                seja bem vindo
              </h1>
              <h1 class="fonteIndex centrarAo">
                ao
              </h1>
              <h1 class="fonteIndex centrarAo">
                CapyJobs
              </h1>
            </div>
            <div class="caixa-flex">
              <div class="caixa1">
                <div class="box">
                  <img src="images/jazz band-amico.png" alt="">
                </div>
                <div class="box">
                  <img src="images/female chef-pana.png" class="disabled1" alt="">
                </div>
              </div>
              <div class="caixa1">
                <div class="box">
                  <img src="images/pastry chef-pana.png" class="disabled1" alt="">
                </div>
                <div class="box">
                  <img src="images/Puppet show-amico.png" class="disabled1" alt="">
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
        <div class="col-xl-6 fonteIndex">
          <div class="batata">
            <h1>Junte-se a nós!!</h1>
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
              <form action="_login-form.php" mehtod="post" class="form-login-index">
                <h3>Login</h3>
                <input type="text-" id="username" name="username">
                <h3>Senha</h3>
                <input type="text" id="password" name="password">
                <button>Entrar</button>
              </form>
              <div class="flex-generic">
                <hr class="bg-branco" style="width: 35%;">
                <h3 class="text-white">ou</h3>
                <hr class="bg-branco" style="width: 35%;">
              </div>
              <a href="cadastro.php" class="text-white">Não possui conta? cadastre-se agora</a>
            </div>
          </div>
        </div>
      </div>
  </main>

  <footer class="bg-verdeEscuro text-white pt-4 mt-5">
    <div class="container">
      <div class="row">
        <!-- Coluna 1 -->
        <div class="col-md-3 mb-4">
          <h5>Links Rápidos</h5>
          <ul class="list-unstyled">
            <li><a href="index.php" class="text-white">Início</a></li>
            <li><a href="#" class="text-white">Sobre</a></li>
            <li><a href="#" class="text-white">Serviços</a></li>
            <li><a href="#" class="text-white">Contato</a></li>
          </ul>
        </div>
        <!-- Coluna 2 -->
        <div class="col-md-3 mb-4">
          <h5>Contato</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">contato@contato.com</a></li>
            <li><a href="#" class="text-white">+55 11 98545-4545</a></li>
            <li><a href="#" class="text-white">Rua Exemplo: 52</a></li>
          </ul>
        </div>
        <!-- Coluna 3 -->
        <div class="col-md-3 mb-4">
          <h5>Redes Sociais</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Facebook</a></li>
            <li><a href="#" class="text-white">Linkedin</a></li>
            <li><a href="#" class="text-white">Behance</a></li>
            <li><a href="#" class="text-white">Instagram</a></li>
          </ul>
        </div>
        <!-- Coluna 4 -->
        <div class="col-md-3 mb-4">
          <h5>Newletter</h5>
          <p class="text-white">Inscreva-se para receber novidades</p>
          <form>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Digite seu e-mail">
            </div>
            <button type="submit" class="btn btn-primary">Inscreva-se</button>
          </form>
        </div>
      </div>
      <hr class="bg-white mb-2">
      <div class="row d-flex justify-content-center ">
        <p class="text-white">2023 - CC - Creative Commons - Atlantida</p>
      </div>
    </div>
  </footer>
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
</script>

</html>
