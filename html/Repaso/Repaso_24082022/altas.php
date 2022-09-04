<?php
include("vc_conexion.php");


if (!empty($_POST['usr']) && !empty($_POST['pwd']) && !empty($_POST['rol'])) {
    $sql = "INSERT INTO usuarios (usr, pwd, rol) VALUES (:usr, :pwd, :rol)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usr', $_POST['usr']);
    $password = password_hash($_POST['pwd'], PASSWORD_BCRYPT); //PASSWORD_BCRYPT encrypta el password, NOTA: En la bbdd, el campo pwd tiene que tener longitud 250 debido a la ecriptación
    $stmt->bindParam(':pwd', $password);
	$stmt->bindParam(':rol', $_POST['rol']);
    // $stmt->bindParam(':password', $_POST['password']);

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Altas</title>

	<!-- Bootstrap -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	</nav>
	<div class="container">
		<div class="content">
			<h2>App Videoclub &raquo; Alta Usuarios</h2>
			<hr />

		<?php if(!empty($message)): ?>
			<p> <?= $message ?></p>
		<?php endif; ?>

			<form class="form-horizontal" action="" method="post">
				<!-- <div class="form-group">
					<label class="col-sm-3 control-label">ID</label>
					<div class="col-sm-2">
						<input type="text" name="id" class="form-control" placeholder="ID">
					</div>
				</div> -->

				<div class="form-group">
					<label class="col-sm-3 control-label">Usuario</label>
					<div class="col-sm-4">
						<input type="text" name="usr" class="form-control" placeholder="Usuario" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-4">
						<input type="text" name="pwd" class="form-control" placeholder="Password" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Rol</label>
					<div class="col-sm-4">
						<input type="text" name="rol" class="form-control" placeholder="Basico/Premium" required>
					</div>
				</div>

			
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.html" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!--script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script -->
</body>
</html>