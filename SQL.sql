CREATE DATABASE OOP;
USE OOP;

CREATE TABLE leerlingen
(
	id int primary key auto_increment,
    naam varchar(30) not null,
    achternaam varchar(30) not null,
    email varchar(255) not null,
    geboorte_datum date not null
);

INSERT INTO leerlingen (naam, achternaam, email, geboorte_datum)
VALUES
('Jan', 'Janssens', 'jan@janssens', '1990-01-01');