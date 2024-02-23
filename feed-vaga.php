<?php require("conn_capybd.php");
    session_start();

    if (empty($_SESSION['idUser'])) {
        // Redireciona para a página de login
        header('Location: login.php');
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feed</title>
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="lightbox2/dist/css/lightbox.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-responsive.css">
</head>
<body class="colore">
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
LEFT JOIN tb_seg ON tb_pub.idUser = tb_seg.idSeg1 AND tb_seg.idSeg2 = '{$_SESSION['idUser']}'
WHERE tb_pub.ad=1
GROUP BY tb_pub.idPub 
ORDER BY tb_pub.dataPub DESC";

$vagas = "SELECT tb_pub.*, tb_users.nome, tb_users.bio, tb_users.fotoPerfil 
FROM tb_pub
INNER JOIN tb_users ON tb_pub.idUser = tb_users.idUser
WHERE tb_pub.ad = 1
ORDER BY tb_pub.dataPub DESC LIMIT 5";

$result = $conn_capybd->query($feed);
$resultVagas = $conn_capybd->query($vagas);


// sistema de postagem

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ad = isset($_POST['ad']) && $_POST['ad'] == 'on' ? 1 : 0;
    $desc = $_POST['pubText'];
    $tags = $_POST['tags'];
    $titulo = $_POST['titulo'];
    $cep = isset($_POST['cep']) ? $_POST['cep'] : null; // CEP é opcional
    $dia = $_POST['data'];
    $num = $_POST['numero'];

    // Verifique se a checkbox está marcada antes de processar o CEP
    if (!empty($cep)) {
        $api_url = "https://viacep.com.br/ws/" . $cep . "/json";
        $options = [
            'http' => [
                'header' => "Content-type: application/json\r\n",
                'method' => 'GET',
            ],
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($api_url, false, $context);

        if ($response !== false) {
            $data = json_decode($response, true);
        } else {
            echo "Erro na requisição do CEP.";
            exit; // Encerrar o script se houver um erro no CEP
        }
    }
}


    
?>
   <?php include('_header2.php') ?>


<main class="container-fluid feedFull">
    <div class="row">
    <?php if (isset($_SESSION['idUser'])) : ?>
        <aside class="col-xl-3 azul disabled2">
            <div class="azul-a mt-3">
            </div>
            <div class="azul-b">
                <div class="IMG">
                    <a href="perfil.php?idUser=<?php echo($_SESSION['idUser']);?>"><img src="images/<?php echo $_SESSION['profilePic']; ?>" alt="foto de perfil"></a>
                </div>
                <div class="azul-b2">
                    <p alt="nome do usuario"><?php echo $_SESSION['name']; ?></p>
                    <p alt="bio do usuario"><?php echo $_SESSION['bio']; ?></p>
                </div>
                <div class="azul-b3">
                    <div class="contatos">
                        Contatos:
                        <p>Email: <?php echo $_SESSION['email']; ?></p>
                        <p>Telefone: <?php echo $_SESSION['phone']; ?></p>
                    </div>
                </div>
            </div>
        </aside>
    <?php else : ?>
        <aside class="col-xl-3 azul disabled2">
            <div class="azul-a mt-3">
            </div>
            <div class="azul-b">
            <p>Você não está logado. Faça <a href="login.php">login</a>.</p>
    </div>
    </aside>
        
    <?php endif; ?>

        <section class="col-xl-6 bg">
            <section class="grupPost">
                <div class="grupPost-input">
                    
                    <a href="perfil.php?idUser=<?php echo($_SESSION['idUser'])?>"><img src="images/<?php echo($_SESSION['profilePic']);?>" alt=""></a>
                    <input type="text" class="grupPost-textArea" data-toggle="modal"
                        data-target="#exampleModalCenter" placeholder="Nos conte sobre o que esta pensando">
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Publicação</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                            <!-- fazer postagem -->


                            <form action="_postagem.php" method="post" enctype="multipart/form-data">

                            <!-- descrição -->

                            <h1>Conteudo</h1>
                            <textarea name="pubText" id="pubText" cols="60" rows="10"  style="resize: none;"></textarea>
                            <div class="flex-generic" style="justify-content: flex-end;"> <p id="contagemCaracteres">0/255</p></div>

                            <!-- tags -->
                            <h3>Tags</h3>
                            <input type="text" id="tags" name="tags" style="width: 95%; height: 50px; margin-left: 10px;" placeholder="TAGS ex: #festa #musica">
                            <br><br><br>
                            <!-- checkbox ad -->
                            <div class="flex-generic" style="justify-content: flex-end; align-items: center; margin-top: -55px; text-align: center;"> <label for="#checkbox">é vaga?</label><input type="checkbox" name="ad" class="evaga" id="checkbox"></div>
                            <div class="checkboxFields" style="display: none;">

                            <!-- informaçoes para ads -->

                                <!-- titulo -->
                                <h3>Titulo</h3>
                                <input type="text" id="titulo" name="titulo" style="width: 95%; height: 50px; margin-left: 10px;" placeholder="TITULO ex:Procuro banda para festa">

                                <!-- cep -->
                                <h3>Localização</h3>
                                <div id="mensagem-cep"></div>
                                <div class="flex-generic">
                                    <input id="local" name="cep" type="text" style="width: 80%; height: 50px; margin-left: 10px;" placeholder="LOCAL digite o CEP do local do evento">
                                    <input type="text" name="numero" placeholder="N°" style="width: 15%; height: 50px; margin-left: 10px;">
                                </div>

                                <!-- data -->
                                <h3>Data do Evento</h3>
                                <input type="date" id="data" name="data">
                            </div>
                            <div class="flex-generic" style="flex-direction: column;">
                            <label for="upload-photo">foto</label>
                            <input type="file" name="upload-photo" id="upload-photo" onchange="previewImg(event)"/>
                            <img id="preview">
                            </div>
                            <button>remover foto</button>

                            </div>
                            <div class="modal-footer"> 
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <input type="submit">
                            </div>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </section>

<?php while ($row = $result->fetch_assoc()): ?>
<section class='feed'>
    <article class='post'>
        <div class='feed-post' >
            <div class='descricao'>
                <!-- Displaying information about the user who made the post -->
                <div class='feed-perfil'>
                    <div class='flex-generic' style='align-items: center; justify-content: space-between;'>
                        <div class='flex-generic' style='align-items: center;'>
                            <a href="perfil.php?idUser=<?php echo($row['idUser']) ?>"><img src='images/<?= $row['fotoPerfil'] ?>' alt='<?= $row['name'] ?>'></a>
                            <div class='post-user-name'>
                                <h5><?= $row['nome'] ?></h5>
                                <p><?= $row['bio'] ?></p> <!-- You can adjust this as needed -->
                            </div>
                        </div>

                        <!-- botão para seguir -->

                        <?php
                        $following = ($row['following'] > 0);
                        if ($row['idUser'] == $_SESSION['idUser']) {
                            // Se o usuário logado é o mesmo que fez a publicação, mostra botões de edição/exclusão
                            echo '<details>';
                            echo '    <summary>...</summary>';
                            echo '    <button class="btn-edit">editar</button>';
                            echo '    <button onclick="deletePost('. $row['idPub'] .')" class="btn-edit">excluir</button>';
                            echo '</details>';
                        } else {    
                            // Caso contrário, mostra botão de seguir/seguindo
                            if ($following) {
                                // Se o usuário estiver seguindo, exiba o botão "Seguindo"
                                echo "<button onclick=\"follow({$row['idUser']})\" id='follow". $row['idUser'] ."' class='btn-edit'>Capyseguindo</button>";
                            } else {
                                // Se o usuário não estiver seguindo, exiba o botão "Seguir"
                                echo "<button class='btn-edit' onclick=\"follow({$row['idUser']})\" class='btn-edit'  id='follow". $row['idUser'] ."'>+Capyseguir</button>";
                            }                          
                        }
                        ?>
                        
            </div>
                </div>
                <!-- Displaying information of the publication -->
                <div class='post-content'>
                    <h6 class='tags'>
                        <!-- Retrieving tags associated with the publication -->
                        <?php echo($row['tag']) ?>
                    </h6>
                </div>
                <?php echo($row['ad']=(1) ? "<h1> " . $row['titulo'] . "</h1>" : '')?>

                <div class='post-text'>
                    <p><?= $row['descricao'] ?></p>
                </div>
            </div>

            <!-- Displaying the image of the publication using lightbox -->
            <div class='feed-img'>
                <a data-lightbox='example-1' href='images/<?= $row['midia1'] ?>'><img src='images/<?= $row['midia1'] ?>' alt=''></a>
            </div>

            <!-- Displaying interaction options (like, share, etc.) -->
            <div class='feed-reage'>
                <div class='feed-reage-button'>
                    <?php 
                    $liked = ($row['userLiked']>0);
                    if($liked){
                        echo   "<button class='btn-liked' onclick='like(" . $row['idPub'] . ")' id=". $row['idPub'] .  "> 
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='green' class='bi bi-hand-thumbs-up' viewBox='0 0 16 16'>
                                        <path d='M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.040-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725a.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z'/>
                                    </svg>
                                    curtir
                                </button>";
                    }
                    else{
                        echo "<button class='btn-like' onclick='like(" . $row['idPub'] . ")' id=". $row['idPub'] .  "> 
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='green' class='bi bi-hand-thumbs-up' viewBox='0 0 16 16'>
                                        <path d='M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.040-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725a.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z'/>
                                    </svg>
                                    curtir
                                </button>";
                    }

                    
                    ?>

                    <button class='btn-like '>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-reply-fill' viewBox='0 0 16 16'>
                            <path d='M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z'/>
                        </svg>

                        <!-- botão para like -->

                        compartilhar
                    </button>
                </div>
                <div class='faixa'></div>
            </div>
        </div>
    </article>
</section>
<?php endwhile; ?>

</section>
</section>

        <aside class="col-xl-3 mt-3 disabled2">
            <div class="Vagas">
            </div>
            <div class="Vagas1">
                <div class="d">
                    <p>Vagas em destaque</p>
                </div>
            <?php while ($rowVagas = $resultVagas->fetch_assoc()):  ?>
                <a href="vaga.php?idPub=<?php echo($rowVagas['idPub'])?>" style="text-decoration: none; color: black;">
                <div class="buscando">
                    <div class="flex-generic">
                        <img src="images/<?php echo($rowVagas['fotoPerfil']) ?>" alt="">
                        <div class="flex-generic" style="flex-direction: column;">

                            <div class="alinhamento1">
                                <p style="margin-bottom: 2px;"><?php echo($rowVagas['nome']);?> ESTÁ BUSCANDO...</p>
                            </div>
                            <div class="alinhamento2">
                                <p style="margin-right: 35px; margin-bottom: 5px;"><?php echo($rowVagas['titulo'])?></p>
                            </div>
                            <div class="alinhamento3">
                                <?php echo($rowVagas['rua'])?>, <?php echo($rowVagas['numero'])?>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                <?php endwhile;?>


            </div>
        </aside>
    </div>
</main>
<footer class="preto">
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
<script src="lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>
<script src="responsividade/script-responsive.js"></script>
<script src="script.js"></script>
</body>

</html>