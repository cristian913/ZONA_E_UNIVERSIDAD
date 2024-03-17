<!DOCTYPE html>
<?php

	session_start();
	session_destroy();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	</head>
<body>
	
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Simple Autocierre de Sesión por Inactividad de 1 min</h3>
		<p>el tiempo inactivo fue de :</p><div id="number" class="text-danger"></div>
		<hr style="border-top:1px dotted #ccc;"/>
		<center><h3>Se ha cerrado sesión por Inactividad</h3></center>
		<a href="iniciosession.php">Volver a acceder</a>
	
		
	</div>
</body>
</html>