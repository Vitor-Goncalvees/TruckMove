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

body{
    background-color: white;
    background-size: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: 'Poppins', sans-serif;  
    height: 500vh;
    width: 100%;
    grid-template-rows: repeat(4, 1fr);;
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

</style>

<body>
    <header>
        <div id="circulo-header"></div>

        <div id="logotipo">
            <img src="../../Imgs/logos/logo-temporaria.png" alt="Logotipo">
        </div>

        <div class="icon_perfil">
            <img src="../../Imgs/perfil/Perfil.png" alt="Ícone de Perfil">
        </div>
            <div id="texto-header-index">
                <p>
                    Fique tranquilo pois aqui você encontrará o melhor carreto por um preço acessível.
                </p>

                <br>

                <div class="caminhao1">

                    <img src="../../Imgs/caminhoes/caminhao1.png" alt="caminhão">

                </div>

                <br>

                <a href="Pagina_de_Cadastro/cadastro.html"><button class="button" id="botao_header_index">Comece Agora</button></a>
            </div>
    </header> 

    


    <section class="container">
        <div class="titulo_part_2">

            <h1>Como fazer o cadastro </h1>
            <br>
    
            <section class="cadastro"  >
			
				<div class="cadastro_item">
					<img src="../../Imgs/computadores/computador1.png" alt="Descrição da imagem" class="image">
					<span class="texto_span">Entre no app ou no site</span>
				</div>
				
				<div class="cadastro_item">
					<img src="../../Imgs/computadores/computador2.png" alt="Descrição da imagem" class="image">
					<span class="texto_span">Crie uma conta (caso já possua, basta fazer o login em sua conta)</span>
				</div>
    
                <div class="cadastro_item">
					<img src="../../Imgs/computadores/computador3.png" alt="Descrição da imagem" class="image">
					<span class="texto_span">Entre e escolha seu próximo destino</span>
				</div>
<br>

                <div class="titulo_part_3">

                    <h1> Escolha como os nossos <br> serviços podem lhe atender </h1>
            <br>
                </div>

                <section class="cadastrar">
                    <div class="quadrado_azul">
                        <div class="cad-cliente">
                            <img id="cliente" src="../../Imgs/computadores/celular.png" alt="celular">
                                <p class="legenda_cad">Cadastre-se para encontrar os carretos</p>
                                    <h5 class="subtxt">Confira agora!!!</h5>
                                    <br>                    
                                    <a href="TelaLogin.php">
                                        <button class="circle-button">
                                        <img src="../../Imgs/botao/btn_avancar.png" alt="botão">
                                         </button>
                                     </a>
                                     <br>
                        </div>
                    </div>
                    
                    <div class="quadrado_azul_2">
                                 <div class="cad-cliente">
                                     <img id="motorista" src="../../Imgs/caminhoes/caminhao2.png" alt="caminhão">
                                         <p class="legenda_cad">Cadastre-se como motorista para realizar os carretos</p>
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

                <section class="sobre_nos">
                    <div class="part4">
                        <div class="content">
                            <img class="image2" src="../../Imgs/entregador/entregador_com_caminhao.png" alt="Entregador com Caminhão">
                            <div class="text">
                                <h1>Sobre Nós</h1>
                                <span class="texto_span" >Fundada em 2024, a TruckMove é uma empresa de serviços que oferece soluções acessíveis em carretos para negócios locais.</span>
                            </div>
                            
                        </div>
                    </div>
                </section>
                <br>
                <section class="compromisso">
                    <div class="part5">
                        <div>
                            <img id="balanca" src="../../Imgs/balanca/balanca.png" alt="balança">
                            <br>
                            <h1 class="text1"> 
                                Experiência, compromisso e valor.
                                    É nossa missão proporcionar isso de forma consistente a nossos clientes.
                            </h1>
                            <br>
                            <h6>TruckMove</h6>

                        </div>
                        
                    </div>

                </section>
        </div>
    </section>
    <br>
</body>
<br>

<footer id="rodape">
    <div id="circulo-footer"></div>
    <div class="rodape-conteudo">
        <h1>Vamos trabalhar juntos.</h1>
        <br>
        <h6>Endereço</h6>
        <h3>R. Santa Cruz, 546 - Barroca, Belo Horizonte - MG, 30431-228</h3>
        <br>
        <h6>E-mail</h6>
        <h3>12203025@aluno.cotemig.com.br</h3>
        <br>
        <h6>Telefone</h6>
        <h3>(31) 986401-7174</h3>
    </div>
</footer>
</html>



