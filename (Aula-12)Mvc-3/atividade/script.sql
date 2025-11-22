/* TABELA mestre */
CREATE TABLE mestre( 
 id INT AUTO_INCREMENT NOT NULL,  
 nome VARCHAR(40) NOT NULL,  
 titulo VARCHAR(1) NOT NULL,  
 CONSTRAINT pk_mestre PRIMARY KEY (id)
); 

/* TABELA planeta */
CREATE TABLE planeta( 
 id INT AUTO_INCREMENT NOT NULL,  
 nome VARCHAR(20) NOT NULL,  
 regiao VARCHAR(2) NOT NULL,  
 quadrante VARCHAR(4) NOT NULL,  
 CONSTRAINT pk_planeta PRIMARY KEY (id)
); 
-- Insert's
INSERT INTO planeta (nome, regiao, quadrante) 
VALUES 
-- Nucleo Profundo
('Vupter', 'NP', 'L-10'),
('Ojom', 'NP', 'M-11'),
('Byss', 'NP', 'K-11'),
('Kalist VI', 'NP', 'K-12'),
('Khomm', 'NP', 'L-12'),
('Tython', 'NP', 'K-10');

-- Nucleo
INSERT INTO planeta (nome, regiao, quadrante) 
VALUES 
('Alderaan', 'N', 'M-10'),
('Corellia', 'N', 'M-11'),
('Chandrilla', 'N', 'L-09'),
('Brentaal VI', 'N', 'L-09'),
('Hosnian Prime', 'N', 'L-09'),
('Kuat', 'N', 'L-09'),
('Plexis', 'N', 'L-13'),
('Abregado-rae', 'N', 'K-13');

-- Colonias
INSERT INTO planeta (nome, regiao, quadrante) 
VALUES 
('Uquine', 'C', 'N-10'),
('Carida', 'C', 'M-09'),
('Abednedo', 'C', 'N-12'),
('Ghorma', 'C', 'L-13'),
('Commenor', 'C', 'N-10'),
('Halcyon', 'C', 'K-13'),
('Neimoidia', 'C', 'M-10'),
('Exodeen', 'C', 'M-12'),
('Borleias', 'C', 'K-09');

-- Orla Interna
INSERT INTO planeta (nome, regiao, quadrante) 
VALUES 
('Bernilla', 'OI', 'L-14'),
('Bogden', 'OI', 'M-08'),
('Champala', 'OI', 'M-08'),
('Dwartii', 'OI', 'N-08'),
('Thyferra', 'OI', 'L-14'),
('Jakku', 'OI', 'L-13'),
('Li-Toran', 'OI', 'M-13'),
('Gilvaanen', 'OI', 'L-08'),
('Mechis III', 'OI', 'L-14'),
('Sergia', 'OI', 'J-15'),
('Throffdon', 'OI', 'J-09'),
('Xibariz', 'OI', 'O-09'),
('Yag Dhul', 'OI', 'L-14');

/* TABELA padawan */
CREATE TABLE padawan ( 
 id INT AUTO_INCREMENT NOT NULL,  
 nome VARCHAR(40) NOT NULL,  
 especie VARCHAR(20) NOT NULL,  
 idade INT NOT NULL,  
 status VARCHAR(1) NOT NULL,   
 id_mestre INT NOT NULL,
 id_planeta INT NOT NULL,
 CONSTRAINT pk_padawan PRIMARY KEY (id)
); 

/* Chaves Estrangeiras */
ALTER TABLE padawan ADD CONSTRAINT fk_mestre FOREIGN KEY (id_mestre) REFERENCES mestre (id);
ALTER TABLE padawan ADD CONSTRAINT fk_planeta FOREIGN KEY (id_planeta) REFERENCES planeta (id);
