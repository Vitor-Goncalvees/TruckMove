<?php

include_once('../Model/config.php');
session_start();

if (!isset($_SESSION["email"])) {
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
     // Verifique se o campo 'id_pedido' e 'oferta' estão presentes no POST
    if (isset($_POST['id_pedido']) && isset($_POST['oferta'])) {
        $pedido = $_POST['id_pedido'];
        $motorista = $_SESSION['motorista_id'];  // Certifique-se que esta sessão está sendo definida corretamente
        $cliente = $_POST['id_cliente'];
        $oferta = $_POST['oferta'];

        // Executar o INSERT na tabela Oferta
        $query = "INSERT INTO Oferta (id_motorista, id_cliente, id_pedido, valor) VALUES ('$motorista','$cliente', '$pedido', '$oferta')";
        $result = mysqli_query($conexao, $query);

        // Verificar se o INSERT foi bem-sucedido
        if ($result) {
            echo "Oferta enviada com sucesso!";
        } else {
            // Exibir mensagem de erro detalhada
            echo "Erro ao enviar oferta: " . mysqli_error($conexao);
        }

        // Consulta para obter o status atual do pedido
        $sql = "SELECT status_pedido FROM pedido WHERE id_pedido = ?";
        if ($stmt = $conexao->prepare($sql)) {
            $stmt->bind_param("i", $pedido_id);
            $stmt->execute();
            $stmt->bind_result($status_atual);
            $stmt->fetch();
            $stmt->close();

            // Alterna o status
            $novo_status = ($status_atual == 1) ? 2 : 1;

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


    } else {
        echo "Erro: id_pedido ou oferta não foram enviados.";
    }
} else {
    echo "Método de envio inválido.";
}



?>