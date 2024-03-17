<?php
include("includes/_db.php");

			if (isset($_POST['casa'])){
				$tipo ="casa";
				echo $tipo;
				}
			if (isset($_POST['apartaestudio'])){
				$tipo ="apartaestudio";
				echo $tipo;
				}
			if (isset($_POST['habitacion'])){
				$tipo ="habitacion";
				echo $tipo;
				}
	if (isset($_POST['guardar'])){

	$tipo = trim($_POST['tipo']);
	$barrio = trim($_POST['barrio']);
	$direccion = trim($_POST['direccion']);
	$consultaa= "INSERT INTO propiedad(tipo, barrio, direccion) VALUES ('$tipo','$barrio','$direccion')";
	    $resultadoo = mysqli_query($conexion, $consultaa);
	    if ($resultadoo) {
	    	?> 
	    	<h3 class="okk">¡datos guardados correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡error al guardar datos!</h3>
           <?php
	    }
}




?>