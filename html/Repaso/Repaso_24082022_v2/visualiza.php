
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Visualiza</title>
</head>
<body>
<h1>Visualiza</h1>

<?php
$url = $_SERVER['REQUEST_URI'];
$components = parse_url($url);
parse_str($components['query'], $results);
$id = ($results['id']);
echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$id.'"></iframe>'
?>

<br>

<a href="premium.php">Volver </a>


</body>
</html>