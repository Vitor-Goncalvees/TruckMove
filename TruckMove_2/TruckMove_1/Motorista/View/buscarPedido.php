
<?php

include_once('../Model/config.php');
session_start();

if (!isset($_SESSION["email"])){
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

$sql = "SELECT * FROM pedido WHERE status_pedido = 0";
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM pedido WHERE id_pedido LIKE '%$data%' or id_cliente LIKE '%$data%' or partida LIKE '%$data%' or destino LIKE '%$data%' AND status_pedido = 0";
}

$result = $conexao->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $listapedi = $_POST['tipo'];
    $sql = "";

    if ($listapedi == "caminhao") {
        $sql = "SELECT * FROM pedido WHERE tipo_veiculo = 'caminhao' and status_pedido = 0";
    } elseif ($listapedi == "camionete") {
        $sql = "SELECT * FROM pedido WHERE tipo_veiculo = 'camionete' and status_pedido = 0";
    } elseif ($listapedi == "carrocon") {
        $sql = "SELECT * FROM pedido WHERE tipo_veiculo = 'carrocon' and status_pedido = 0";
    } elseif ($listapedi == "carroutili") {
        $sql = "SELECT * FROM pedido WHERE tipo_veiculo = 'carroutili' and status_pedido = 0";
    } elseif ($listapedi == "moto") {
        $sql = "SELECT * FROM pedido WHERE tipo_veiculo = 'motoca' and status_pedido = 0";
    } elseif ($listapedi == "todos") {
        $sql = "SELECT * FROM pedido WHERE status_pedido = 0";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
    
<nav id="sidebar">

        <div id="sidebar_content">
            <div id="user">
            <img src="" id="user-avatar" alt="">

            <p id="user_infos">

                <span class="item-description">
                    fulano tal
                </span>

                <span class="item-description">
                    fulnaninho
                </span>
            </p>
            </div>

            <ul id="side_itens">

            <li class="side-item active">
                 <a href="sistema.php">
                 <i class="fa-solid fa-home"></i>
                    <span class="item-description"> 
                        Home
                    </span>
                </a>
            </li>

            <li class="side-item active">
                <a href="buscarPedido.php">
                <i class="fa-solid fa-clipboard-list"></i>
                    <span class="item-description"> 
                        Ver Pedidos
                    </span>
                </a>
            </li>

            <li class="side-item">
                <a href="veiculos.php">
                <i class="fa-solid fa-truck"></i>
                    <span class="item-description"> 
                        Ver Meus Veículos
                    </span>
                </a>
            </li>

            <li class="side-item">
                <a  href="pedAceito.php">
                <i class="fa-solid fa-bell"></i>
                    <span class="item-description"> 
                        Ver Pedidos em Andamento
                    </span>
                </a>
            </li>

            <li class="side-item">
                <a href="paginaEditarPerfil.php">
                <i class="fa-solid fa-user"></i>
                    <span class="item-description"> 
                        Ver meu Perfil
                    </span>
                </a>
            </li>

            <li class="side-item">
                 <a  href="historico.php">
                 <i class="fa-solid fa-address-book"></i>
                    <span class="item-description"> 
                        Ver Histórico
                    </span>
                </a>
            </li>
            </ul>

            <button id="open_btn">
                <i id="open_btn_icon" class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <div id="logout">
            <button id="logout_btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="deslogar.php" id="butao_sair">
                <span class="item-description">
                    Sair
                </span>
                </a>
                
            </button>
        </div>

</nav>
   <main> 
    <form action="buscarPedido.php" method="POST">
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
        <input type="radio" id="todos" name="tipo" value="todos" required>
        <label for="todos">Todos</label>
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
                    <th scope="col">ID do Cliente</th>
                    <th scope="col">Partida</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Veiculo</th>
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
                            echo "<td>" . $rows[$i]['partida'] . "</td>";
                            echo "<td>" . $rows[$i]['destino'] . "</td>";
                            echo "<td>" . $rows[$i]['tipo_veiculo'] . "</td>";
                            // Corrigindo o botão "Ver mais"
                            echo '<td>';
                            // Adicionando o link "Ver mais" corretamente fora do form
                            echo ' <a href="detalhes.php?id_pedido=' . $rows[$i]["id_pedido"] . '" class="btn btn-info">Ver mais</a>';
                            echo '</td>';

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
    </main> 
</body>
<script>
    var search = document.getElementById('pesquisar');
    search.addEventListener("keydown", function(event) {
        if (event.key == "Enter") {
            searchdata();
        }
    });
    function searchdata() {
        window.location = 'buscarPedido.php?search=' + search.value;
    }
</script>
<script src="script.js"></script>
</html>