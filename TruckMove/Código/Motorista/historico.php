
<?php

include_once('config.php');
session_start();
$email = $_SESSION['email'];

if (!isset($_SESSION["email"])) {
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

$sql = "SELECT * FROM pedido WHERE status_pedido = 3 and id_motorista = ?"; //colocar a do motorista
$params = [$_SESSION["motorista_id"]];
$types = 's'; // Tipo de dado para os parâmetros (s para string)

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM pedido WHERE (id LIKE ? OR id_cliente LIKE ? OR partida LIKE ? OR destino LIKE ?) AND status_pedido = 1 ";
    $params = ["%$data%", "%$data%", "%$data%", "%$data%", $email];
    $types = 'sssss'; // Tipo de dado para os parâmetros (s para string)
}

$stmt = $conexao->prepare($sql);

// Bind dos parâmetros
$stmt->bind_param($types, ...$params);

// Execução da consulta
$stmt->execute();
$result = $stmt->get_result();



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
    
    <br>
    <h1>Histórico de Carretos Realizados</h1>
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
                    <th scope="col">Status</th>
                    <th scope="col">ID do Cliente</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Distância</th>
                    <th scope="col">Partida</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Veiculo</th>
                    <th scope="col">ID do Motorista</th>
                    <th scope="col">Ação</th>
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
                            echo "<td>" . $rows[$i]['status_pedido'] . "</td>";
                            echo "<td>" . $rows[$i]['id_cliente'] . "</td>";
                            echo "<td>" . $rows[$i]['volume_carga'] . "</td>";
                            echo "<td>" . $rows[$i]['distancia'] . "</td>"; 
                            echo "<td>" . $rows[$i]['partida'] . "</td>";
                            echo "<td>" . $rows[$i]['destino'] . "</td>";
                            echo "<td>" . $rows[$i]['tipo_veiculo'] . "</td>";
                            echo "<td>" . $rows[$i]['id_motorista'] . "</td>";
                            echo '<td>
                                    <form action="alterar_status.php" method="post" style="display:inline;">
                                        <input type="hidden" name="pedido_id" value="' . $rows[$i]["id_pedido"] . '">
                                        <button type="submit" class="btn btn-warning">Cancelar Pedido</button>
                                    </form>

                                  </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>Nenhum resultado encontrado.</td></tr>";
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
        window.location = 'pedAceito.php?search=' + search.value;
    }
</script>
<script src="script.js"></script>
</html>
<!-- <input type="hidden" name="pedido_status" value="' . $rows[$i]["status_pedido"] . '"> --> 
