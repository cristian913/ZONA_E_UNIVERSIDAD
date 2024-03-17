<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

      header("Location:iniciosession.php");
    die();
    

}




?>
<?php
$id= $_GET['id'];
$conexion= mysqli_connect("localhost", "root", "", "registrosss");
$consulta= "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>perfil </title>
	<link rel="stylesheet" type="text/css" href="css/usuario.css">
</head>
<body>
	<script src="codigo/botones.js" defer></script>
<form  action="includes/_functions.php" method="post">
	

<nav class="bloque1">
<nav class="bloque_imagenperfil">
	

<form action="../includes/guardar_imagen.php">
<input type="file" name="perfil">
<input type="submit" name="guardar" value="guardar">
<input type="hidden" value="<?php echo $id; ?>">
</form>
  

<h2>
	<?php echo $usuario['nombre'];?>
</h2>
<h4>
	<?php echo $usuario['tipo'];?>
</h4>
</nav>

 <nav class="mis_datos">
 	<ul>
		<li onclick="informacion()"><a>MIS DATOS</a></li>
		<li  ><a>PROPIEDADES PUBLICADAS</a></li>
		<li onclick="propiedadescompartidas()"><a>PROPIEDADES COMPARTIDAS</a></li>
		<li><a>CERRAR SESSION</a></li>
		
					

	</ul>
	
</nav>

</nav>
</form>
<nav id="raiz" class="raiz">
	<nav class="bloquepublicaciones" id="publicaciones">
		<h1>PROPIEDADES PUBLICADAS</h1>

		
	</nav>
	<nav class="tuspublicaciones" id="tuspublicaciones">
		
		<nav class="aa">
		<h1> TUS PROPIEDADES COMPARTIDAS</h1>
		<a onclick="publicar()" >agregar</a>
		</nav>
		<form action="../includes/_functions.php" method="POST "></form>
		<nav id="inf" class="inf" >
			<div class="dis">
			<label class="fo">direccion*</label>
			<input type="text" name="direccion" id="direccion">	
			</div>
			<div class="dis">
			<label class="fo">telefono*</label>
			<input type="text" name="">	
			</div>
			<div class="dis">
			<label class="fo">habitaciones*</label>
			<input type="number" name="">	
			</div>
			<div class="dis">
			<label class="fo">baños*</label>
			<input type="number" name="">	
			</div>

			</div>
			  <input type="hidden" name="accion" value="guardar_publicacion">
     	 <input type="hidden" name="id" value="<?php echo $id;?>">
     	   <button type="submit" class="btn btn-success" >guardar</button>
		
			
			

		</nav>

		
	</nav>
	
	
