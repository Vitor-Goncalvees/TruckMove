<?php
include_once('config.php');
session_start();

if (!isset($_SESSION["email"])) {
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

// Verifica se o ID do pedido foi enviado
if (isset($_POST['id_pedido'])) 
{
    $id_pedido = $_POST['id_pedido'];

    // Atualiza o status do pedido para 0
    $sql = "UPDATE Pedido SET status_pedido = 2 WHERE id_pedido = ?";
    
    // Prepare a declaração
    $stmt = $conexao->prepare($sql);
    
    if ($stmt) 
    {
        // Bind do parâmetro
        $stmt->bind_param('i', $id_pedido); // 'i' indica que é um inteiro
        
        // Execute a consulta
        if ($stmt->execute()) {
            // Redireciona de volta para a página anterior com sucesso
            echo "Oferta recusada com sucesso";
            header("Location: VerOfertas.php?msg=Oferta recusada com sucesso!");
            exit;
        } else {
            echo "Erro ao recusar a oferta: " . $conexao->error;
        }
     } else {
        echo "Erro ao preparar a consulta: " . $conexao->error;
     }
    } else {
    echo "ID do pedido não foi fornecido.";
}
?>
