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
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries["id"];
echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$id.'"></iframe>'
?>


</body>
</html>