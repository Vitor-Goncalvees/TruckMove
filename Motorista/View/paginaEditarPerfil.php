<?php
session_start();
include_once('../Model/config.php'); // Arquivo de configuração do banco de dados

// Verificar se o usuário está logado
if (!isset($_SESSION['email'])) {
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

$email = $_SESSION['email'];

// Buscar os dados do usuário a partir do banco de dados
$query = "SELECT * FROM Motorista WHERE email = '$email'";
$result = $conexao->query($query);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Usuário não encontrado.";
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="css/style.css">
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
      <h2>Editar Perfil</h2>
        <form action="atualizarPerfil.php" method="POST">
            <div class="inputBox">
                <input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
                <label for="nome">Nome Completo</label>
            </div>

            <div class="inputBox">
                <input type="password" name="senha" required>
                <label for="senha">Senha</label>
            </div>

            <div class="inputBox">
                <input type="text" name="cpf" value="<?php echo htmlspecialchars($usuario['cpf']); ?>" required>
                <label for="cpf">CPF</label>
            </div>

            <div class="inputBox">
                <input type="text" name="telefone" value="<?php echo htmlspecialchars($usuario['telefone']); ?>" required>
                <label for="telefone">Número de Telefone</label>
            </div>

            <div class="inputBox">
                <input type="text" name="cidade" value="<?php echo htmlspecialchars($usuario['cidade']); ?>" required>
                <label for="cidade">Cidade</label>
            </div>

            <div class="inputBox">
                <input type="text" name="estado" value="<?php echo htmlspecialchars($usuario['estado']); ?>" required>
                <label for="estado">Estado</label>
            </div>

            <div class="inputBox">
                <input type="text" name="endereco" value="<?php echo htmlspecialchars($usuario['endereco']); ?>" required>
                <label for="endereco">Endereço</label>
            </div>

            <div class="inputBox">
                <input type="text" name="carteira_motor" value="<?php echo htmlspecialchars($usuario['carteira_motor']); ?>" required>
                <label for="carteira_motor">Nº de Registro</label>
            </div>

            <input type="submit" name="submit" value="Salvar">
        </form>
    </main>

    <script src="script.js"></script>
</body>
</html>