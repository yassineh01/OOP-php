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

CREATE TABLE log
(
	id int primary key auto_increment,
    user_name varchar(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

INSERT INTO leerlingen (naam, achternaam, email, geboorte_datum)
VALUES
('Jan', 'Janssens', 'jan@janssens', '1990-01-01');
INSERT INTO leerlingen (naam, achternaam, email, geboorte_datum)
VALUES
('Mus', 'Ha', 'Muha@ha.com', '1999-01-01');
