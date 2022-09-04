<?php

try {

    $archivo = 'db.php';

    if(!file_exists($archivo)) {
         throw new Exception("<p>No se ha podido realizar la conexión con la base de datos</p>");
    }

    require_once $archivo;

 } catch (Exception $e) {
     echo $e->getMessage();
 }

    $consulta = $conexion->prepare("DELETE FROM estrenos WHERE id=" . $_GET['id']);

    $consulta->execute();

    $conexion = null;

    header('location:listaEstrenos.php');
?>