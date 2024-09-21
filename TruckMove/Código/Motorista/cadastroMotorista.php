<?php
$msg = "";

if(isset($_POST['submit'])){

    include_once('config.php');
    
    
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Motorista</title>

<style>
    body{
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to left, #003082,  rgb(20, 147, 220));
}
.box{
    color: white;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.6);
    padding: 15px;
    border-radius: 15px;
    
  
}
fieldset{
    border: 3px solid dodgerblue;
}

legend{
    border: 1px solid dodgerblue;
    padding: 10px;
    text-align: center;
    background-color: dodgerblue;
    border-radius: 8px;
    color: white;
}
.inputBox{
    position: relative;
}
.inputUser{
    background: none;
    border: none;
    border-bottom: 1px solid white;
    outline: none;
    color: white;
    font-size: 15px;
   width: 50%;
    letter-spacing: 2px;
}

.labelInput{
    position: absolute;
    top: 0px;
    left: 0px;
    pointer-events: none;
    transition: .5s;
}

.inputUser:focus ~ .labelInput, 
.inputUser:valid ~ .labelInput{
    
    top: -20px;
    font-size: 12px;
    color: dodgerblue;
}

#datanascimento{
    border: none;
    padding: 8px;
    border-radius: 10px;
    outline: none;
}

#submit{
    background-image: linear-gradient(to right, rgb(0, 92, 197),  rgb(90, 20, 220));
    border: none;
    width: 100%;
    padding: 15px;
    border-radius: 10px;
    color: white;
    font-size: 15px;
    cursor: pointer;
}

#submit:hover{
    background-image: linear-gradient(to right, rgb(0, 80, 172),  rgb(80, 19, 195));
}
</style>
</head>
<body>
<a href="Código\homeMotorista.php">Voltar para home</a>
    <div class="box">
        <?php 
        if($msg != ""){
            echo "<h1> $msg </h1>";
        }
        
        ?>
        <form action="cadastroMotorista.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Motorista</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                   
                </div>
                <br>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                   
                </div>
                <br>
                <br>
                <div class="inputBox">
                    <input type="number" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">CPF</label>
                   
                </div>
                <br>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                   
                </div>
                <br>
                <br>

                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Número de telefone</label>
                   
                </div>
                <br>
                <br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br>
                <br>

                    <label for="datanascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" name="datanascimento" id="datanascimento" required>
          
                <br>
                <br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="telefone" class="labelInput">Cidade</label>
                   
                </div>
                <br>
                <br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                   
                </div>
                <br>
                <br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                   
                </div>
                <br>
                <br>
                <div class="inputBox">

                    <input type="number" name="numregistro" id="numregistro" class="inputUser" required>
                    <label for="numregistro" class="labelInput">Nº de Registro</label>
                   
                </div>
                <br>
                <br>
                
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>