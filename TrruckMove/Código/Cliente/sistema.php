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

        .box{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.6);
    padding: 30px;
    border-radius: 15px;
    }

    #btnpedi{
    text-decoration: none;
    color: white;
    border: 3px solid dodgerblue;
    border-radius: 10px;
    padding: 10px;
    }

    #btnpedi:hover{
    background-color: #003082;
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
    <h1>Acessou o Sistema Cliente</h1>

    <div class="box">
        <a id="btnpedi" href="pedido.php">Ver Pedidos</a>
    </div>
</body>
</html>