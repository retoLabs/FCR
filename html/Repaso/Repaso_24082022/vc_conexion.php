<?php
/*Datos de conexion a la base de datos*/
// $db_host = "localhost";
// $db_user = "vclub";
// $db_pass = "VClub:2022";
// $db_name = "VClub";

// $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// if(mysqli_connect_errno()){
// 	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
// }

$server = 'localhost';
$username = 'vclub';
$password = 'VClub:2022';
$database = 'VClub';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>