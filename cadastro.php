<?php require("conn_capybd.php");
session_start();

if (isset($_SESSION['username'])) {
    header('Location: feed-temp.php');
    exit();
};

?>
<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapyJobs - Cadastro</title>
    <meta name="description" content="Crie seu cadastro para o CapyJobs">
    <link rel="icon" href="images/favicon-16x16.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    <!-- Header -->
    <?php include("_header.php")?>
    <!-- FIM Header -->

    <?php 

    error_reporting(E_ALL & ~E_WARNING);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['telefone']) && !empty($_POST['cep']) && !empty($_POST['num']) && !empty($_POST['CCOMPLEMENTO']) && !empty($_POST['cpf'])) {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $cep = $_POST['cep'];
        $num = $_POST['num'];
        $comp = $_POST['CCOMPLEMENTO'];  // Correção no nome do campo
        $cpf = $_POST['cpf'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        
    
        // Verifica se o e-mail contém o domínio "@capivarias"
        if (strpos($email, '@capivarias') !== false) {
            echo "<script>alert('E-mails com o domínio @capivarias não são permitidos. Por favor, utilize outro e-mail.')</script>";
        } else {
            // Se o e-mail não contiver o domínio "@capivarias", continue com o cadastro
    
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
                // Verifica se o e-mail já está cadastrado
                $stmt_verifica_email = $conn_capybd->prepare("SELECT COUNT(*) FROM tb_users WHERE email = ?");
                $stmt_verifica_email->bind_param("s", $email);
                $stmt_verifica_email->execute();
                $stmt_verifica_email->bind_result($email_count);
                $stmt_verifica_email->fetch();
    
                // Verifica se o CPF já está cadastrado
                $stmt_verifica_cpf = $conn_capybd->prepare("SELECT COUNT(*) FROM tb_users WHERE cpf_cnpj = ?");
                $stmt_verifica_cpf->bind_param("s", $cpf);
                $stmt_verifica_cpf->execute();
                $stmt_verifica_cpf->bind_result($cpf_count);
                $stmt_verifica_cpf->fetch();
    
                // Verifica se o e-mail ou o CPF já estão cadastrados
                if ($email_count > 0) {
                    echo "<script>alert('E-mail já cadastrado. Por favor, utilize outro e-mail.')</script>";
                } elseif ($cpf_count > 0) {
                    echo "<script>alert('CPF já cadastrado. Por favor, utilize outro CPF.')</script>";
                } else {
                    // Se o e-mail e o CPF não estiverem cadastrados, proceda com o cadastro
                    $data = json_decode($response, true);
                    $cadastro = $conn_capybd->prepare("INSERT INTO `tb_users` (`nome`, `fotoPerfil`, `email`, `senha`, `celular`, `bio`, `linkedin`, `twitter`, `instagram`, `cep`, `uf`, `rua`, `numero`, `comp`, `bairro`, `cidade`, `cpf_cnpj`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $profPic = 'capivaraPadraoIcon.jpg';
                    $likes = 0;
                    $bio = '';
                    $linkedin = '';
                    $twitter = '';
                    $instagram = '';
                    $cadastro->bind_param("sssssssssssssssss", $nome, $profPic, $email, $senha, $telefone, $bio, $linkedin, $twitter, $instagram, $cep, $data['uf'], $data['logradouro'], $num, $comp, $data['bairro'], $data['localidade'], $cpf);
                    $cadastro->execute();
                }
            } else {
                echo "<script>alert('Erro, verifique o CEP ou tente novamente mais tarde')</script>";
            }
        }
        }else{
            echo('<script>alert("email invalido")</script>');
        }
    }}
    
    error_reporting(E_ALL);
    
    $conn_capybd->close();
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
                            <input required type="text" id="cpf" name="cpf" placeholder="CPF" style="width: 84%;">
                            <div id="mensagem-cep" style='color: white; margin-left:10px;'></div>
                                    <div class="flex-generic">
                                        <input id="local" name="cep" type="text" style="width: 80%; height: 50px; margin-left: 10px;" placeholder="LOCAL digite o CEP do local do evento">
                                        <input type="text" name="numero" placeholder="N°" style="width: 15%; height: 50px; margin-left: 10px;">
                                    </div>
                            <input required type="text" id="CCOMPLEMENTO" name="CCOMPLEMENTO" placeholder="COMPLEMENTO">
                            <div class="flex-generic2" style="justify-content: space-around; text-align: center;">
                                <input type="checkbox" class="checkboxCustom" id="check">
                                <a href="#" class="termos" onclick="openModal()">Li e concordo com os termos de uso</a>
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

  <div id="myModal" class="modal">
        <div class="termos-modal">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <h2>Termos de Uso do Serviço</h2>
            <p>Bem-vindo aos Termos de Uso do Serviço! Estes termos regem o uso dos nossos serviços online. Ao acessar ou usar nossos serviços, você concorda com estes termos. Leia-os atentamente antes de prosseguir.</p>
            <p><strong>1. Aceitação dos Termos:</strong> Ao acessar ou usar nossos serviços, você concorda em cumprir estes Termos de Uso. Se você não concordar com estes termos, não poderá acessar ou usar nossos serviços.</p>
            <p><strong>2. Uso do Serviço:</strong> Você concorda em usar nossos serviços apenas para fins legais e de acordo com estes termos. Você concorda em não usar nossos serviços de maneira que possa danificar, desativar, sobrecarregar ou prejudicar o funcionamento dos serviços ou interferir no uso e aproveitamento de outros usuários.</p>
            <p><strong>3. Conteúdo:</strong> Nossos serviços podem permitir que você envie, publique, vincule, armazene ou compartilhe conteúdo. Ao fazer isso, você concede a nós uma licença mundial, não exclusiva, gratuita, sublicenciável e transferível para usar, reproduzir, distribuir, preparar trabalhos derivados, exibir e executar esse conteúdo.</p>
            <p><strong>4. Privacidade:</strong> Respeitamos a sua privacidade e protegemos suas informações de acordo com nossa Política de Privacidade. Ao usar nossos serviços, você concorda com a coleta e uso de informações conforme descrito em nossa Política de Privacidade.</p>
            <p><strong>5. Modificações:</strong> Podemos modificar ou atualizar estes Termos de Uso periodicamente. Se fizermos alterações significativas, iremos notificá-lo, e o uso continuado dos serviços após as alterações entrar em vigor constituirá sua aceitação dos novos termos.</p>
            <p><strong>6. Rescisão:</strong> Podemos rescindir ou suspender seu acesso aos nossos serviços imediatamente, sem aviso prévio ou responsabilidade, por qualquer motivo, incluindo, sem limitação, se você violar estes Termos de Uso.</p>
            <p><strong>7. Limitação de Responsabilidade:</strong> Em nenhuma circunstância seremos responsáveis perante você ou qualquer terceiro por danos indiretos, incidentais, especiais, punitivos ou consequentes, decorrentes ou relacionados ao uso ou incapacidade de uso dos serviços.</p>
            <p><strong>8. Lei Aplicável:</strong> Estes Termos de Uso são regidos e interpretados de acordo com as leis do Brasil. Qualquer disputa decorrente destes termos será submetida à jurisdição exclusiva dos tribunais localizados no Brasil.</p>
            <div class="termos-footer">
                <a href="#" onclick="closeModal()">Fechar</a>
            </div>
        </div>
    </div>

  <script>
        // Funções do modal
        function openModal() {
            document.getElementById('myModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('myModal').style.display = "none";
        }    
        const inputCEP = document.getElementById('local');
const mensagemCEP = document.getElementById('mensagem-cep');
let timeoutId;

inputCEP.addEventListener('input', function() {
    clearTimeout(timeoutId);
    console.log("input detectado")
    timeoutId = setTimeout(function() {
        const localidade = inputCEP.value;
        console.log("timeout")
        // Use uma expressão regular para verificar se a localidade tem o formato esperado (pode ajustar conforme necessário)
        if (/^[0-9]{8}$/.test(localidade)) {
            console.log("verifica")
            verificaCEP(localidade);
        } else {
            mensagemCEP.innerHTML = 'Por favor, insira um CEP válido.';
        }
    }, 1000); // Aguarde 1 segundo após a última entrada do usuário
});

function verificaCEP(cep) {
    // Faça uma requisição AJAX para o serviço do ViaCEP
    $.ajax({
        url: `https://viacep.com.br/ws/${cep}/json/`,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            // Verifique se a resposta do ViaCEP indica um CEP válido
            if (!data.erro) {
                mensagemCEP.innerHTML = `CEP válido. Localidade: ${data.localidade}, UF: ${data.uf}`;
            } else {
                mensagemCEP.innerHTML = 'CEP não encontrado.';
            }
        },
        error: function() { 
            mensagemCEP.innerHTML = 'Erro ao verificar o CEP. Tente novamente mais tarde.';
        }
    });
}


        // Função de formatação do telefone
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

    // Remover formatação do telefone antes de enviar o formulário
    document.querySelector('form').addEventListener('submit', function(event) {
        var telefoneInput = document.getElementById('telefone');
        telefoneInput.value = telefoneInput.value.match(/\d+/g).join('');
    });


    </script>

</body>

</html>
