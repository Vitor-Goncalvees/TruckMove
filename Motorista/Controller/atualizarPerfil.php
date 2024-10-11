<?php
session_start();
include_once('../Model/config.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['email'])) {
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

$email = $_SESSION['email'];

if (isset($_POST['submit'])) {
    $nome = $conexao->real_escape_string($_POST['nome']);
    $senha = $conexao->real_escape_string($_POST['senha']); 
    $cpf = $conexao->real_escape_string($_POST['cpf']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);
    $cidade = $conexao->real_escape_string($_POST['cidade']);
    $estado = $conexao->real_escape_string($_POST['estado']);
    $endereco = $conexao->real_escape_string($_POST['endereco']);
    $carteira_motor = $conexao->real_escape_string($_POST['carteira_motor']);

    $query = "UPDATE Motorista SET 
                nome = '$nome', 
                senha = '$senha', 
                cpf = '$cpf', 
                telefone = '$telefone', 
                cidade = '$cidade', 
                estado = '$estado', 
                endereco = '$endereco', 
                carteira_motor = '$carteira_motor'
              WHERE email = '$email'";

    if ($conexao->query($query) === TRUE) {
        echo "Perfil atualizado com sucesso.";
        echo '<a class="btnpedi" href="sistema.php">Voltar a pagina Home</a>';
    } else {
        echo "Erro ao atualizar perfil: " . $conexao->error;
    }
}
?>
