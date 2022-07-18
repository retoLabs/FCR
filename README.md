# FCR
Plataforma para coaching a FormadoresTIC

---------------------------------------------------------------------
## MySQL:
Verificar estado de mysql:  
$ service mysql status

Arrancar:  
$sudo systemctl start mysql

Conectarse:  
$ mysql -u root -p  
Enter password: Pauet:21

Ver bases de datos:  
mysql> show databases;

Usar una BD:  
mysql> use pauet

Ver tablas de la BD en uso:  
mysql> show tables;

Ver estructura de una tabla:  
mysql> describe *tabla*;

Salir de mysql:  
mysql> quit

---------------------------------------------------------------------
## Crear database en MySQL
$ mysql -u root -p  
Enter password: Pauet:21

mysql> create database Futbol;

Crear tabla jugadores:
DROP TABLE jugadores;
CREATE TABLE jugadores
(
id INT UNSIGNED primary key auto_increment,
nombre VARCHAR(20),	
fnacim VARCHAR(20),	
origen VARCHAR(20),  
nifnie VARCHAR(20) unique
);


