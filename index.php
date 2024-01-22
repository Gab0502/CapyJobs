<?php require("conn_capybd.php");
session_start();
$idUsuario = $_SESSION['idUser'];
print_r($_SESSION);


if (isset($_SESSION['idUser'])) {
  header('Location: feed.html');
  exit();
};

?>
<?php
  $query_rs_pub = "SELECT * FROM tb_pub INNER JOIN tb_tags ON tb_cursos.idArea = tb_areas.idArea WHERE tb_cursos.ativo = 1 AND tb_cursos.home = 1 ORDER BY tb_cursos.idCurso DESC";
	//$query_rs_maisP = "SELECT * FROM tb_cursos INNER JOIN tb_areas ON tb_cursos.idArea = tb_areas.idArea WHERE tb_cursos.ativo = 1 ORDER BY tb_cursos.visualizacao DESC";

  //Executar a consulta
  $rs_pub = mysqli_query($conn_capybd, $query_rs_pub) or die(mysqli_error($conn_capybd));
  //$rs_maisP = mysqli_query($conn_capybd, $query_rs_maisP) or die(mysqli_error($conn_capybd));

  //Total de registros encontrados na consulta
  $totalRow_rs_curso = mysqli_num_rows($rs_curso);
  //echo($totalRow_rs_curso);

  //Obter UMA linha do resultado com array
  $row_rs_curso = mysqli_fetch_assoc($rs_curso);
  //echo($row_rs_curso["titulo"]);
  //echo($row_rs_curso["idCurso"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CapyJobs - Seu Site de Eventos</title>
  <meta name="description" content="Site para encontrar servicos para festa, musicas, alimentacao e muito mais. ">
	<meta name="keywords" content="capyjobs, servicos, empregos, contrato, festa, brinquenos, musicas, banda, animacao, entreterimento, cozinha, comidas, alimentacao">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style-login.css">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
</head>
<body>
  <!-- Header -->
  <?php include("_header.php")?>
  <!--FIM Header-->
  <main>
    <section class="image-fluid bg-verdeMedio">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-6 form-pesquisa" id="banner1">
            <form onsubmit="" class="form-pesquisa-input">
              <input type="text" placeholder="pesquise um serviço" name="pesquisa">
              <button>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-search"
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
            <img src="images/banner.png" id="bannerDisabled" width="90%" height="100% " style="margin-left:-15px ;" alt="">
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
          <img src="images/jazz band-amico.png">
          <h1>banda</h1>
        </div>
        <div class="card">
          <img src="images/female chef-pana.png" alt="">
          <h1>cozinha</h1>
        </div>
        <div class="card">
          <img src="images/pastry chef-pana.png" alt="">
          <h1>comida</h1>
        </div>
        <div class="card">
          <img src="images/Puppet show-amico.png" alt="">
          <h1>brinquedos</h1>
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
                  <img src="images/female chef-pana.png" alt="">
                </div>
              </div>
              <div class="caixa1">
                <div class="box">
                  <img src="images/pastry chef-pana.png" alt="">
                </div>
                <div class="box">
                  <img src="images/Puppet show-amico.png" alt="">
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
              <form action="" class="form-login-index">
                <h3>Login</h3>
                <input type="text-" id="username">
                <h3>Senha</h3>
                <input type="text" id="password">
                <a class="text-white" href="#">Esqueceu a senha?</a>
                <button>Entrar</button>
              </form>
              <div class="flex-generic">
                <hr class="bg-branco" style="width: 35%;">
                <h3 class="text-white">ou</h3>
                <hr class="bg-branco" style="width: 35%;">
              </div>
              <a href="#" class="text-white">Não possui conta? cadastre-se agora</a>
            </div>
          </div>
        </div>
      </div>
  </main>
  <!-- Footer -->
  <?php include("_footer.php");?>
  <!-- FIM Footer -->
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