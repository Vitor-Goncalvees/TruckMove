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

session_start();


include_once('config.php');

$email = $_SESSION['email'];









$sql = "SELECT * FROM view_veiculo where email = '$email' ";

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM veiculo WHERE id LIKE '%$data%' or id_cliente LIKE '%$data%' or partida LIKE '%$data%' or destino LIKE '%$data%' ";
}

$result = $conexao->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $listapedi = $_POST['tipo'];
    $sql = "";

    if ($listapedi == "caminhao") {
        $sql = "SELECT * FROM view_veiculo WHERE veiculo = 'caminhao' and email = '$email'";
    } elseif ($listapedi == "camionete") {
        $sql = "SELECT * FROM view_veiculo WHERE veiculo = 'camionete' and email = '$email'";
    } elseif ($listapedi == "carrocon") {
        $sql = "SELECT * FROM view_veiculo WHERE veiculo = 'carrocon' and email = '$email'";
    } elseif ($listapedi == "carroutili") {
        $sql = "SELECT * FROM view_veiculo WHERE veiculo = 'carroutili' and email = '$email'";
    } elseif ($listapedi == "moto") {
        $sql = "SELECT * FROM view_veiculo WHERE veiculo = 'motoca' and email = '$email'";
    } elseif ($listapedi == "todos") {
        $sql = "SELECT * FROM view_veiculo where email = '$email'";
    }/*elseif($listapedi == "Meus"){
       $sql = "SELECT * FROM view_veiculo where email = '$email' ";
    } */
    else {
        echo "Não encontramos os veiculos";
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
    <title>Visualização de veiculos</title>
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
        a{
            text-decoration: none;
        }
        #button_cadastro{
            margin: 20px;
        }
        form{
            margin-left:30px;
        }
    </style>
</head>
<body>
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a  href="sistema.php" class="navbar-brand">TruckMove</a>
            <a href="sistema.php" class="btn btn-outline-success" type="submit" style="background-color: #f28227; color:white;">Voltar</a>
            <a href="deslogar.php" class="btn btn-outline-success" type="submit" style="background-color: red; color:white;">Deslogar</a>
        </div>
    </nav>
    <form action="veiculos.php" method="POST">
        <p>Selecione o tipo de veículo para ver os veiculos disponíveis:</p>
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
        <input type="radio" id="todos" name="tipo" value="todos" required>
        <label for="todos">Todos</label>
        <!--<input type="radio" id="meus" name="tipo" value="meus" required>
        <label for="meus">Meus</label>-->
        <input type="submit" name="submit" id="submit">
    </form>

    <a href="cadastroVeiculo.php" id="button_cadastro" class="btn btn-outline-success" type="submit" style="background-color: green; color:white;">Cadastrar Veiculo</a>
    <br>
    <h1>Veiculos Disponíveis</h1>
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
                    <th scope="col">Veiculo</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">ID do Motorista</th>
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
                            echo "<td>" . $rows[$i]['veiculo'] . "</td>";
                            echo "<td>" . $rows[$i]['placa'] . "</td>";
                            echo "<td>" . $rows[$i]['ano'] . "</td>";
                            echo "<td>" . $rows[$i]['modelo'] . "</td>";
                            echo "<td>" . $rows[$i]['id_motorista'] . "</td>";
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
        window.location = 'veiculos.php?search=' + search.value;
    }
</script>
</html>