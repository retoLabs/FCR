<?php

session_start();

require 'vc_conexion.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, usr FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC); //Obtiene la siguiente fila y la devuelve como un array asociativo

    // $results = $records->fetchObject(); Obtiene la siguiente fila y la devuelve como un objeto

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
}

$id = $_SESSION['user_id'];

$records = $conn->prepare("DELETE FROM usuarios WHERE id = $id");
$records->execute();

$conn = null;

session_unset();

session_destroy();

header('location:index.html');

?>