create database truckmove;
use truckmove;


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
status_pedido int not null,
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

CREATE TABLE Events(
ID int primary key auto_increment,
title varchar(220),
color varchar(45),
start date,
end date
)
;

CREATE OR REPLACE VIEW view_veiculo
as
select id_veiculo, veiculo, placa, ano, modelo, id_motorista, email
from veiculo 
join motorista on (veiculo.id_motorista = motorista.ID);

CREATE OR REPLACE VIEW view_pedido
as
select id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista, email
from pedido
join cliente on (pedido.id_cliente = cliente.ID)
WHERE id_motorista is null;


CREATE OR REPLACE VIEW view_pedido_motorista
as
select id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista, email
from pedido
join motorista on (pedido.id_motorista = motorista.ID);



select * from cliente;
select* from pedido;
select * from motorista;
select * from veiculo;
select * from view_veiculo;
select * from view_pedido_motorista;
select * from view_pedido;

-- INSERTS
insert into Cliente values(1,'vitor',1234,23456,'lucas@email',319876,'Masculino',01/11/2006,'BH','MG', 'Rua Canaã','632652652');
insert into Cliente values(2,'lucas',1234,23456,'lucas@email',319876,'Masculino',01/11/2006,'BH','MG', 'Rua Canaã');
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 2, 12, 13, 0, 'Ponto A', 'Ponto B', 'camionete', null);
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 1, 13, 14, 0, 'Ponto B', 'Ponto C', 'camionete', null);
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 2, 14, 15, 0, 'Ponto C', 'Ponto D', 'camionete', null);
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 1, 15, 16, 0, 'Ponto D', 'Ponto E', 'camionete', null);
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 1, 15, 16, 0, 'Ponto E', 'Ponto F', 'carrocon', null);
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 1, 16, 17, 0, 'Ponto G', 'Ponto H', 'camionete', null);


-- TESTES



SELECT * FROM view_pedido_motorista -- WHERE status_pedido = 1 AND email = 'vitor@email'
;

SELECt id, email from motorista WHERE email = 'vitor@email';

drop table pedido;