<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script src="https://kit.fontawesome.com/87dae9917c.js" crossorigin="anonymous"></script>
	<script defer src="codigo/codigo.js"></script>
</head>
<body>
	<img src="./image/imagen.png" alt="" class="image" >
<nav class="formu">
	<nav class="ico">
		<h1 class="titulo" >Iniciar session</h1>
		<h1 class="titulo1">ZONA E</h1>
		<i class="fa-solid fa-house" style="color: #082D5E;"></i>


	</nav>
	<nav class="conte">
		<h1 class="titulo2" >registrate con tus redes sociales</h1>
		<nav class="ico1">
			<i class="fa-brands fa-square-facebook" style="color: #0457e7;"></i>
			<i class="fa-solid fa-square-envelope" style="color: #005af5;"></i>

		</nav>
		<h1 class="titulo2">o ingresa los siguientes datos</h1>
		


	</nav>
	<form class="formularios" action="./includes/_functions.php" method="post">
 
        <div class="contenedor">
            
            <div class="input-contenedor">
            
                       
                <input type="text" class="caja" name="correo" placeholder="correo electronico">

            </div>
            <div class="input-contenedor">
            
              
                <input type="password"  class="caja"name="contraseña"placeholder="contraseña">

            </div>
           
              <input type="hidden" name="accion" value="acceso_user">
               <input type="submit" name ="res" value="iniciar sesion" class="botton">
            
              
                <p>¿no tienes cuenta?<a class="link" href="creausuario.php">registrarse</a></p>
	 <a class="link" href="#">¿olvidaste tu contraseña?</a>
	</form>
</nav>	
 

</body>
</html>