<?php

session_start();
include_once('config.php'); 

//print_r($_SESSION);
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: TelaLogin.php');
}
else
{
    
    $logado = $_SESSION['email'];
}

    
  


               
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sistema</title>

    <style>

    body{
    background-image: linear-gradient(to left, #003082,  rgb(20, 147, 220));
    color:white; 
        }
        
    .barra-menu{
        background-color: #003082;
        display: flex;
        justify-content: start; 

    }    

       
    </style>
</head>
<body>
<nav class="navbar bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
    <a class="navbar-brand">TruckMove</a>
    <a  href="deslogar.php" class="btn btn-outline-success" type="submit" style="background-color: red; color:white;">Deslogar</a>
  </div>
</nav>
    <section class="barra-menu">
    <div class="box">
        <a class="btnpedi" href="buscarPedido.php">Ver Pedidos</a>
        <a class="btnpedi" href="veiculos.php">Ver Veiculos</a>
        <a  class="btnpedi" href="pedAceito.php">Ver Pedidos em andamento</a>
        <a  class="btnpedi" href="paginaEditarPerfil.php">Ver Perfil</a>
    </div>
    </section>
    <h1>Acessou o Sistema Motorista</h1>

   
</body>
</html>