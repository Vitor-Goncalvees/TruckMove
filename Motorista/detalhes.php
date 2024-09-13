<?php
include_once('config.php');


$mysqli = new mysqli("localhost", "root", "", "truckmove");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


if (isset($_GET['id_pedido'])) {
    $id = (int) $_GET['id_pedido']; // Certifique-se de validar e sanitizar o ID

    // Buscar detalhes do registro no banco de dados
    $stmt = $mysqli->prepare("SELECT * FROM pedido WHERE id_pedido = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Verificar se o registro existe
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Registro não encontrado.";
        exit;
    }
} else {
    echo "ID de registro não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Pedido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
    
        
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

            <li class="side-item">
                 <a  href="calendario.php">
                 <i class="fa-solid fa-calendar-days"></i>
                    <span class="item-description"> 
                        Ver Calendário
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



<div class="container">
    <h1>Detalhes do Pedido</h1>
    
    <!-- Exibir os detalhes do pedido -->
    <div class="card">
        <div class="card-header">
            Detalhes do Pedido ID: <?php echo $row['id_pedido']; ?>
        </div>
        <div class="card-body">
            <h5 class="card-title">Informações do Pedido</h5>
            <p class="card-text"><strong>Cliente:</strong> <?php echo $row['id_cliente']; ?></p>
            <p class="card-text"><strong>Volume da Carga:</strong> <?php echo $row['volume_carga']; ?></p>
            <p class="card-text"><strong>Distância:</strong> <?php echo $row['distancia']; ?></p>
            <p class="card-text"><strong>Status do Pedido:</strong> <?php echo $row['status_pedido']; ?></p>
            <p class="card-text"><strong>Partida:</strong> <?php echo $row['partida']; ?></p>
            <p class="card-text"><strong>Destino:</strong> <?php echo $row['destino']; ?></p>
            <p class="card-text"><strong>Tipo de Veículo:</strong> <?php echo $row['tipo_veiculo']; ?></p>
            <p class="card-text"><strong>ID do Motorista:</strong> <?php echo $row['id_motorista']; ?></p>
        </div>
        <div class="card-footer text-muted">
            <a href="buscarPedido.php" class="btn btn-primary">Voltar à Lista</a>
        </div>
    </div>
</div>
<br>
<br>

<form action="calcular_distancia.php" method="post">
        <div>
            <label for="lat1">Latitude do Ponto 1:</label>
            <input type="text" id="lat1" name="lat1" required>
        </div>
        <div>
            <label for="long1">Longitude do Ponto 1:</label>
            <input type="text" id="long1" name="long1" required>
        </div>
        <div>
            <label for="lat2">Latitude do Ponto 2:</label>
            <input type="text" id="lat2" name="lat2" required>
        </div>
        <div>
            <label for="long2">Longitude do Ponto 2:</label>
            <input type="text" id="long2" name="long2" required>
        </div>
        <button type="submit">Calcular Frete</button>
    </form>

<script src="script.js"></script>
</body>
</html>