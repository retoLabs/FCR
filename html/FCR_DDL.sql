/*
---------------------------------------------------------------------
Base de datos para proyecto FCR
---------------------------------------------------------------------

mysql> create user 'fcr'@'localhost' identified by 'Francisco:2022';
mysql> grant all privileges on Futbol.* to 'fcr'@'localhost';

#------------------------------------------------------------------- Jugadores
# Jugadores
DROP TABLE jugadores;
CREATE TABLE jugadores
(
orden INT UNSIGNED primary key auto_increment,
nombre VARCHAR(20),	
fnacim VARCHAR(20),	
origen VARCHAR(20),  
nifnie VARCHAR(20) unique
);

