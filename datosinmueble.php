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
$conexion= mysqli_connect("localhost", "root", "", "zonae");
$consulta= "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Inmueble</title>
    <link rel="stylesheet" href="estilos.css">
      <link rel="stylesheet" href="css/infopublicar.css" />
    <link rel="stylesheet" href="css/barra.css" />
</head>
<body>
     <?php
      include("barrausuario.php");
  ?>
       

    <form action="includes/publicar.php" method="post" enctype="multipart/from-data">
    <!--recuperacion  datos pagina anterior-->
    <input type="text" name="foto" value="<?php echo $_GET['foto']; ?>">
    <input type="hidden" name="barrio" value="<?php echo $_GET['barrio']; ?>">
    <input type="hidden" name="direccion" value="<?php echo $_GET['direccion']; ?>">
    <input type="hidden" name="departamento" value="<?php echo $_GET['departamento']; ?>">
    <input type="hidden" name="municipio" value="<?php echo $_GET['municipio']; ?>">
    <input type="hidden" name="tipo_inmueble" value="<?php echo $_GET['tipo_inmueble']; ?>">
     <input type="hidden" name="id" value="<?php echo $id; ?>">


    <div class="conteinfo_publicacion">
        <h2>Título y descripción</h2>
        <p>Ingresa el título de tu publicación y escribe una descripción del inmueble</p>
        <input type="text" placeholder="Título de la publicación" name="titulopublicacion">
        <input type="text" placeholder="Descripción del inmueble" name="descripciónpublicacion">
    </div>

    <div class="conteinfo_publicacion">
        <h2>Precios y gastos</h2>
        <p>Ingresa el precio de arriendo de tu casa y los gastos de administración</p>
        <div class="price-container">
            <label>Precio del inmueble</label>
            <div class="price-input">
                <span>COP</span>
                <input type="text" name="preciopublicacion">
                <span>cop</span>
            </div>
        </div>
        <div class="price-container">
            <label>Gastos de administración</label>
            <div class="price-input">
                <span>COP</span>
                <input type="text" name="gastospublicacion">
                <span>cop</span>
            </div>
        </div>
    </div>

    <div class="conteinfo_publicacion">
        <h2>Información de contacto</h2>
        <p>Ingresa sus datos de contacto para que otras personas puedan comunicarse con usted</p>
        <input type="text" placeholder="Nombre y apellido" name="nombre_apellido">
        <input type="email" placeholder="E-mail" name="correo">
        <input type="tel" placeholder="Teléfono" name="telefono">
    </div>

    <div class="conteinfo_publicacion">
           <button type="submit" name="publicar" class="next-btn">Publicar</button>
    </div>


    </form>

  <!--*********+fin de cuerpo **************************-->

 
     
        

    <?php
    include("footerpie.html");
    ?>
    <script type="text/javascript">
      n=60
     
      var id =window.setInterval(function(){
        document.onmousemove = function(){
          n=60

        };
         
          n--;
        if (n <= -1) {
         
          location.href="ventanainactividad.php";

        }
      },1200);

    </script>
</body>
</html>