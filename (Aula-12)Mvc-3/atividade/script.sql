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
 quadrante VARCHAR(3) NOT NULL,  
 CONSTRAINT pk_planeta PRIMARY KEY (id)
); 

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
