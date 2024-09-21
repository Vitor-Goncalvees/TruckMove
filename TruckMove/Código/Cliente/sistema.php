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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Sistema</title>

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
                 <a href="pedido.php">
                 <i class="fa-solid fa-clipboard-list"></i>
                    <span class="item-description"> 
                        Ver Pedidos
                    </span>
                </a>
            </li>

            <li class="side-item">
                 <a href="VerOfertas.php">
                 <i class="fa-solid fa-truck"></i>
                    <span class="item-description"> 
                        Ver Ofertas
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

            <li class="side-item">
                 <a  href="calendario.php">
                 <i class="fa-solid fa-calendar-days"></i>
                    <span class="item-description"> 
                        Ver Calendário
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
        <h1 id="cabeca">Área restrita do Cliente</h1>
    </main>
        

   <script src="js/script.js"></script>
</body>
</html>

   

