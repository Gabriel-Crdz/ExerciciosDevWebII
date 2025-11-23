/* TABELA mestre */
CREATE TABLE mestre( 
 id INT AUTO_INCREMENT NOT NULL,  
 nome VARCHAR(40) NOT NULL,  
 titulo VARCHAR(1) NOT NULL,  
 CONSTRAINT pk_mestre PRIMARY KEY (id)
); 

-- Insert's
INSERT INTO mestre (nome, titulo) 
VALUES
('Luke Skywalker', 'C'),
('Ahsoka Tano', 'C'),
('Cal Kestis', 'C'),
('Depa Billaba', 'C'),
('Kanan Jarrus', 'M'),
('Qui-Gon Jinn', 'M'),
('Obi-Wan Kenobi', 'M'),
('Anakin Skywalker', 'M'),
('Plo Koon', 'M'),
('Kit Fisto', 'M'),
('Shaak Ti', 'M'),
('Aayla Secura', 'M'),
('Luminara Unduli', 'M'),
('Barriss Offee', 'M'),
('Jocasta Nu', 'M'),
('Shaifo-Dias', 'M'),
('Mace Windu', 'G'),
('Yoda', 'G'),
('Satele Shan', 'G'),
('Nomi Sunrider', 'G'),
('Odan-Urr', 'G');


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
-- Nucleo Profundo(NP)
('Vupter', 'NP', 'L-10'),
('Ojom', 'NP', 'M-11'),
('Byss', 'NP', 'K-11'),
('Kalist VI', 'NP', 'K-12'),
('Khomm', 'NP', 'L-12'),
('Tython', 'NP', 'K-10');

-- Nucleo(N)
INSERT INTO planeta (nome, regiao, quadrante) 
VALUES 
('Alderaan', 'N', 'M-10'),
('Corellia', 'N', 'M-11'),
('Chandrilla', 'N', 'L-09'),
('Brentaal VI', 'N', 'L-09'),
('Coruscant', 'N', 'L-09'),
('Hosnian Prime', 'N', 'L-09'),
('Kuat', 'N', 'L-09'),
('Plexis', 'N', 'L-13'),
('Abregado-rae', 'N', 'K-13');

-- Colonias(C)
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

-- Orla Interna(OI)
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

-- Regiao de Expansão(RE)
INSERT INTO planeta(nome, regiao, quadrante)
VALUES
('Shili', 'RE', 'M-15'),
('Umbara', 'RE', 'M-13'),
('Aquaris', 'RE', 'N-07'),
('Dorin', 'RE', 'J-08'),
('Kerkoidia', 'RE', 'N-15'),
('Persis IX', 'RE', 'L-15'),
('Sibensko', 'RE', 'L-15'),
('Urajab', 'RE', 'L-16'),
('Cymoon', 'RE', 'L-15'),
('Kyros', 'RE', 'L-08'),
('Thustra', 'RE', 'O-07'),

--Orla Media(OM)
INSERT INTO planeta(nome, regiao, quadrante)
VALUES
('Naboo', 'OM', 'M-13'),
('Kashyyyk', 'OM', 'L-20'),
('Jedha', 'OM', 'E-10'),
('Takodana', 'OM', 'L-09'),
('Ord Mantell', 'OM', 'M-11'),
('Gan Moradir', 'OM', 'Q-15'),
('Haidoral Prime', 'OM', 'R-10'),
('Ithor', 'OM', 'M-06'),
('Bothawui', 'OM', 'R-14'),
('Aleen', 'OM', 'L-07'),
('Trandosha', 'OM', 'P-09'),
('Shu-Torun', 'OM', 'J-07');

--Orla Exterior(OE)
INSERT INTO planeta(nome, regiao, quadrante)
VALUES
('Endor', 'OE', 'S-06'),
('Bespin', 'OE', 'L-08'),
('Mandalore', 'OE', 'M-13'),
('Geonosis', 'OE', 'P-13'),
('Mon Cala', 'OE', 'R-16'),
('Lothal', 'OE', 'L-19'),
('Ryloth', 'OE', 'T-14'),
('Rodia', 'OE', 'S-16'),
('Christophsis', 'OE', 'R-07'),
('Dathomir', 'OE', 'R-05'),
('Sereno', 'OE', 'R-05'),
('Batuu', 'OE', 'G-15'),
('Nevarro', 'OE', 'K-20'),
('Bogano', 'OE', 'N-13'),
('Zeffo', 'OE', 'M-03'),
('Koboh', 'OE', 'H-19'),
('Nal Hutta', 'OE', 'S-13'),
('Ferrix', 'OE', 'Q-03'),
('Tatooine', 'OE', 'L-09'),
('Kef Bir', 'OE', 'L-19');

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
