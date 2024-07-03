create database truckmoveinicial;
use truckmoveinicial;


CREATE TABLE Usuarios( -- Motorista
  ID INT primary key NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  email VARCHAR(110) NOT NULL,
  telefone VARCHAR(15) NOT NULL,
  sexo VARCHAR(15) NOT NULL,
  data_nasc DATE NOT NULL,
  cidade VARCHAR(45) NOT NULL,
  estado VARCHAR(45) NOT NULL,
  endereco VARCHAR(120) NOT NULL,
  veiculo VARCHAR(20) NOT NULL,
  placa_veiculo VARCHAR(7) NOT NULL,
  carteira_motor VARCHAR(60) NOT NULL
) engine InnoDB;


CREATE TABLE Veiculo(
id_veiculo int primary key not null auto_increment,
veiculo varchar(30) not null,
placa varchar(30) not null,
ano varchar(100) not null,
modelo varchar(50) not null,
id_motorista int not null,
foreign key (id_motorista) references Usuario(ID)
)engine InnoDB;


insert into usuario values(default,'paulo',1122, 1234, 'paulo@gmail.com', 123456, 'masculino', 11-08-2000, 'belo','minas','santa cruz','caminhao',999999,123456);
insert veiculo values (default,'caminhao',999999,123456,'ford',1);




create table Cliente(
ID INT primary key NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  email VARCHAR(110) NOT NULL,
  telefone VARCHAR(15) NOT NULL,
  sexo VARCHAR(15) NOT NULL,
  data_nasc DATE NOT NULL,
  cidade VARCHAR(45) NOT NULL,
  estado VARCHAR(45) NOT NULL,
  endereco VARCHAR(120) NOT NULL
);


create table Pedidos(
id_pedido int auto_increment primary key,
id_cliente int,
volume_carga varchar(30),
distancia double
);


CREATE TABLE Ajudante(
ajudante_id int auto_increment primary key,
nome varchar (200),
cpf char(14),
email varchar(50),
telefone varchar(40),
username VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)
;

select * from cliente;
select* from pedidos;
select * from usuario;
select * from veiculo;
