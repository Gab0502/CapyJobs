<?php require("conn_capybd.php");  
session_start();

if(isset($_GET['idUser'])){
    $idUser = $_GET['idUser'];

    $sql = "SELECT * FROM tb_users WHERE idUser = $idUser";


    $result = $conn_capybd->query($sql);
    
    $row = $result->fetch_assoc();
 }
 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapyJobs - Perfil de Usuário</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php 
    $feed = "SELECT
    tb_pub.*, 
    tb_users.nome, 
    tb_users.bio, 
    tb_users.fotoPerfil,
    IFNULL(SUM(tb_likes.idUser = '{$_SESSION['idUser']}'), 0) as userLiked,
    IFNULL(SUM(tb_seg.idSeg2 = '{$_SESSION['idUser']}'), 0) as following
    FROM tb_pub
    INNER JOIN tb_users ON tb_pub.idUser = tb_users.idUser
    LEFT JOIN tb_likes ON tb_pub.idPub = tb_likes.idPub AND tb_likes.idUser = '{$_SESSION['idUser']}'
    LEFT JOIN tb_seg ON tb_pub.idUser = tb_seg.idSeg1 AND tb_seg.idSeg2 = '{$_SESSION['idUser']}' WHERE tb_pub.idUser
    GROUP BY tb_pub.idPub
    ORDER BY tb_pub.dataPub DESC";

    $pub = $conn_capybd->query($feed);

    $pubs = $pub->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $bio = $_POST['bio'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $cep = $_POST['cep'];
        $num = $_POST['num'];
        $comp = $_POST['CCOMPLEMENTO'];  // Correção no nome do campo
        $cpf = $_POST['cpf'];
        
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $nome = $_POST['nome'];
        $bio = $_POST['bio'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $linkedin = $_POST['linkedin'];
        $twitter = $_POST['twitter'];
        $instagram = $_POST['instagram'];


        $sql = "UPDATE `tb_users` SET `nome` = '$nome', `email` = '$email', `bio` = '$bio', `linkedin` = '$linkedin', `twitter` = '$twitter', `instagram` = '$instagram', `bairro` = '$bairro', `cidade` = '$cidade' WHERE `tb_users`.`idUser` = '$idUser'";

        

    }
    
?>

    <header>
        <nav class="navbar navbar-expand-lg bg-verdeEscuro">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img src="images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse alinhamento" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 centro">

                        <li class="nav-item ">
                            <a class="nav-link active" style="color: #ffff;" aria-current="page" href="#">Vagas</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link cabeca" style="color: #ffff;" href="#">Notificação</a>
                        </li>

                        <li>
                            <a class="nav-link" style="color: #ffff;" href="#">Mensagens</a>
                        </li>

                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="bullet-points APOLLO">
        <section>
            <!-- sessão de rosto-perfil .-->
            <div class="feed">

                <div class="papel_parede ">
                    <img src="images/<?php echo($row['banner'])?>" alt="">
                </div>

                <!-- forma para alterar dados -->

                
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="rosto_novo descricao">
                    <img src='images/<?php echo($row['fotoPerfil'])?>'>

                    <div class="ajuste-nome">
                    <h2 class="alteracao" id='nome'> <?php echo($row['nome'])?></h2>
                
                    </div>
                        <?php
                        $following = ($pubs['following'] > 0);
                        if ($row['idUser'] == $_SESSION['idUser']) {
                                // Se o usuário logado é o mesmo que fez a publicação, mostra botões de edição/exclusão
                                echo '<details>';
                                echo '    <summary>...</summary>';
                                echo '    <button type="button" id="btn-editar" class="btn-edit">editar</button>';
                                echo '    <button style = "display: none;" type="button" id="btn-cancelar" class="btn-edit">cancela</button>';
                                echo '    <button type="submit" style = "display: none;" type="button" id="btn-salvar" class="btn-edit">salva</button>';
                                echo '</details>';

                        } else {    
                                // Caso contrário, mostra botão de seguir/seguindo
                                if ($following) {
                                    // Se o usuário estiver seguindo, exiba o botão "Seguindo"
                                    echo "<button onclick=\"follow({$row['idUser']})\" class='btn-edit'>Capyseguindo</button>";
                            } else {
                                    // Se o usuário não estiver seguindo, exiba o botão "Seguir"
                                    echo "<button class='btn-edit' onclick=\"follow({$row['idUser']})\" class='btn-edit' >+Capyseguir</button>";
                            }                          
                        }
                        ?>
                    </div>

                </div>
                <!-- sessão de detalhes  -->

            </div>
            <div class="feed muda">
                <h3>sobre</h3> <BR>

                <h5 class='alteracao' id='bio'><?php echo($row['bio'])?></h5>

            </div>
            <!-- sessão de contato -->
            <div class="feed">
                <div class="flex-generic">
                    <h5>Celular:</h5>
                    <h5 class='alteracao' id='celular'><?php echo($row['celular']) ?></h5>
                </div>
                <div class="flex-generic">
                    <h5>E-mail:</h5>
                    <h5 class='alteracao' id='email'><?php echo($row['email']) ?></h5>
                </div>
                <div class="flex-generic">
                    <h5>Bairro:</h5>
                    <h5 class='alteracao' id='bairro'><?php echo($row['bairro']) ?></h5>
                </div>
                <div class="flex-generic">
                    <h5>Cidade:</h5>
                    <h5 class='alteracao' id='cidade'><?php echo($row['cidade']) ?></h5>
                </div>
                <div class="flex-generic">
                    <h5>Linkedin:</h5>
                    <h5 class='alteracao' id='linkedin'><a href="<?php echo($row['linkedin']) ?>"><?php echo($row['linkedin']) ?></a></h5>
                </div>
                <div class="flex-generic">
                    <h5>Twitter:</h5>
                    <h5 class='alteracao' id='twitter'><a href="<?php echo($row['twitter']) ?>"><?php echo($row['twitter']) ?></a></h5>
                </div>
                <div class="flex-generic">
                    <h5>Instagram:</h5>
                    <h5 class='alteracao' id='instagram'><a href="<?php echo($row['instagram']) ?>"><?php echo($row['instagram']) ?></a></h5>
                </div>

            </div>
            </form>

            </div>
            <!-- divisão para inserir infromações de  -->
            <div>

            </div>

            <section class="feed">
                <article class="post">
                    <div class="feed-post">
                        <div class="descricao">
                            <div class="feed-perfil">
                                <div class="flex-generic"
                                    style="align-items: center; justify-content: space-between;">
                                    <div class="flex-generic" style="align-items: center;">
                                        <img src='images/<?php echo($row['fotoPerfil'])?>'>
                                        <div class="post-user-name">
                                            <h5>  <?php  echo($row['nome'])?> </h5>
                                        </div>
                                    </div>
                                    <div>
                                        <button title="Curtir" class="botao-bonitofeed" class="botao-bonito">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                            </svg>
                                        </button>    
                                        <button title="Compartilhar" class="botao-bonitofeed" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                            </svg>
                                        </button>    
                                        <button title="Seguir" class="botao-bonitofeed"><i class="bi bi-chat-heart"></i></button>                                   
                                </div>
                                </div>
                            </div>
                            <div class="post-content">
                                <h6 class="tags">#festa #jonasBrothers #kanyeWest</h6>
                            </div>
                            <div class="post-text">
                                <p>É com alegria que anunciamos a incrível artista circense, nossa palhaça
                                    extraordinária! Seu brilho cativante e sua habilidade única encantam multidões,
                                    trazendo risos e magia a cada apresentação. Seu talento é uma celebração à arte
                                    do
                                    circo, iluminando corações com cores vibrantes e performances envolventes.
                                    Aplaudamos essa estrela do picadeiro, cujo carisma contagia e transforma cada
                                    espetáculo em um momento inesquecível!
                                </p>
                            </div>
                        </div>
                        <div class="feed-img">
                            <a data-lightbox="example-1" href=""><img src="images/Palhaço.jpg"alt=""></a>
                        </div>
                        <div class="feed-reage">
                            <div class="feed-reage-button">                                                               
                            </div>
                            <div class="faixa"></div>

                        </div>
                    </div>
                </article>
            </section>
        </section>
    </main>

</body>
<script>
    var elementosAjuste = document.querySelectorAll('.alteracao');
    var valOrig = []; 

    document.getElementById('btn-editar').addEventListener('click', function() {
        document.getElementById('btn-editar').style.display = "none";
        document.getElementById('btn-cancelar').style.display = "inline-block";
        document.getElementById('btn-salvar').style.display = "inline-block";
    Tform();
});

function Tform() {    
    elementosAjuste.forEach(function(elemento) {
        var nome = elemento.textContent;
        valOrig.push(nome);
        for (i = 0; i < valOrig.length; i++){
            console.log(valOrig[i])
        }
        var input = '<input type="text" name="' + elemento.id + '" value="' + nome + '" class="alteracao">';
        elemento.innerHTML = input;
    });
}
    document.getElementById('btn-cancelar').addEventListener('click', function() {
        location.reload()
});



</script>
<script> src="script.js"</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

</html>