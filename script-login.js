function login(){
    console.log('Script está sendo executado.');
    
    let login = document.getElementById('username').value;
    let senha = document.getElementById('password').value;

    console.log('Login:', login);
    console.log('Senha:', senha);

    if(login === 'admin' && senha === '123'){
        window.location.href = "http://stackoverflow.com";
    } else {
        alert('Usuário ou senha incorretos');
    }
}