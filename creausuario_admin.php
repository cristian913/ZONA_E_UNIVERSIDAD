
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
	<img src=".\image\imagen.png" alt="" class="image" >
<nav class="formu">
	<nav class="ico">
		<h1 class="titulo" >Registrate</h1>
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
    <form class="formularios" action="../views/validar.php" method="post">
 
        <div class="contenedor">
            <div class="input-contenedor">
            
              
                <input type="text" class="caja" name="usuario" placeholder="nombre completo">

            </div>
          
            <div class="input-contenedor">
            
                       
                <input type="text" class="caja" name="correo" placeholder="correo electronico">

            </div>
            <div class="input-contenedor">
            
              
                <input type="password"  class="caja"name="contraseña"placeholder="contraseña">

            </div>
            <div class="input-contenedor">
            
                <input type="password"  class="caja"name="nucontraseña"placeholder="confirmar contraseña">

            </div>

            
            
                <div class="terminos">
                    <p>Al registrarse,acepta nuestras condiciones 
                    de uso y politica de privacidad</p>

                    <input type="checkbox" name="terminos" id="terminos" >
                    <label for="terminos">Acepto Terminos y Condiciones</label>
                </div>
               <input type="submit" name ="registrar" value="registrarse" class="botton">
            
              
                <p>¿ya tienes cuenta?<a class="link" href="iniciosession.php">iniciar sesion</a></p>
    </form>
   
</nav>
 

</body>
</html>