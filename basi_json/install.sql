-- Active: 1678177957079@@127.0.0.1@3306@form_in_php
Insert into regioni (nome)
VALUES ('Abruzzo');

select * from regioni;
Truncate TABLE regioni;

CREATE TABLE province (  
    id_provincia int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_provincia VARCHAR(255),
    sigla VARCHAR(5),
    regione_id int,
    Foreign Key (regione_id) REFERENCES regioni(regione_id)
) ;