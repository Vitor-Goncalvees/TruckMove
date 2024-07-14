create database truckmoveteste;
use truckmoveteste;


CREATE TABLE Motorista(
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
  carteira_motor VARCHAR(60) NOT NULL
) engine InnoDB;

insert into Motorista values(2,'lucas',1234,23456,'lucas@email',319876,'Masculino',01/11/2006,'BH','MG', 'Rua Canaã','632652652');

CREATE TABLE Veiculo(
id_veiculo int primary key not null auto_increment,
veiculo VARCHAR(30) NOT NULL,
placa VARCHAR(7) NOT NULL,
ano varchar(100) not null,
modelo varchar(50) not null,
id_motorista int not null,
foreign key (id_motorista) references Motorista(ID)
)engine InnoDB;

insert into veiculo values(default,'camionete','12345',2017,'Honda',1);
insert into veiculo values(default,'moto','12345',2018,'Fiat',2);


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


create table Pedido(
id_pedido int not null auto_increment primary key,
id_cliente int,
volume_carga varchar(30),
distancia double,
status_pedido bool not null,
partida varchar(100) not null,
destino varchar(100) not null,
tipo_veiculo VARCHAR(30) NOT NULL,
id_motorista INT,
foreign key (id_motorista) references Motorista(ID)
);




CREATE TABLE Ajudante(
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
)
;

select * from cliente;
select* from pedido;
select * from motorista;
select * from veiculo;

SELECT email FROM
Motorista
join Veiculo using(id_motorista);

select id from motorista where email = 'lucas@email'; 

