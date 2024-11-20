<?php
include_once('../Model/config.php');
session_start();

if (!isset($_SESSION["email"])){
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

if (isset($_POST['pedido_id'])) {
    $pedido_id = $_POST['pedido_id'];

    // Consulta para obter o status atual do pedido
    $sql = "SELECT status_pedido FROM pedido WHERE id_pedido = ?";
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param("i", $pedido_id);
        $stmt->execute();
        $stmt->bind_result($status_atual);
        $stmt->fetch();
        $stmt->close();

        // Alterna o status
        $novo_status = ($status_atual == 1) ? 0 : 1;

        // Atualiza o status no banco de dados
        $sql = "UPDATE pedido SET status_pedido = ? WHERE id_pedido = ?";
        if ($stmt = $conexao->prepare($sql)) {
            $stmt->bind_param("ii", $novo_status, $pedido_id);
            if ($stmt->execute()) {
                echo "Status alterado com sucesso!";
            } else {
                echo "Erro ao alterar status: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erro na preparação da consulta UPDATE: " . $conexao->error;
        }
    } else {
        echo "Erro na preparação da consulta SELECT: " . $conexao->error;
    }

    $conexao->close();

    // Redireciona de volta para a página principal
    header("location:pedAceito.php");
    exit;
} else {
    echo "ID do pedido não fornecido.";
}
?>
