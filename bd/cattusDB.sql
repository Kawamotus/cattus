CREATE DATABASE IF NOT EXISTS Cattus;
USE Cattus;

CREATE TABLE IF NOT EXISTS Animal (
    ID_Animal INTEGER(8) PRIMARY KEY auto_increment,
    Nome_Animal VARCHAR(255) NOT NULL,
    Especie_Animal INT(1) NOT NULL, # 1: cão, 2: gato
    Sexo_Animal VARCHAR(1) ,
    Idade_Animal INT(2), 
    Porte_Animal VARCHAR(255),
    DtAdmissao_Animal DATE NOT NULL,
    Img_Animal VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Usuario (
    Cod_Funcionario INTEGER(8) PRIMARY KEY auto_increment,
    CPF_Funcionario VARCHAR(14) NOT NULL,
    Nome_Funcionario VARCHAR(255) NOT NULL,
    Atribuicao_Funcionario VARCHAR(255),
    Nivel_Funcionario INT(1) NOT NULL, # 1: Padrão, 2: Adm (gerente)
    Login_Funcionario VARCHAR(255) NOT NULL,
    Senha_Funcionario VARCHAR(255) NOT NULL,
    Telefone_Funcionario VARCHAR(14),
    Img_Funcionario VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Camera (
    ID_Camera INTEGER(8) PRIMARY KEY auto_increment,
    Localizacao_Camera VARCHAR(30) NOT NULL,
    Img_Camera VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Atividade (
	ID_Atividade INTEGER(8) PRIMARY KEY auto_increment,
    Tipo_Atividade INT(1), # 1: Comer; 2: Água; 3: Dormir; 4: mijar/defecar
    Inicio_Atividade DATETIME NOT NULL,
    Termino_Atividade DATETIME NOT NULL,
    ID_Animal INTEGER(8) NOT NULL,
    ID_Camera INTEGER(8) NOT NULL,
	FOREIGN KEY (ID_Camera) REFERENCES Camera(ID_Camera) ON DELETE CASCADE,
    FOREIGN KEY (ID_Animal) REFERENCES Animal(ID_Animal) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Alerta (
    ID_Alerta INT(8) PRIMARY KEY auto_increment,
    DataHora_Alerta DATETIME NOT NULL,
    ID_Atividade INTEGER(8) NOT NULL,
	FOREIGN KEY (ID_Atividade) REFERENCES Atividade(ID_Atividade) ON DELETE CASCADE
);

INSERT INTO Camera (Localizacao_Camera) VALUES
    ('Quarto 101'), 
    ('Quarto 102'), 
    ('Quarto 203');
    
    insert into animal(Nome_Animal,Especie_Animal,Sexo_Animal,Idade_Animal,Porte_Animal,DtAdmissao_Animal,Img_Animal) values
('gato',1,'1',2,'1','2023-11-13','1699840905-55713-655183890857d.jpg'),
('tibico',2,'2',5,'2','2023-11-13','1699840927-88644-6551839f0f216.jpg'),
('mexirico',1,'2',4,'3','2023-11-13','1699840970-99617-655183cacb490.jpg'),
('larilso',2,'2',3,'1','2023-11-13','1699841103-72682-6551844f0e886.jpg'),
('catarina',1,'1',6,'2','2023-11-13','1699841134-39993-6551846e66eb3.jpg'),
('paçoca',2,'2',1,'1','2023-11-13','1699841169-65546-6551849180fcd.jpg'),
('tilapio',1,'2',5,'2','2023-11-13','1699841210-77784-655184bac2afd.jpg'),
('pimenta',1,'2',4,'1','2023-11-13','1699841254-50189-655184e6d7948.jpg'),
('robinson',2,'2',3,'1','2023-11-13','1699841315-6809-655185236ccca.jpg');

insert into usuario(Nome_Funcionario,CPF_Funcionario,Atribuicao_Funcionario,Nivel_Funcionario,Login_Funcionario,Senha_Funcionario,Telefone_Funcionario,Img_Funcionario) values
('admin','123','admin',2,'admin','$2y$10$4XaOe.KggPzx1ghg5bHdwOJ.8cH32/o8NPhYkGdQ.GOaTLWrUZADe','admin','1699840855-11807-6551835732cf3.jpg');
    
    
INSERT INTO Atividade(Tipo_Atividade, Inicio_Atividade, Termino_Atividade, ID_Animal, ID_Camera) VALUES
	(1, '2023-10-28 22:53:12', '2023-10-28 22:57:58', 3, 3),
	(2, '2023-10-28 22:59:21', '2023-10-28 23:01:58', 3, 1),
	(2, '2023-10-28 09:15:08', '2023-10-28 09:30:12', 3, 2),
	(1, '2023-11-05 12:00:00', '2023-11-05 12:30:00', 7, 3),
	(3, '2023-11-15 22:00:00', '2023-11-16 07:00:00', 6, 1),
	(4, '2023-11-20 17:45:00', '2023-11-20 18:00:00', 9, 1),
	(1, '2023-12-02 08:30:00', '2023-12-02 09:00:00', 4, 2),
	(2, '2023-12-07 14:00:00', '2023-12-07 14:15:00', 2, 3),
	(3, '2023-12-12 23:30:00', '2023-12-13 08:15:00', 8, 2),
	(1, '2023-12-17 11:45:00', '2023-12-17 12:15:00', 5, 3),
	(2, '2023-12-20 16:20:00', '2023-12-20 16:35:00', 8, 1),
	(4, '2023-12-28 18:45:00', '2023-12-28 19:00:00', 1, 2),
	(1, '2023-12-29 12:30:00', '2023-12-29 13:00:00', 3, 3),
	(2, '2023-12-30 15:45:00', '2023-12-30 16:00:00', 7, 2),
	(3, '2023-12-30 23:00:00', '2023-12-31 07:30:00', 6, 2),
	(4, '2023-12-31 17:30:00', '2023-12-31 17:45:00', 9, 3),
	(1, '2023-12-31 08:15:00', '2023-12-31 08:45:00', 4, 1),
	(2, '2023-12-30 14:15:00', '2023-12-30 14:30:00', 2, 2),
	(3, '2023-12-29 22:30:00', '2023-12-30 07:45:00', 8, 3),
	(1, '2023-12-29 10:00:00', '2023-12-29 10:30:00', 5, 1),
	(2, '2023-12-29 16:30:00', '2023-12-29 16:45:00', 8, 3),
	(4, '2023-12-29 18:00:00', '2023-12-29 18:15:00', 1, 1);
    
INSERT INTO Alerta(DataHora_Alerta, ID_Atividade) VALUES
	('2023-10-28 09:15:00', 5),
	('2023-11-05 12:00:00', 8),
	('2023-11-15 22:30:00', 11),
	('2023-11-20 17:45:00', 3),
	('2023-11-28 08:30:00', 15),
	('2023-12-02 14:00:00', 9),
	('2023-12-12 23:00:00', 1),
	('2023-12-17 10:15:00', 4),
	('2023-12-20 16:30:00', 6),
	('2023-12-28 18:45:00', 2);
