<?php
  session_start();

  require 'vc_conexion.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, usr FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC); //Obtiene la siguiente fila y la devuelve como un array asociativo

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>

  <style>
      span {
        font-weight: bold;
        font-size: 24px;
      }
  </style>

</head>
<body>
<h1>Premium</h1>

<?php if(!empty($user)): ?>
      <p>Welcome. <span><?= $user['usr']; ?></span></p>
      <p>You are Successfully Logged In</p>
	  <a href="perfil.php">
        perfil
      </a>
      <a href="logout.php">
        Logout
      </a>
    <?php endif; ?>

<table>
	<tr>
		<td><a href="visualiza.php"><img src="yours.jpeg"></a></td>
		<td><a href="visualiza.php?id=CYdV5sgBBBk"><img src="iceage.jpeg"></a></td>
		<td><a href="visualiza.php"><img src="malefica.jpeg"></a></td>
	</tr>
	<tr>
		<td><a href="visualiza.php"><img src="reyleon.jpeg"></a></td>
		<td><a href="visualiza.php?id=d-4fPBFTGVQ"><img src="titanic.jpg"></a></td>
		<td><a href="visualiza.php"><img src="angelesodemonios.jpeg"></a></td>
	</tr>
</table>

</body>
</html>