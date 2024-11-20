create database truckmove;
use truckmove;


CREATE TABLE Motorista(
  id_motorista INT primary key NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  email VARCHAR(110) NOT NULL unique,
  telefone VARCHAR(15) NOT NULL,
  sexo VARCHAR(15) NOT NULL,
  data_nasc DATE NOT NULL,
  cidade VARCHAR(45) NOT NULL,
  estado VARCHAR(45) NOT NULL,
  endereco VARCHAR(120) NOT NULL,
  carteira_motor VARCHAR(60) NOT NULL
);




CREATE TABLE Veiculo(
id_veiculo int primary key not null auto_increment,
veiculo VARCHAR(30) NOT NULL,
placa VARCHAR(7) NOT NULL,
ano varchar(100) not null,
modelo varchar(50) not null,
id_motorista int not null,
foreign key (id_motorista) references Motorista(id_motorista)
);



create table Cliente(
  id_cliente INT primary key NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  email VARCHAR(110) NOT NULL unique,
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
foreign key (id_cliente) references CLiente(id_cliente),
foreign key (id_motorista) references Motorista(id_motorista)
);


CREATE TABLE Ajudante(
  id_ajudante INT primary key NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  email VARCHAR(110) NOT NULL unique,
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




select * from cliente;
select* from pedido;
select * from motorista;
select * from veiculo;
select * from view_veiculo;
select * from view_pedido_motorista;
select * from view_pedido;

-- INSERTS
insert into Cliente values(1,'vitor',1610,23456,'vitor@email',319876,'Masculino',01/11/2006,'BH','MG', 'Rua Canaã');
insert into Cliente values(2,'lucas',1234,23456,'lucas@email',319876,'Masculino',01/11/2006,'BH','MG', 'Rua Canaã');

insert into Motorista values(1,'vitor',1610,23456,'vitor@email',319876,'Masculino',16/10/2006,'BH','MG', 'Rua Canaã', 12323);
insert into Motorista values(2,'lucas',1234,23456,'lucasr@email',319876,'Masculino',01/11/2006,'BH','MG', 'Rua Santa Cruz', 12323);

insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 2, 12, 13, 0, 'Ponto A', 'Ponto B', 'camionete', null);
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 1, 13, 14, 0, 'Ponto B', 'Ponto C', 'camionete', null);
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 2, 14, 15, 0, 'Ponto C', 'Ponto D', 'camionete', null);
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 1, 15, 16, 0, 'Ponto D', 'Ponto E', 'camionete', null);
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 1, 15, 16, 0, 'Ponto E', 'Ponto F', 'carrocon', null);
insert into pedido (id_pedido, id_cliente, volume_carga, distancia, status_pedido, partida, destino, tipo_veiculo, id_motorista) values(default, 1, 16, 17, 0, 'Ponto G', 'Ponto H', 'camionete', null);


insert into veiculo(id_veiculo, veiculo, placa, ano, modelo, id_motorista) values (default, 'camionete', '1J2H3G', 2013, 'Fiat', 1);

-- TESTES



SELECT * FROM view_pedido_motorista -- WHERE status_pedido = 1 AND email = 'vitor@email'
;

SELECt id, email from motorista WHERE email = 'vitor@email';

drop table pedido;