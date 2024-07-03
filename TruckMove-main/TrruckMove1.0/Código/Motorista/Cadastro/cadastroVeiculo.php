<?php
/*
    include_once('config.php');
     $listapedi = $_POST['tipo'];
     $sql = "";
     $result = "";
     
         if($listapedi == "caminhao")
         {
             $sql = "SELECT * FROM usuarios WHERE veiculo = caminhao"; 
             $result = $conexao -> query($sql);
         }
         else if($listapedi == "camionete")
             {
                 $sql = "SELECT * FROM usuarios WHERE veiculo = caminhao"; 
                 $result = $conexao -> query($sql);
             }
     
         else if($listapedi == "carrocon")
         {
             $sql = "SELECT * FROM usuarios WHERE veiculo = carroconven"; 
             $result = $conexao -> query($sql);
         }    
     
          else if($listapedi == "carroutili")  
          {
             $sql = "SELECT * FROM  usuarios WHERE veiculo = carroutili"; 
             $result = $conexao -> query($sql);
          }
         
         else if($listapedi == "moto")
         {
             $sql = "SELECT * FROM  usuarios WHERE veiculo = motoca"; 
             $result = $conexao -> query($sql);
         } 
         
         else
         {
             echo"Não encontramos os pedidos";
         }
 
 
     

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
         <form action="cadastroVeiculo.php" method="POST">

            <p>Seu Veículo:</p>
            
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

                <input type="submit" name="submit" id="submit">

        </form>
                <br>
                <br>
                <div class="inputBox">
                    <input type="number" name="placa" id="placa" class="inputUser" required>
                    <label for="placa" class="labelInput">Placa do Veículo</label>
                   
                </div>
                <br>
                <br>
                <div class="inputBox">

                    <input type="number" name="carteiramotor" id="carteiramotor" class="inputUser" required>
                    <label for="carteiramotor" class="labelInput">Número da Carteira de Motorista</label>
                   
                </div>
                <br>
                <br>
                <div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Senha</th>
            <th scope="col">CPF</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Sexo</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">Endereço</th>
            <th scope="col">Veículo</th>
            <th scope="col">Placa do Veículo</th>
            <th scope="col">Carteira de Motorista</th>
            <th scope="col">...</th>
            </tr>
        </thead>
        
            <tbody>

                <?php
                    
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    $numRows = count($rows);
                    if ($numRows > 0)
                    {
                      for($i = 0; $i < $numRows; $i++)
                      {
                          echo $rows[$i]['veiculo'] . "\n";
                          echo $rows[$i]['placa_veiculo'] . "\n";
                          echo $rows[$i]['carteira_motorista'] . "\n";
                      }
                    }
              
                    else
                    {
                      echo "Nenhum resultado encontrado.";
                    }
                
                ?>
                
            </tbody>
       
        </table> 
    </div>
</body>
</html>
*/
?>



<?php

include_once('config.php');
session_start();

if (!isset($_SESSION["email"])){
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

$sql = "SELECT * FROM usuarios";
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%'";
}

$result = $conexao->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $listapedi = $_POST['tipo'];
    $sql = "";

    if ($listapedi == "caminhao") {
        $sql = "SELECT * FROM usuarios WHERE veiculo = 'caminhao'";
    } elseif ($listapedi == "camionete") {
        $sql = "SELECT * FROM usuarios WHERE veiculo = 'camionete'";
    } elseif ($listapedi == "carrocon") {
        $sql = "SELECT * FROM usuarios WHERE veiculo = 'carrocon'";
    } elseif ($listapedi == "carroutili") {
        $sql = "SELECT * FROM usuarios WHERE veiculo = 'carroutili'";
    } elseif ($listapedi == "moto") {
        $sql = "SELECT * FROM usuarios WHERE veiculo = 'motoca'";
    } else {
        echo "Não encontramos os pedidos";
    }

    if (!empty($sql)) {
        $result = $conexao->query($sql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Visualização de Pedidos</title>
    <style>
        body {
            background-image: linear-gradient(to left, #003082, rgb(20, 147, 220));
            color: white;
        }
        #submit {
            background-color: #ff8426ff;
            color: white;
            border: none;
            border-radius: 6px;
        }
        svg {
            height: 2vh;
            fill: white;
        }
        .box-search {
            display: flex;
            justify-content: flex-end;
            gap: .1%;
        }
    </style>
</head>
<body>
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a  href="sistema.php" class="navbar-brand">TruckMove</a>
            <a href="deslogar.php" class="btn btn-outline-success" type="submit" style="background-color: red; color:white;">Deslogar</a>
        </div>
    </nav>
    <form action="cadastroVeiculo.php" method="POST">
        <p>Selecione o tipo de veículo para ver os pedidos disponíveis:</p>
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
        <input type="submit" name="submit" id="submit">
    </form>
    <br>
    <h1>Pedidos Disponíveis</h1>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchdata()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
        </button>
    </div>
    <br>
    <br>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Senha</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Veículo</th>
                    <th scope="col">Placa do Veículo</th>
                    <th scope="col">Carteira de Motorista</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    $numRows = count($rows);
                    if ($numRows > 0) {
                        for ($i = 0; $i < $numRows; $i++) {
                            echo "<tr>";
                            echo "<td>" . ($i + 1) . "</td>";
                            echo "<td>" . $rows[$i]['nome'] . "</td>";
                            echo "<td>" . $rows[$i]['senha'] . "</td>";
                            echo "<td>" . $rows[$i]['cpf'] . "</td>";
                            echo "<td>" . $rows[$i]['email'] . "</td>";
                            echo "<td>" . $rows[$i]['telefone'] . "</td>";
                            echo "<td>" . $rows[$i]['sexo'] . "</td>";
                            echo "<td>" . $rows[$i]['data_nasc'] . "</td>";
                            echo "<td>" . $rows[$i]['cidade'] . "</td>";
                            echo "<td>" . $rows[$i]['estado'] . "</td>";
                            echo "<td>" . $rows[$i]['endereco'] . "</td>";
                            echo "<td>" . $rows[$i]['veiculo'] . "</td>";
                            echo "<td>" . $rows[$i]['placa_veiculo'] . "</td>";
                            echo "<td>" . $rows[$i]['carteira_motor'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='15'>Nenhum resultado encontrado.</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');
    search.addEventListener("keydown", function(event) {
        if (event.key == "Enter") {
            searchdata();
        }
    });
    function searchdata() {
        window.location = 'cadastroVeiculo.php?search=' + search.value;
    }
</script>
</html>