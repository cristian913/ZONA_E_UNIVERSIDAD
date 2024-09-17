
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
  <div class="container">
    <img src="./image/imagen.png" alt="Imagen" class="image">
    <nav class="formu">
      <div class="ico">
        <h1 class="titulo">Regístrate</h1>
        <h1 class="titulo1">ZONA E</h1>
        <i class="fa-solid fa-house" style="color: #082D5E;"></i>
      </div>
      <div class="conte">
        <h1 class="titulo2">Regístrate con tus redes sociales</h1>
        <div class="ico1">
          <i class="fa-brands fa-facebook" style="color: #0457e7; font-size: 30px;"></i>
          <i class="fa-brands fa-google" style="color: #ea4335; font-size: 30px;"></i>
        </div>
        <h1 class="titulo2">O ingresa los siguientes datos</h1>
        <div class="buttons">
          <button class="selector">Arrendador</button>
          <button class="selector">Arrendatario</button>
        </div>
      </div>
      <form class="formularios" action="includes/validar.php" method="post">
        <div class="contenedor">
          <div class="input-contenedor">
            <input type="text" class="caja" name="usuario" placeholder="Nombre Completo" >
          </div>
          <div class="input-contenedor">
            <input type="email" class="caja" name="correo" placeholder="Correo Electrónico" >
          </div>
          <div class="input-contenedor">
            <input type="password" class="caja" name="contraseña" placeholder="Contraseña">
          </div>
          <div class="input-contenedor">
            <input type="password" class="caja" name="repcontraseña" placeholder="Confirmar Contraseña">
          </div>
          <p class="terminos-text">Al continuar estás aceptando los términos y condiciones y la política de privacidad</p>
          <input type="submit" name="registrar" value="Registrarse" class="botton">
        </div>
      </form>
      <p class="already-have-account">¿Ya tienes cuenta? <a class="link" href="iniciosession.php">Inicia sesión</a></p>
    </nav>
  </div>
</body>
 
</html>