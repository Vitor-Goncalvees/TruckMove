<?php
include_once('config.php');
session_start();

if (!isset($_SESSION["email"])){
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

if (isset($_POST['pedido_id'])) {
    $pedido_id = intval($_POST['pedido_id']);
    $novo_status = 1;
    $motorista_id = intval($_SESSION["motorista_id"]);

    // Atualiza o status no banco de dados
    $sql = "UPDATE pedido SET status_pedido = ?, id_motorista = ? WHERE id_pedido = ?";
    if ($stmt = $conexao->prepare($sql)) {                  
        $stmt->bind_param("iii", $novo_status, $motorista_id, $pedido_id);
        if ($stmt->execute()) {
            echo "Status alterado com sucesso!";
        } else {
            echo "Erro ao alterar status: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta UPDATE: " . $conexao->error;
    }

    $conexao->close();

    // Redireciona de volta para a página principal

    exit;
} else {
    echo "ID do pedido não fornecido.";
}
?>