<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to left, #003082, rgb(20, 147, 220));
            text-align: center;
            margin: 0;
            padding: 0;
            color: #FFA500;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        h1 {
            margin-top: 20px;
            font-size: 24px;
            color: #FFA500;
        }
        
        /* Centralizar blocos azuis */
        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: auto;
            margin-bottom: auto;
        }
        
        .card {
            background-color: #002366;
            padding: 20px;
            border-radius: 10px;
            width: 200px;
            color: #FFA500;
            text-align: center;
        }
        
        .card img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }
        
        .card p {
            font-size: 14px;
            margin-top: 10px;
            color: #FFA500;
        }
        
        /* Botão circular com imagem */
        .circle-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            transition: transform 0.3s ease;
        }

        .circle-button img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .circle-button:hover {
            transform: scale(1.2);
        }
        
        /* Estilos para o botão de voltar */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: #FFA500;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="back-button">&larr;</div>

    <h1>Estamos felizes em tê-lo aqui !!!<br>Você gostaria de fazer login na sua conta existente ou prefere criar uma nova conta?</h1>

    <div class="container">
        
        <div class="card">
            <img src="https://via.placeholder.com/80" alt="Login Icon">
            <p>Entre com sua conta para pedir ajuda aos serviços<br><small>Comece agora!!!</small></p>
            <button class="circle-button" type="button">
                <img src="Imgs/botao/botao_cad.png" alt="botão de login">
            </button>
        </div>
        
        
        <div class="card">
            <img src="https://via.placeholder.com/80" alt="Cadastro Icon">
            <p>Cadastre-se como cliente para começar a encontrar ajuda tara seus serviço<br><small>Confira agora!!!</small></p>
            <button class="circle-button" type="button">
                <img src="Imgs/botao/botao_cad.png" alt="botão de cadastro">
            </button>
        </div>
    </div>
</body>
</html>
