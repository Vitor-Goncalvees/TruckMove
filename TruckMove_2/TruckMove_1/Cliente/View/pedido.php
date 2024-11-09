
<?php

include_once('../Model/config.php');
session_start();
$email = $_SESSION['email'];

if (!isset($_SESSION["email"])){
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

$sql = "SELECT * FROM pedido WHERE id_cliente = ?";
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM pedido WHERE id LIKE '%$data%' or id_cliente LIKE '%$data%' or partida LIKE '%$data%' or destino LIKE '%$data%'";
}
// $result = $conexao->query($sql);

// Prepare a declaração
$stmt = $conexao->prepare($sql);

// Verifique se a preparação foi bem-sucedida
if ($stmt) {
    // Bind do parâmetro
    $stmt->bind_param('i', $_SESSION['id_cliente']); // 'i' indica que é um inteiro
    // Execute a consulta
    $stmt->execute();
    // Obter resultados
    $result = $stmt->get_result();
} else {
    echo "Erro ao preparar a consulta: " . $conexao->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $listapedi = $_POST['tipo'];
    $sql = "";

    if ($listapedi == "caminhao") {
        $sql = "SELECT * FROM pedido WHERE tipo_veiculo = 'caminhao'";
    } elseif ($listapedi == "camionete") {
        $sql = "SELECT * FROM pedido WHERE tipo_veiculo = 'camionete'";
    } elseif ($listapedi == "carrocon") {
        $sql = "SELECT * FROM pedido WHERE tipo_veiculo = 'carrocon'";
    } elseif ($listapedi == "carroutili") {
        $sql = "SELECT * FROM pedido WHERE tipo_veiculo = 'carroutili'";
    } elseif ($listapedi == "moto") {
        $sql = "SELECT * FROM pedido WHERE tipo_veiculo = 'motoca'";
    } elseif ($listapedi == "todos") {
        $sql = "SELECT * FROM pedido";
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
        a{
            text-decoration: none;
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
    <a href="cadastroPedido.php" class="btn btn-outline-success" type="submit" style="background-color: green; color:white;">Cadastrar Pedido</a>
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
                    <th scope="col">ID do Cliente</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Distância</th>
                    <th scope="col">Status</th>
                    <th scope="col">Partida</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Veiculo</th>
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
                            echo "<td>" . $rows[$i]['id_cliente'] . "</td>";
                            echo "<td>" . $rows[$i]['volume_carga'] . "</td>";
                            echo "<td>" . $rows[$i]['distancia'] . "</td>";
                            echo "<td>" . $rows[$i]['status_pedido'] . "</td>";
                            echo "<td>" . $rows[$i]['partida'] . "</td>";
                            echo "<td>" . $rows[$i]['destino'] . "</td>";
                            echo "<td>" . $rows[$i]['tipo_veiculo'] . "</td>";
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
        window.location = 'pedido.php?search=' + search.value;
    }
</script>
</html>