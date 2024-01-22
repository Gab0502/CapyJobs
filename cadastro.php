<?php require("conn_capybd.php");

if (isset($_SESSION['idUser'])) {
    // User is logged in, redirect to feed.html
    header('Location: feed.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapyJobs - Cadastro</title>
    <meta name="description" content="Crie seu cadastro para o CapyJobs">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <!-- Header -->
    <?php include("_header.php")?>
    <!-- FIM Header -->

    <?php 

    if($_SERVER['REQUEST METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $cep = $_POST['cep'];
        $num = $_POST['num'];
        $comp = $_POST['complemento'];
        $cpf = $_POST['cpf'];

require("conn_capybd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $num = $_POST['num'];
    $comp = $_POST['CCOMPLEMENTO'];  // Correção no nome do campo
    // $cpf = $_POST['cpf'];

    $api_url = "https://viacep.com.br/ws/" . $cep . "/json";

    $options = [
        'http' => [
            'header' => "Content-type: application/json\r\n",
            'method' => 'GET',
        ],
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($api_url, false, $context);

    if ($response !== false) { // Correção para verificar se houve resposta
        $data = json_decode($response, true);
        $cadastro = $conn_capybd->prepare("INSERT INTO `tb_users` (`name`, `profilePic`, `likes`, `email`, `pw`, `phone`, `bio`, `linkedin`, `twitter`, `instagram`, `cep`, `UF`, `rua`, `numero`, `comp`, `bairro`, `cidade`, `cpf_cnpj`, `doc`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        

        if(isset($response)){
            $data = json_decode($response, true);
            $cadastro = $conexao->prepare("INSERT INTO `tb_users` (`name`, `profilePic`, `likes`, `email`, `pw`, `phone`, `cep`, `UF`, `rua`, `numero`, `comp`, `bairro`, `cidade`, `cpf_cnpj`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $cadastro->bind_param("ssssssssssssss", $name, 'capivaraPadraoIcon.jpg', 0, $email, $senha, $telefone, $cep, $data['uf'], $data['logradouro'], $num, $comp, $data['bairro'], $data['localidade'], $cpf_cnpj);
            $cadastro->execute();


        }

    } else{
        echo "<script>alert('erro, verifique o CEP ou tente novamente mais tarde')</script>";

        $profPic = 'capivaraPadraoIcon.jpg';
        $likes = 0;
        $bio = '';
        $linkedin = '';
        $twitter = '';
        $instagram = '';
        $cpf = '52829157826';
        $doc = '52829157826';
        
        $cadastro->bind_param("sssssssssssssssssss", $nome, $profPic , $likes, $email, $senha, $telefone, $bio, $linkedin, $twitter, $instagram, $cep, $data['uf'], $data['logradouro'], $num, $comp, $data['bairro'], $data['localidade'], $cpf, $doc);        
        $cadastro->execute();
    }else{
        echo "<script>alert('Erro, verifique o CEP ou tente novamente mais tarde')</script>";
    }
}
};
?>  

    <main>
        <section class="container-fluid">
        
            <div class="row bg-branco">
                <div class="col-xl-6">
                    <div class="container-custom ">
                        <h1 class="tittle">Apenas mais alguns clicks...</h1>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-login bg-verdeMedio" style="border-radius: 25px;">
                            <input required type="text" id="nome" name="nome" placeholder="NOME">
                            <input required type="text" id="email" name="email" placeholder="EMAIL" style="width: 84%;">
                            <input required type="password" id="senha" name="senha" placeholder="SENHA" style="width: 84%;">
                            <input required type="text" id="telefone" name="telefone" placeholder="TELEFONE" style="width: 84%;">
                            <div class="flex-generic">
                                <input required type="text" id="cep" name="cep" placeholder="CEP" style="width: 65%;">
                                <input required type="text" id="num" name="num" placeholder="N°" style="width: 15%;">
                            </div>
                            <input required type="text" id="CCOMPLEMENTO" name="CCOMPLEMENTO" placeholder="COMPLEMENTO">
                            <div class="flex-generic2" style="justify-content: space-around; text-align: center;">
                                <input type="checkbox" class="checkboxCustom" id="check">
                                <a href="#" class="termos">Li e concordo com os termos de uso</a>
                            </div>
                            <input type="submit" id="submit" disabled>
                    </form>

                    </div>
                </div>
               
                <div class="col-xl-6">
                    <img src="images/Puppet show-amico.png" class="img-grande" width="50%" alt="">
                </div>
                

            </div>
        </section>

    </main>

    <!-- Footer -->
  <?php include("_footer.php");?>
  <!-- FIM Footer -->

  <script>
        document.getElementById('telefone').addEventListener('input', formataTel);

        function formataTel() {
            let tel = document.getElementById('telefone');
            
            // Remove non-digit characters
            let obrigaNum = tel.value.replace(/\D/g, '');

            // Ensure the length is not more than 11 characters
            if (obrigaNum.length > 11) {
                obrigaNum = obrigaNum.slice(0, 11);
            }

            // Format the phone number as (11)94632-5666
            let formattedNumber = `(${obrigaNum.substring(0, 2)})${obrigaNum.substring(2, 7)}-${obrigaNum.substring(7)}`;
            
            // Set the formatted number as the input value
            tel.value = formattedNumber;
        }

        let submit = document.getElementById('submit')
        let check = document.getElementById('check')

        check.addEventListener("click",checkboxVerification);

        function checkboxVerification(){

        if(check.checked){
            submit.disabled = false
        }else{
            submit.disabled = true
        }
            
        }

        submit.addEventListener('click', aviso())

        function aviso(){
        if(submit.disabled===true){
            check.style.border="red"
        }
    }
    </script>

</body>
<script src="script-login.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>