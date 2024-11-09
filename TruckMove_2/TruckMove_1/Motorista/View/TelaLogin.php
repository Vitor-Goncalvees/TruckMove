<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruckMove</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to left, #003082, rgb(20, 147, 220));
            text-align: center;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: #003082;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h1 {
            color: white;
            margin-bottom: 20px;
        }

        .input-field {
            margin-bottom: 20px;
            position: relative;
        }

        .input-field input {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: none;
            background-color: #f5f5f5;
            padding-right: 40px;
        }

        .input-field label {
            display: block;
            color: white;
            margin-bottom: 5px;
        }

        .input-field img {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 24px;
            height: 24px;
        }

        .button {
            width: 100%;
            padding: 10px;
            background-color: #FF8B03;
            border: none;
            border-radius: 10px;
            color: white;
            cursor: pointer;
        }

        .button:hover {
            background-color: #ff9c33;
        }

        .link {
            margin-top: 20px;
            color: white;
        }

        .link a {
            color: #ff9c33;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }

        /* Estilos para o botão de voltar */
        .box2 {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .circle-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .circle-button img {
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>

    <div class="box2">
        <a href="../../index.php">
            <button class="circle-button">
                <img src="../../Imgs/botao/Botao_Voltar.png" alt="botão de voltar">
            </button>
        </a>
    </div>

    <div class="login-container">

        <br>
        <h1>Login</h1>
        <br>

        <form action="../Controller/controleLogin.php" method="POST">

            <div class="input-field">
                <input type="email" name="email" id="email" placeholder="Digite seu email" required>
            </div>

            <br>

            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Digite sua senha" required>
                 
            </div>

            <br>

            <button type="submit" class="button">Entrar</button>
        </form>
        
        <div class="link">
            <p>Não tem uma conta? <br>
            <a href="cadastroMotorista.php"> Cadastre-se</a></p>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#toggle-password');
        const passwordField = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
        });
    </script>

</body>
</html>