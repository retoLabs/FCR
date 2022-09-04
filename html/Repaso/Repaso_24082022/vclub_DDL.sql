/*
---------------------------------------------------------------------
Base de datos para proyecto Videoclub
---------------------------------------------------------------------

mysql> create user 'vclub'@'localhost' identified by 'VClub:2022';
mysql> grant all privileges on VClub.* to 'VClub'@'localhost';

#------------------------------------------------------------------- Usuarios
# Usuarios
DROP TABLE usuarios;
CREATE TABLE usuarios
(
orden INT UNSIGNED primary key auto_increment,
usr VARCHAR(20),	
pwd VARCHAR(20),	
rol VARCHAR(20)
);

