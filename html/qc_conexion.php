<?php
  $host_name = 'db5002756143.hosting-data.io';
  $database = 'dbs2198481';
  $user_name = 'dbu133277';
  $password = 'retoAgro20';

  $con = new mysqli($host_name, $user_name, $password, $database);

  if ($con->connect_error) {
    die('<p>Error al conectar con servidor MySQL: '. $con->connect_error .'</p>');
  } else {
    echo '<p>Se ha establecido la conexión al servidor MySQL con éxito.</p>';
  }
?>
