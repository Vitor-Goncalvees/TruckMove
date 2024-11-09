<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>TruckMove</title>
</head>

<style>

*{ box-sizing: border-box;
    padding: 0;
    margin: 0;

}

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


.button{
    background-color: #FF8B03;
    color: #FFFFFF;
}

body {
    font-family: 'Poppins', sans-serif;
    background-image: linear-gradient(to right, #00a1ff, #003082);
    background-size: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    width: 100%;
    overflow-x: hidden;
}


header{
    display: grid;
    grid-template-columns: 20% 30% 40% 10%;
    grid-template-rows: 10% 50% 20% 20%;
    width: 100%;
    height: 80vh;
    
}

.container{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    min-height: 100vh;
    padding: 20px;
}

#circulo-header{
    background-color: #003082;
    border-bottom-left-radius: 90%;
    border-bottom-right-radius: 100%;
    width: 150%;
    grid-column: 1/5;
    grid-row: 1/5;
    justify-self: center; 
}

#logotipo {
    position: absolute; 
    top: 0; 
    left: 5%;
}

#logotipo img {
    width: 120px; 
    height: auto; 
}

.icon_perfil {
    grid-column: 4;  
    grid-row: 1;  
    display: flex;
    justify-content: flex-end;  
    align-items: flex-start;    
    padding-top: 20px;
    padding-right: 20px;  
}

.icon_perfil img {
    width: 120px;
    height: auto;
}

.caminhao1{
    width: 100px;
    height: auto;
    position: absolute; 
    left: 45%; 
    top: 10px;
}


#botao_header_index{
    grid-column: 1;
    grid-row: 3;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
    border: none;
    width: 10vw;
    height: 4vh;
    
}

#texto-header-index {
    color: #FF8B03;
    margin-top: 80px;
    margin-left: 50px; 
    font-size: 4vh;
    grid-column: 1;
    grid-row: 2;
    font-size: 30px;
}

.titulo_part_2{
    color:#FF8B03;
    font-size: 30px;
    text-align: center;
    margin: 0 auto;
}

.titulo_part_3{
    color:#FF8B03;
    font-size: 30px;
    text-align: center;
    margin: 0 auto;
}

#entre_no_app {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    gap: 20px;
    max-width: 80%;
    margin: 0 auto;
}

#cadastre-se {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    gap: 20px;
    max-width: 80%;
    margin: 0 auto;
}

#texto_cad {
    text-align: left;
    flex: 1;
    font-size: 27px;
}

#entre {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    gap: 20px;
    max-width: 80%;
    margin: 0 auto;
}

#texto_enter {
    text-align: left;
    flex: 1;
    font-size: 27px;
}

.img_cad {
    max-width: 270px; 
    margin-right: 20px; 
}

.texto_cadastro {
    color: #FF8B03;
    font-size: 27px;
    text-align: left;
    flex: 1;
}

.cadastro_item {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
}

.image {
    width: 270px; 
    margin-right: 10px;
}

.texto_span {
	width: 40%;
    color: #FF8B03;
    font-size: 27px;
}

.cadastrar {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: none;
    margin: 0;
}

.cadastrar img {
    width: 100%;
    border-radius: 15px;
}

.circle-button {
    margin-top: 20px;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    border: none;
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s ease;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    margin-top: 20px;
    padding: 0;
    background: none;
}

.circle-button img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    transition: transform 0.3s ease;
}

.circle-button:hover img {
    transform: scale(1.1); 
}

.quadrado_azul {
    width: 367px;
    padding: 30px;
    padding-bottom: 80px;
    border-radius: 40px;
    background-color: #003082;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: 0 10px; 
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

.quadrado_azul_2 {
    width: 340px;
    padding: 30px;
    padding-bottom: 80px;
    border-radius: 40px;
    background-color: #003082;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: 0 10px; 
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}



.cad_cliente {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    max-width: 100%;
}

.legenda_cad {
    font-size: 30px;
    color: #ffffff;
}

.subtxt {
    margin-top: 20px;
    font-size: 18px;
    color: #ff8b03;
}

.sobre_nos {
    display: flex;
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
    padding: 20px; 
}


.content {
    display: flex; 
    align-items: center; 
}

.image2 {
    max-width: 50%; 
    height: auto; 
    margin-left: 20px; 
}

.text {
    flex: 1; 
}

.text h1 {
    font-size: 35px; 
    color: #ff8b03; 
    margin-bottom: 10px; 
}

.text span {
    font-size: 18px; 
    color: #666666; 
    line-height: 1.6; 
}

.text1{
    color: #003082;
}

#balanca{
    width: 250px;
    height: auto;
}

#rodape {
    position: relative;
    background-color: #003082;
    overflow: hidden;
    padding-top: 50px; 
    text-align: center; 
}

#circulo-footer {
    background-color: #003082;
    border-top-left-radius: 100%;
    border-top-right-radius: 90%;
    width: 150%;
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: -1;
}

.rodape-conteudo {
    position: relative;
    z-index: 1;
    padding: 30px 30px; 
    color: #ff8b03; 
    text-align: center; 
}

.hero {
    text-align: center;
    background-color: #007bff; 
    color: white;
    padding: 50px 20px;
}

.section {
    padding: 40px 20px;
    text-align: center;
}

.about-us {
    background-color: #f0f8ff; 
}

.commitment {
    background-color: #d8e2ff; 
}

.box2 {
            position: absolute;
            top: 20px;
            left: 100px;
        }

        .circle-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .circle-button img {
            width: 150px;
            height: auto;
            
        }

</style>
<body>

<div class="box2">
        <a href="../../index.php">
            <button class="circle-button">
                <img src="../../Imgs/botao/Botao_Voltar.png" alt="botão de voltar">
            </button>
        </a>
    </div>


    <section class="container">
        <div class="titulo_part_2">
    
            <section class="cadastro">

                <div class="titulo_part_3">

                    <h1> Estamos felizes em tê-lo aqui!!! <br>
						Você gostaria de fazer login na sua conta<br>
						existente ou prefere criar uma nova <br>
						conta?</h1>
					<br>
                </div>

                <section class="cadastrar">
                    <div class="quadrado_azul">
                        <div class="cad-cliente">
                            <img id="cliente" src="../../Imgs/Icones/entrarr.png" alt="celular" style="width: 250px;px;height:auto;">
                            <br>    
                            <br>
                                <p class="legenda_cad">Entre com sua conta para pegar mais serviços</p>
                                    <h5 class="subtxt">Confira agora!!!</h5>
                                    <br>                    
                                    <a href="TelaLogin.php">
                                        <button class="circle-button">
                                        <img src="../../Imgs/botao/botao_cad.png" alt="botão">
                                         </button>
                                     </a>
                                     <br>
                        </div>
                    </div>
                    
                    <div class="quadrado_azul_2">
                                 <div class="cad-cliente">
                                     <img id="motorista" src="../../Imgs/perfil/cadastro.png" alt="caminhão" style="width: 250px;height:auto;">
                                         <p class="legenda_cad">Cadastre-se como motorista para começar a encontrar serviço</p>
                                             <h5 class="subtxt">Confira agora!!!</h5>
                                                <br>
                                                <a href="cadastroMotorista.php">
                                                        <button class="circle-button" type="button">
                                                         <img src="../../Imgs/botao/botao_cad.png" alt="botão">
                                                        </button>
                                                    </a>
                                                <br>
								</div>
					</div>
                </section>
            </section>
        </div>
	</section>
    <br>
</body>
</html>