<?php
$msg = "";

if(isset($_POST['submit'])){

    include_once('../Model/config.php');
    
    
    $nome =  $_POST['nome'];
    $password = $_POST['senha'];
    $cpf =  $_POST['cpf'];
    $email = $_POST['email'];
    $tel = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['datanascimento'];
    $cidade = $_POST['cidade'];
    $estado =  $_POST['estado'];
    $endereco = $_POST['endereco'];
   
    
    try{
        $result = mysqli_query($conexao, "INSERT INTO motorista(nome,senha,cpf,email,telefone,sexo,data_nasc,cidade,estado,endereco) VALUES ('$nome','$password','$cpf','$email','$tel','$sexo','$data_nasc','$cidade','$estado','$endereco')");
        header('Location: TelaLogin.php');
    }catch(Exception $e){
        $msg = "Não foi possivel cadastrar o usuário";
    }
    
   
    
};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Motorista</title>

    <!-- Link para o jQuery e o jQuery Mask Plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        
        body {
            font-family: 'Roboto', sans-serif;
            background-image: linear-gradient(to right, #00a1ff, #003082);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 60%;
            background-color: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .left-section {
    background-color: #f0f0f0;
    width: 40%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0; /* Remover padding para ocupar todo o espaço */
    overflow: hidden; /* Garantir que a imagem não ultrapasse a div */
}

.left-section img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ajusta a imagem para cobrir toda a área sem distorção */
}

        .right-section {
            width: 60%;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #003082;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .input-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .inputBox {
            width: 100%;
            position: relative;
        }

        .inputBox-half {
            width: calc(50% - 10px);
        }

        .inputBox input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            box-sizing: border-box;
        }

        .inputBox label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-back {
            background-color: #ccc;
            border: none;
            color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-back:hover {
            background-color: #bbb;
        }

        .btn-submit {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>

    <script>
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00', {reverse: true});
            $('#telefone').mask('(00)00000-0000');
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <img src="../../Imgs/Formulario/complemento_form.png" alt="Imagem Ilustrativa">
        </div>

        <div class="right-section">
            <h1>Cadastre-se</h1>
            <form action="cadastroMotorista.php" method="POST">
            <div class="input-group">
    <div class="inputBox">
        <label for="nome">Nome Completo</label>
        <input type="text" name="nome" id="nome" required>
    </div>
    <div class="inputBox">
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required>
    </div>
    <div class="inputBox">
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" required>
    </div>
    <div class="inputBox">
        <label for="telefone">Telefone</label>
        <input type="tel" name="telefone" id="telefone" required>
    </div>
    <div class="inputBox">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>
</div>

                <div class="btn-container">
                    <button type="button" class="btn-back" onclick="window.location.href='homeMotorista.php'">Voltar</button>
                    <button type="button" class="btn-submit" onclick="window.location.href='cadastroMotorista2.php'">Continuar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
