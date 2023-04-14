-- Active: 1678177957079@@127.0.0.1@3306@form_in_php

CREATE TABLE `user` (
  `user_id` int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `birth_city` varchar(255) NOT NULL,
  `regione_id` int(11) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user ( `first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) 
        VALUES ( 'Mario', 'Rossi', '2023-03-15', 'Torino', '18', '96', 'M', 'mariorossi@email.com', MD5('password'));

TRUNCATE TABLE user;

SELECT * FROM user;

UPDATE `user` SET  first_name= "Pipp" WHERE user_id=1;

INSERT INTO user ( `first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) 
        VALUES ( 'Mario', 'Rossi', '2023-03-15', 'Torino', '18', '96', 'M', 'mariorossi@emai.com', MD5('password'));
        INSERT INTO user ( `first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) 
        VALUES ( 'Mario', 'Rossi', '2023-03-15', 'Torino', '18', '96', 'M', 'mariorossi@ema.com', MD5('password'));
        INSERT INTO user ( `first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) 
        VALUES ( 'Mario', 'Rossi', '2023-03-15', 'Torino', '18', '96', 'M', 'mariorossi@em.com', MD5('password'));
        INSERT INTO user ( `first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) 
        VALUES ( 'Mario', 'Rossi', '2023-03-15', 'Torino', '18', '96', 'M', 'mariorossi@e.com', MD5('password'));