<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CapyJobs - Seu Site de Eventos</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style-login.css">
  <link rel="stylesheet" href="style-responsive.css">
  <link rel="stylesheet" href="style-animation.css">
  <style>
    body {
      background-color: #f7f7f7;
    }
    .containeer {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 30px;
      margin-top: 20px;
    }
    .alert {
      background-color: #28a745;
      color: #fff;
      border-radius: 5px;
      padding: 15px;
      text-align: center;
      margin-bottom: 20px;
    }
    .form-control {
      border-radius: 5px;
      border: 1px solid #ced4da;
      margin-bottom: 20px;
    }
    .btn-primary {
      border-radius: 5px;
      background-color: #28a745;
      border-color: #28a745;
      padding: 10px 20px;
    }
    .btn-primary:hover {
      background-color: #218838;
      border-color: #218838;
    }
    .image-container img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      display: block;
      margin: 0 auto;
    }
    .p{
      font-size: 40px;
    }
  </style>
</head>
<body>
  <?php include("_header.php") ?>
  <div class="containeer">
    <main>
      <div class="row">
        <div class="col-md-6">
          <div class="alert" role="alert">
            <h2>Envie seu relatorio para que nos possa ajudar</h2>
          </div>
          <form action="?acao=enviar" method="post" enctype="multipart/form-data" id="form1">
            <div class="form-group">
              <label><strong>Nome:</strong></label>
              <input name="nome" type="text" required="required" class="form-control">
            </div>
            <div class="form-group">
              <label><strong>E-mail:</strong></label>
              <input name="email" type="email" required="required" class="form-control">
            </div>
            <div class="form-group">
              <label><strong>Telefone:</strong></label>
              <input name="telefone" type="tel" class="form-control">
            </div>
            <div class="form-group">
              <label><strong>Assunto:</strong></label>
              <input name="assunto" type="text" required="required" class="form-control">
            </div>
            <div class="form-group">
              <label><strong>Mensagem:</strong></label>
              <textarea name="mensagem" rows="5" required class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label><strong>Anexo:</strong></label>
              <input name="arquivo" type="file" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Enviar mensagem</button>
          </form>
        </div>
        <div class="col-md-6">
          <div class="image-container">
            <p class="p">CapyJobs esta em desenvolvimento para melhora sua navegaçao, para isso precisamos que ajude nos a melhorar</p>
            <img src="images/capyIcon.png" alt="Imagem de exemplo">
          </div>
        </div>
      </div>
    </main>
  </div>
        <?php include("_footer.php");?>
        <?php
        require 'PHPMailerAutoload.php';
        require 'class.phpmailer.php';

        error_reporting(E_ALL & ~E_WARNING);


        $mailer = new PHPMailer;
        $mailer->isSMTP(); // Set mailer to use SMTP
        $mailer->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );

        if($_GET['acao'] == 'enviar'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];
        $arquivo = $_FILES["arquivo"];

        $mailer->Host = 'plesk12l0002.hospedagemdesites.ws';
        $mailer->SMTPAuth = true; // Enable SMTP authentication
        $mailer->IsSMTP();
        $mailer->isHTML(true); // Set email format to HTML
        $mailer->Port = 587;

        // Ativar condição caracteres
        $mailer->CharSet = 'UTF-8';

        // Dados da sua conta do provedor de hospedagem para autenticação e envio
        $usuario = 'contato@capyjobs.com.br';
        $senha = 'capymail2024!!';
        $seuEmail = 'contato@capyjobs.com.br';

        // Conta do usuário
        $mailer->Username = $usuario; // SMTP username
        $mailer->Password = $senha; // SMTP password

        // E-mail do destinatario
        $address = $seuEmail;

        // Corpo do e-mail em html
        $corpoMSG = "<strong>Nome:</strong> $nome <br><br> <strong>E-mail:</strong> $email <br><br> <strong>Telefone:</strong> $telefone <br><br> <strong>Assunto:</strong> $assunto <br><br> <strong>Mensagem:</strong> $mensagem <br><br>";

        $mailer->AddAddress($address, "destinatario");
        $mailer->Sender = $seuEmail;
        $mailer->FromName = $nome;
        $mailer->From = $email;

        // assunto da mensagem
        $mailer->Subject = $assunto;

        // corpo da mensagem
        $mailer->MsgHTML($corpoMSG);
        
        // anexar arquivo no máximo 2MB
        $mailer->AddAttachment($arquivo['tmp_name'], $arquivo['name']);

        if(!$mailer->Send()) {
          echo "Erro: " . $mailer->ErrorInfo;
        } else {
          echo('<script> alert("Mensagem enviada com sucesso!"); window.location.href="index.php"; </script>');
        }
        }
  ?>
</body>
</html>
