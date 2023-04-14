-- Active: 1678437261958@@127.0.0.1@3306@form_in_php
Insert into regioni (nome)
VALUES ('Abruzzo');


CREATE TABLE province (  
    id_provincia int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_provincia VARCHAR(255),
    sigla VARCHAR(5),
    regione_id int,
    Foreign Key (regione_id) REFERENCES regioni(regione_id)
) ;

CREATE TABLE regioni (  
    regione_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255));

select * from regioni;

select * from province;

Truncate TABLE regioni;