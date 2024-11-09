<?php

if(isset($_POST['submit'])){

    /*print_r('Nome: ' . $_POST['nome']);
    print_r('<br>');

    print_r('CPF: ' . $_POST['cpf']);
    print_r('<br>');

    print_r('Email: '. $_POST['email']);
    print_r('<br>');

    print_r('Telefone: '. $_POST['telefone']);
    print_r('<br>');

    print_r('Sexo: '. $_POST['genero']);
    print_r('<br>');

    print_r('Data de Nascimento: '. $_POST['datanascimento']); 
    print_r('<br>');

    print_r('Cidade: '. $_POST['cidade']); 
    print_r('<br>');

    print_r('Estado: '. $_POST['estado']); 
    print_r('<br>');

    print_r('Endereço: '. $_POST['endereco']);
    print_r('<br>');

    print_r('Veículo: '. $_POST['tipo']);
    print_r('<br>');

    print_r('Placa: '. $_POST['placa']);
    print_r('<br>');
    
    print_r('Carteira de Motorista: '. $_POST['carteiramotor']);
    */

    session_start();

    include_once('../Model/config.php');

    $email = $_SESSION['email'];

    
     

    $veiculo = $_POST['tipo'];
    $placa =  $_POST['placa'];
    $ano = $_POST['ano'];
    $modelo =  $_POST['modelo'];
    //$email = $_POST['email'];
    $id_motorista =  $_POST['motoristaid'];
   
   

    $result = mysqli_query($conexao, "INSERT INTO veiculo (id_veiculo, veiculo, placa, ano, modelo, id_motorista) VALUES (default,'$veiculo','$placa','$ano','$modelo','$id_motorista')");

   
    header('Location: veiculos.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Veiculo</title>

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
<a href="veiculos.php">Voltar</a>
    <div class="box">
        <form action="cadastroVeiculo.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Veiculo</b></legend>

                <br>
                <div class="inputBox">
                    <h2 for="">Tipo do veiculo</h2>
                    <input type="radio" id="caminhao" name="tipo" value="caminhao" required>
                    <label for="caminhao">Caminhão</label>
                    <input type="radio" id="camionete" name="tipo" value="camionete" required>
                    <label for="camionete">Camionete</label>
                    <input type="radio" id="carrocon" name="tipo" value="carrocon" required>
                    <label for="carrocon">Carro convencional</label>
                    <input type="radio" id="carroutili" name="tipo" value="carroutili" required>
                    <label for="carroutili">Carro Utilitário</label>
                    <input type="radio" id="moto" name="tipo" value="moto" required>
                    <label for="moto">Moto</label>
                </div>
                <br>

                <br>
                <div class="inputBox">
                    <input type="text" name="placa" id="placa" class="inputUser" required>
                    <label for="placa" class="labelInput">Placa </label>
                   
                </div>
                <br>

                <br>
                <div class="inputBox">
                    <input type="text" name="ano" id="ano" class="inputUser" required>
                    <label for="ano" class="labelInput">Ano</label>
                   
                </div>
                <br>

                <br>
                <div class="inputBox">
                    <input type="text" name="modelo" id="modelo" class="inputUser" required>
                    <label for="modelo" class="labelInput">Modelo</label>
                   
                </div>
                <br>

                <br>
                <div class="inputBox">
                    <input type="number" name="motoristaid" id="motoristaid" class="inputUser" required>
                    <label for="motoristaid" class="labelInput">seu ID</label>
                   
                </div>
                <br>
                
                <br>
                <input type="submit" name="submit" id="submit">

            </fieldset>
        </form>
    </div>
</body>
</html>