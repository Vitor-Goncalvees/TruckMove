<?php
include_once('config.php');
session_start();
$email = $_SESSION['email'];

if (!isset($_SESSION["email"])){
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

// Query para selecionar ofertas
$sql = "SELECT O.id_motorista, P.id_pedido, O.valor 
FROM Oferta as O
JOIN Pedido as P ON O.id_pedido = P.id_pedido
WHERE P.id_cliente = ? and  status_pedido = 1";

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Sistema</title>
</head>
<body>
    <nav id="sidebar">
        <div id="sidebar_content">
            <div id="user">
                <img src="" id="user-avatar" alt="">
                <p id="user_infos">
                    <span class="item-description">fulano tal</span>
                    <span class="item-description">fulnaninho</span>
                </p>
            </div>
            <ul id="side_itens">
                <li class="side-item active">
                    <a href="sistema.php">
                        <i class="fa-solid fa-home"></i>
                        <span class="item-description">Home</span>
                    </a>
                </li>
                <li class="side-item active">
                    <a href="pedido.php">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span class="item-description">Ver Pedidos</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="VerOfertas.php">
                        <i class="fa-solid fa-truck"></i>
                        <span class="item-description">Ver Ofertas</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="pedAceito.php">
                        <i class="fa-solid fa-bell"></i>
                        <span class="item-description">Ver Pedidos em Andamento</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="paginaEditarPerfil.php">
                        <i class="fa-solid fa-user"></i>
                        <span class="item-description">Ver meu Perfil</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="historico.php">
                        <i class="fa-solid fa-address-book"></i>
                        <span class="item-description">Ver Histórico</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="calendario.php">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span class="item-description">Ver Calendário</span>
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
                    <span class="item-description">Sair</span>
                </a>
            </button>
        </div>
    </nav>

    <main>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID do Motorista</th>
                        <th scope="col">ID do Pedido</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($result) {
                    // Verifica se existem resultados
                    if ($result->num_rows > 0) {
                        $i = 1; // contador para a numeração
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row['id_motorista'] . "</td>";
                            echo "<td>" . $row['id_pedido'] . "</td>";
                            echo "<td>" . $row['valor'] . "</td>";
                            echo '<td>';
                            // Aqui você pode adicionar links ou botões para ações
                            echo '<form action="recusarOferta.php" method="post" style="display:inline;">';
                            echo '<input type="hidden" name="id_pedido" value="' . $row['id_pedido'] . '">';
                            echo '<button type="submit" class="btn btn-danger">Recusar oferta</button>';
                            echo '</form>';
                            echo '</td>';
                            
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum resultado encontrado.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Erro ao executar a consulta: " . $conexao->error . "</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </main>
        
   <script src="js/script.js"></script>
</body>
</html>
