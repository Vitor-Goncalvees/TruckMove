<?php
$msg = "";

if(isset($_POST['submit'])){

    include_once('../Model/config.php');
    
    $nome =  $_POST['nome'];
    $password = $_POST['senha'];
    $cpf =  $_POST['cpf'];
    $email = $_POST['email'];
    $tel = $_POST['telefone'];
    
    try{
        $result = mysqli_query($conexao, "INSERT INTO motorista(nome, senha, cpf, email, telefone) VALUES ('$nome', '$password', '$cpf', '$email', '$tel')");
        header('Location: TelaLogin.php');
    }catch(Exception $e){
        $msg = "Não foi possível cadastrar o usuário";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #e6f7ff;
}

.container {
    display: flex;
    width: 700px;
    height: 400px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.left-panel {
    width: 35%;
    background-color: #f6e6d9;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.image {
    width: 100%;
    height: 100%;
    background: url('sua-imagem-aqui.png') no-repeat center/contain;
}

.right-panel {
    width: 65%;
    background-color: #fff;
    padding: 20px;
    position: relative;
}

h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

form {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

label {
    width: 100%;
    font-size: 14px;
    color: #555;
}

input, select {
    width: calc(33% - 10px);
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    width: 100%;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

button[type="button"] {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 15px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover, button[type="button"]:hover {
    background-color: #0056b3;
}
</style>
<body>
    <div class="container">
        <div class="left-panel">
            <div class="image">
                <!-- Aqui você pode adicionar uma imagem representando o caminhão e a pessoa -->
            </div>
        </div>
        <div class="right-panel">
            <h1>Já está acabando</h1>
            <form>
                <label for="sexo">Sexo</label>
                <select id="sexo" required>
                    <option value="" disabled selected>informe seu sexo</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>

                <label for="dataNascimento">Data de Nascimento</label>
                <input type="text" id="dataNascimento" placeholder="dd/mm/aa" required>

                <label for="registro">Nº de registro</label>
                <input type="text" id="registro" placeholder="Nº de Registro" required>

                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" placeholder="Digite sua Cidade" required>

                <label for="estado">Estado</label>
                <input type="text" id="estado" placeholder="Digite seu Estado" required>

                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" placeholder="Digite seu Endereço" required>

                <button type="submit">Cadastrar</button>
                <button type="button" onclick="entrar()">Entrar</button>
            </form>
        </div>
    </div>
    <script src="script.js"> 
        document.getElementById('dataNascimento').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length >= 2) value = value.slice(0, 2) + '/' + value.slice(2);
    if (value.length >= 5) value = value.slice(0, 5) + '/' + value.slice(5, 7);
    e.target.value = value;
});

document.getElementById('registro').addEventListener('input', function (e) {
    e.target.value = e.target.value.replace(/\D/g, '');
});

function entrar() {
    alert("Botão Entrar pressionado");
}
    </script>
</body>
</html>
