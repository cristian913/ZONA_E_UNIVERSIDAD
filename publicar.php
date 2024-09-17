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
 
<html>
<head>
   <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>INICIO WEB</title>

    <link rel="stylesheet" href="css/infopublicar.css" />
    <link rel="stylesheet" href="css/barra.css" />
    <script src="https://kit.fontawesome.com/87dae9917c.js" crossorigin="anonymous"></script>
    <script defer src="codigo/codigo.js"></script>
</head>
<body>
   
  <?php
      include("barrausuario.php");
  ?>
  <!--********************cuerpo*****************************************-->
  <form action="datosinmueble.php" method="get" enctype="multipart/from-data">
     <input type="hidden" name="id" value="<?php echo $id; ?>">
      

    <div class="container">
        <div class="header">
            <h1>Publica de manera facil y rapida</h1>
        </div>
        <img class="image" src="./image/image1.png" alt="Inmueble">
        <div class="section-title">Tipo de propiedad</div>
        <div class="property-type">
        
        <div type="submit" name="tipo_inmueble" value="casa">
            <img src="https://via.placeholder.com/50" alt="Casa">
            <div>Casa</div>
        </div>
   
    
        <div type="submit" name="tipo_inmueble" value="apartamento">
            <img src="https://via.placeholder.com/50" alt="Apartamento/Estudio">
            <div>Apartamento/Estudio</div>
        </div>
 
    
        <div type="submit" name="tipo_inmueble" value="habitacion">
            <img src="https://via.placeholder.com/50" alt="Habitación Independiente">
            <div>Habitación Independiente</div>
        </div>
    
        </div>
        <div class="section-title">Dirección del inmueble</div>
        <div class="address">
            <select name="departamento">
                <option value="">Selecciona un departamento</option>
                <option value="casanare">casanare</option>
                <option value="boyaca">boyaca</option>
                <option value="bogota">bogota</option>
            </select>
            <select name="municipio">
                <option value="">Selecciona un municipio</option>
                <option value="mani">mani</option>
                <option value="monterey">monterey</option>
                <option value="villanueva">villanueva</option>
                <option value="paz de ariporo">paz de ariporo</option>
            </select>
            <input type="text" name="barrio" id="barrio" placeholder="Barrio">
            <input type="text" name="direccion" id="direccion" placeholder="Dirección">
        </div>
    </div>


     <div class="container">
        <div class="header">
            <h1>Información básica</h1>
            <p>Indique las cantidades, y si no tiene o no incluye, déjalos en 0 (cero)</p>
        </div>
        <div class="form-section">
            <div class="form-group">
                <label>N° de habitaciones</label>
                <div class="counter">
                    <button class="counter-btn">-</button>
                    <input type="text" value="0" readonly>
                    <button class="counter-btn">+</button>
                </div>
            </div>
            <div class="form-group">
                <label>N° de baños</label>
                <div class="counter">
                    <button class="counter-btn">-</button>
                    <input type="text" value="0" readonly>
                    <button class="counter-btn">+</button>
                </div>
            </div>
            <div class="form-group">
                <label>Condominio</label>
                <div class="toggle">
                    <button class="toggle-btn">Sí</button>
                    <button class="toggle-btn">No</button>
                </div>
            </div>
            <div class="form-group">
                <label>Servicios incluidos</label>
                <div class="toggle">
                    <button class="toggle-btn">Sí</button>
                    <button class="toggle-btn">No</button>
                </div>
            </div>
            <div class="form-group">
                <label>¿Puedo compartir el inmueble?</label>
                <div class="toggle">
                    <button class="toggle-btn">Sí</button>
                    <button class="toggle-btn">No</button>
                </div>
            </div>
        </div>
    </div>


     <div class="container">
        <h2>Fotografías</h2>
        <p>Selecciona las fotografías de tu propiedad que quieres que se vean en tu publicación<br>Te recomendamos como mínimo subir 3 imágenes*</p>
        
        <!-- START Input file nuevo diseño .-->
                      <input type="file" name="foto" id="file-1" class="upload-btn" data-multiple-caption="{count} files selected"/>
                      <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Sube una foto</span></label>
                    <!-- END Input file nuevo diseño .-->

        <h2>Características del inmueble</h2>
        <div class="property-features">
            <div class="feature">
                <img src="https://img.icons8.com/ios-filled/50/000000/living-room.png" alt="Sala">
                <p>Sala</p>
            </div>
            <div class="feature">
                <img src="https://img.icons8.com/ios-filled/50/000000/kitchen.png" alt="Cocina">
                <p>Cocina</p>
            </div>
            <div class="feature">
                <img src="https://img.icons8.com/ios-filled/50/000000/bedroom.png" alt="Habitación Principal">
                <p>Habitación Principal</p>
            </div>
            <div class="feature">
                <img src="https://img.icons8.com/ios-filled/50/000000/laundry.png" alt="Lavandería">
                <p>Lavandería</p>
            </div>
            <div class="feature">
                <img src="https://img.icons8.com/ios-filled/50/000000/dining-room.png" alt="Comedor">
                <p>Comedor</p>
            </div>
            <div class="feature">
                <img src="https://img.icons8.com/ios-filled/50/000000/garage.png" alt="Garaje">
                <p>Garaje</p>
            </div>
            <div class="feature">
                <img src="https://img.icons8.com/ios-filled/50/000000/garden.png" alt="Patio">
                <p>Patio</p>
            </div>
            <div class="feature">
                <img src="https://img.icons8.com/ios-filled/50/000000/garden.png" alt="Patio">
                <p>Patio</p>
            </div>
            <div class="feature">
                <img src="https://img.icons8.com/ios-filled/50/000000/air-conditioner.png" alt="Aire Acondicionado">
                <p>Aire Acondicionado</p>
            </div>
        </div>

            <button type="submit"  class="next-btn"  >siguiente</button>

        
        
    </div>

  </form>
                    <!--
                   
                        -->
              <?php

               // Leer el contenido del archivo
                $foto = $_FILES['foto'];
                $contenidofoto = file_get_contents($foto['tmp_name']);
                $contenidofotoBase64 = base64_encode($contenidofoto);

            // envio de datos al otro formulario
                if (isset($_POST['tipo_inmueble'])) {
                      $tipo_inmueble = $_POST['tipo_inmueble'];
                       echo "Has seleccionado: " . htmlspecialchars($tipo_inmueble);
                }
                
                $id = $_POST['id'];
                $barrio = $_POST['barrio'];
                $direccion = $_POST['direccion'];
                $departamento = $_POST['departamento'];
                $municipio = $_POST['municipio'];
                $tipo_inmueble = $_POST['tipo_inmueble'];
                // Puedes hacer otras operaciones con los datos aquí si es necesario

                // Redirigir a la siguiente página con parámetros en la URL
                header("Location: datosinmueble.php?id=" . urlencode($id). "&barrio=" . urlencode($barrio). "&direccion=" . urlencode($direccion). "&departamento=" . urlencode($departamento). "&municipio=" . urlencode($municipio). "&tipo_inmueble=" . urlencode($tipo_inmueble."&foto=" . urlencode($contenidofotoBase64)) );
               
            ?>

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