<nav class="bloque2" id="informacion">
	<form  action="includes/_functions.php" method="post">
	<nav class="bloque_datos">
	
			<h2>DATOS PERSONALES</h2>
		
		<nav class="grup">
			<label class="label">Nombres</label>
			<input class="select" type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre'];?>" required>
			
		</nav>
		<nav class="grup">
			<label class="label">Apellidos</label>
			<input class="select" type="text" name="apellido" id="apellido" value="<?php echo $usuario['apellido'];?>" required>
			
		</nav>
		<nav class="grup">
			<label class="label">Fecha Nacimiento</label>
			<input class="select" type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $usuario['fecha_nacimiento'];?>" required>
			
		</nav>
		<nav class="grup">
			<label class="label" for="lang">Genero</label>
			<form action="#">
			      <select class="select" name="genero"  id="lang">
			      <option class="label_texto " ><?php echo $usuario['genero'];?></option>
			        <option class="label_texto"  value="genero">MASCULINO</option>
			        <option class="label_texto"  value="genero">PFEMENINO</option>
			    
			      </select>
			      
			</form>
			
		</nav>
		<nav class="grup">
			<form action="#">
			      <label class="label" for="lang">Pais</label>
			      <select class="select" name="pais" id="lang">
			      <option class="label_texto "><?php echo $usuario['pais'];?></option>
			        <option class="label_texto"  value="pais">Colombia</option>
			        <option class="label_texto"  value="pais">Argentina</option>
			        <option class="label_texto"  value="pais">Brasil</option>
			        <option class="label_texto"  value="pais">Peru</option>
			          <option class="label_texto"  value="pais">Venezuela</option>
			    
			      </select>
			     
			</form>
			
		</nav>
		<nav class="grup">
			<label class="label">Telefono</label>
			<input class="select" type="text" name="telefono" id="telefono" value="<?php echo $usuario['telefono'];?>"required>
			
		</nav>
		<nav class="grup">
			<label class="label">Correo</label>
			<input class="select" type="text" name="correo" value="<?php echo $usuario['correo'];?>" required>
			
		</nav>
		<nav class="grup">
			<form action="#">
			      <label class="label" for="lang">tipo</label>
			      <select class="select" name="genero" id="lang">
			      <option class="label_texto "><?php echo $usuario['tipo'];?></option>
			        <option class="label_texto"  value="genero">arrendador</option>
			        <option class="label_texto"  value="genero">arrendatario</option>
			        <option class="label_texto"  value="genero">arrendador y arrendatario</option>
			    
			      </select>
			      
			</form>
			
		</nav>
		<nav class="grup">
			<form action="#">
			      <label class="label" for="lang">Centros Educativos</label>
			      <select class="select" name="centro_educativo" id="lang">
			      <option class="label_texto "><?php echo $usuario['centro_educativo'];?></option>
			        <option class="label_texto"  value="centro_educativo">Itell</option>
			        <option class="label_texto"  value="centro_educativo">Itey</option>
			        <option class="label_texto"  value="centro_educativo">Centro Social</option>
			        <option class="label_texto"  value="centro_educativo">Aliazna Pedagogica</option>
			        <option class="label_texto"  value="centro_educativo">Ins Shakespeare y Cervantes</option>
			        <option class="label_texto"  value="centro_educativo">Uniremington</option>
			        <option class="label_texto"  value="centro_educativo">Unitropicio</option>
			        <option class="label_texto"  value="centro_educativo">Universidad de la Salle</option>
			        <option class="label_texto"  value="centro_educativo">Unisangil</option>
			        <option class="label_texto"  value="centro_educativo">Uniminuto</option>
			    
			      </select>
			      
			</form>
			
		</nav>
	</nav>
	<nav class="bloque_notificacion">
	
		<h2>NOTIFICACIONES</h2>
		
		<nav class="grup">
			<form action="#">
			      <label class="label" for="lang">Nuevas Propiedades</label>
			      <select class="select" name="lenguajes" id="lang">
			      <option class="label_texto ">Seleccion</option>
			        <option class="label_texto"  value="masculino">Casa</option>
			        <option class="label_texto"  value="femenino">Apartamento</option>
			        <option class="label_texto"  value="femenino">Apartaestudio</option>
			        <option class="label_texto"  value="femenino">Habitacion de hotel</option>

			    
			      </select>
			      
			</form>
			
		</nav>
		<nav class="grup">
		<form action="#">
			      <label class="label" for="lang">Novedades</label>
			      <select class="select" name="lenguajes" id="lang">
			      <option class="label_texto ">Seleccion</option>
			        <option class="label_texto"  value="masculino">Disponible</option>
			        <option class="label_texto"  value="femenino">Arrendada</option>
			    
			      </select>
			      
			</form>
			
		</nav>
		
	</nav> 
	<nav class="grup1">
	<input type="hidden" name="accion" value="guardar_datos">
      <input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="submit" value="guardar cambios">

	</nav>
  
	
</nav>
</form>
</nav>
<script >
	
	function informacion(){
		var informacion = document.getElementById("informacion");
    	informacion.style.display = "block";
    	var publicaciones = document.getElementById("publicaciones");
    	publicaciones.style.display = "none";

    	
		}
	function propiedadescompartidas(){
    	var publicaciones = document.getElementById("publicaciones");
    	publicaciones.style.display = "none";
    	var tuspublicaciones = document.getElementById("tuspublicaciones");
    	tuspublicaciones.style.display = "block";

    	
		}
		function publicar(){
    	    	var tuspublicaciones = document.getElementById("inf");
    		tuspublicaciones.style.display = "block";

    	
		}
</script>

</body>
</html>