<?php 

    session_start();

    require 'vc_conexion.php';

    if (isset($_SESSION['user_id'])) {
        $records = $conn->prepare('SELECT id, usr, pwd, rol FROM usuarios WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC); //Obtiene la siguiente fila y la devuelve como un array asociativo

        // $results = $records->fetchObject(); Obtiene la siguiente fila y la devuelve como un objeto
    
        $user = null;
    
        if (count($results) > 0) {
          $user = $results;
        }
    }


    if(isset($_POST['submit'])) {

        $id = $_SESSION['user_id'];

        $records = $conn->prepare("UPDATE usuarios SET usr='" . $_POST['usr'] . "',
                                                       pwd='" . $_POST['pwd'] . "',
                                                       rol='" . $_POST['rol'] . "'
                                                       WHERE id = $id");
        $records->execute();

        $conn = null;

        header('location:premium.php');
    }

    

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

    <label for="usr">Usuario</label>
    <input name="usr" type="text" value="<?= $user['usr'] ?>">

    <br>

    <label for="pwd">Contraseña</label>
      <input name="pwd" type="pwd" value="<?= $user['pwd'] ?>">


      <br>

      <!-- <label for="pwd">Membresía: </label>
      <input name="pwd" type="pwd" value=" -->
      <!-- < ?=// $user['rol'] ?>"> -->


      <input type="submit" name="submit" value="Submit">
      <a href="premium.php">Cancelar</a>
      
    </form>
</body>
</html>

<button><a href="eliminar.php?usr=<? $user['user_id'] ?>">Dar de baja</a></button> 