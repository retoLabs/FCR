<?php

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