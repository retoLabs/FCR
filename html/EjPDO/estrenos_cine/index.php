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
 
if(isset($_POST['submit'])) {

    $consulta = $conexion->prepare("INSERT INTO estrenos (titulo, duracion, pais, direccion, fecha, genero) VALUES 
                                                        ( :titulo, :duracion, :pais, :direccion, :fecha, :genero )");

    $jugador = $consulta->execute( array( ':titulo'=>$_POST['titulo'], 
                                          ':duracion'=>$_POST['duracion'],
                                          ':pais'=>$_POST['pais'],
                                          ':direccion'=>$_POST['direccion'],
                                          ':fecha'=>$_POST['fecha'],
                                          ':genero'=>$_POST['genero']
                                          ) );
                            
    // Cerramos la conexión
    $conexion = null;

    header('location:listaEstrenos.php');

}
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>CRUD de estrenos de cartelera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>

    <body>

    <div class="container">

    <div class="row align-items-start">

    <div class="col-2"></div>
        
    <div class="col-8">   
    
        <div class="container">

            <h2>Alta de estrenos</h2>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" name="titulo" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración</label>
                    <input type="number" name="duracion" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="pais" class="form-label">País:</label>
                    <input type="text" name="pais" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" name="direccion" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha estreno</label>
                    <input type="date" name="fecha" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <!-- <input type="text" name="genero" class="form-control"> -->

                    <select name="genero">
                        <option value="terror">Terror</option>
                        <option value="romantica">Romántica</option>
                        <option value="drama">Drama</option>
                        <option value="aventura">Aventuras</option>
                        <option value="cienciafi">Ciencia-ficción</option>
                        <option value="drama">Drama</option>
                    </select>

                </div>

                <input class="btn btn-primary" type="submit" name="submit" value="Enviar">
               
                <!-- <button type="submit" name="submit" class="btn btn-primary">Enviar</button> -->
            </form>

        </div>
            <a href="listaEstrenos.php">Consultar lista de estrenos</a>

    </div>

    <div class="col-2"></div>
        
    </div>
    </body>
</html>