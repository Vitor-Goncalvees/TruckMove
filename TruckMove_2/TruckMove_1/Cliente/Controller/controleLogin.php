<?php
session_start();

//print_r($_REQUEST);

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
// vai acessar
include_once('../Model/config.php');
$email = $_POST['email'];
$senha = $_POST['senha'];

/*print_r('Email: '. $email);
print_r('Senha: '. $senha);
*/

$sql ="SELECT * FROM cliente WHERE email = '$email' and senha = '$senha'";

$result = $conexao ->query($sql);

/*
print_r($sql);
print_r($result);
*/

if(mysqli_num_rows($result) < 1)
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../View/TelaLogin.php');
}
else
{
    $cliente = $result->fetch_array();

    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['id_cliente'] = $cliente["id_cliente"];
    header('Location: ../View/sistema.php');
}
}
else{
    // não vai acessar a página
    header('Location: ../View/TelaLogin.php');
}

?>