<?php

include_once('config.php');
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
    } else {
        echo "Erro: id_pedido ou oferta não foram enviados.";
    }
} else {
    echo "Método de envio inválido.";
}



?>