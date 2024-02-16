const textarea = document.getElementById('pubText');
const contagemCaracteres = document.getElementById('contagemCaracteres');
const checkboxFields = document.querySelector(".checkboxFields")

checkbox.addEventListener('change', function() {
    // Se o checkbox estiver marcado, mostra os campos adicionais, caso contrário, os esconde
    if (checkbox.checked) {
        console.log("clicado")
        checkboxFields.style.display = 'block';
    } else {
        checkboxFields.style.display = 'none';
    }
});

// Adiciona um ouvinte de evento ao evento de entrada no textarea
textarea.addEventListener('input', function () {
    // Obtém o conteúdo do textarea
    const texto = textarea.value;

    if (texto.length > 255) {
        textarea.value = texto.slice(0, 255)
    }

    // Conta o número de caracteres no texto
    const numeroDeCaracteres = texto.length;

    // Atualiza o parágrafo de contagem de caracteres
    contagemCaracteres.innerHTML = `${numeroDeCaracteres}/1000`;
});


var previewImg = function (event) {
    var reader = new FileReader();
    
    reader.onload = function () {
        var output = document.getElementById("preview");
        output.src = reader.result;
        output.style.display = "block"
    };

    if (event.target.files && event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
    
};

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


    // Função para lidar com a ação de like

    function like(postId) {
        $.ajax({
        type: 'POST',
        url: '_processa-like.php',
        data: { postId: postId },
        dataType: 'json',
        success: function(response) {
            // Processar a resposta do servidor
            console.log(response); // Esta linha mostra o retorno do servidor no console
            // Se você deseja realizar alguma ação com base no retorno, pode fazer isso aqui
            if (response['status'] === "like") {
                document.getElementById(postId).classList.remove('btn-like');
                document.getElementById(postId).classList.add('btn-liked')
            } else if (response['status'] === "deslike") {
                // Faça algo se o retorno for "deslike"
                document.getElementById(postId).classList.remove('btn-liked');
                document.getElementById(postId).classList.add('btn-like')
            } else {
                // Trate outros casos se necessário
                console.log("Resposta inesperada do servidor:", response);
            }
        },
        error: function(error) {
            // Lidar com erros de requisição (opcional)
            console.error(error);
        }
    });
}

// Função para lidar com a ação de follow
function follow(userIdToFollow) {
    $.ajax({
        type: 'POST',
        url: '_processa-follow.php',
        data: { userIdToFollow: userIdToFollow },
        dataType:'json',
        success: function(response) {
            if(response['status']==="follow"){
                document.getElementById('follow'+userIdToFollow).innerText="+capyseguidor";
            }else if(response['status']==='unfollow'){
                document.getElementById('follow'+userIdToFollow).innerHTML="+capyseguir";

            }else{
                console.log("follow error")
            }
        },
        error: function(error) {
            // Lidar com erros de requisição (opcional)
            console.error(error);
        }
    });
}

function deletePost(idPub){
    var result =confirm("Deseja mesmo excluir essa publicação")
    if(result == true){
    $.ajax({
        type: 'POST',
        url: '_excluir-pub.php',
        data: {idPub:idPub},
        success:function(response){
            window.location.reload(); // Isto irá recarregar a página
        },
        error:function(error){
            console.error(error);
        }
    });
}
}

document.getElementById('btn-editar').addEventListener('click', function() {
    Tfor();
});

function Tfor() {
    var elementosAjuste = document.querySelectorAll('.alteracao');
    
    elementosAjuste.forEach(function(elemento) {
        var nome = nome.textContent;

        elemento.innerHTML = '<input type="text" value="' + nome + '">';
    });
}