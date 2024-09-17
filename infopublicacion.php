 <?php
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if ($validar == null || $validar == '') {
    header("Location: iniciosession.php");
    die();
}

$id = $_GET['id'];
/*traer el nombre y apellido de la tabla user barrausuario*/
$conexion= mysqli_connect("localhost", "root", "", "zonae");
$consulta= "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

/*traer los datos de la base de tabla publicaciones*/
$conexion = mysqli_connect("localhost", "root", "", "zonae");
$consulta = "SELECT * FROM publicaciones WHERE usuario = $id";
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_assoc($resultado);




?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Apartamento</title>
    <link rel="stylesheet" href="css/infopublicar.css">
    <link rel="stylesheet" href="css/barra.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php
    include("barrausuario.php");


    ?>
    <div class="apartamento-container">
        <div class="apartamento-header">
            <h1>Apartamento en el centro</h1>
            <p>$1.200.000 Cop</p>
        </div>
        <div class="apartamento-details">
            <div class="apartamento-info">
                <p><i class="fas fa-bed"></i> 3 habitaciones</p>
                <p><i class="fas fa-bath"></i> 2 baños</p>
                <p><i class="fas fa-paw"></i> No permitido mascotas</p>
                <p><i class="fas fa-utensils"></i> Cocina integral</p>
                <p><i class="fas fa-couch"></i> Sala y comedor</p>
                <p><i class="fas fa-tree"></i> Balcón</p>
                <p class="apartamento-date">Publicado el 11-05-2023</p>
            </div>
            <div class="apartamento-contact">
                <h3><?php echo $usuario['nombre_apellido']; ?></h3>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo $datos['direccion']; ?> Barrio: <?php echo $datos['barrio']; ?></p>
                <p><i class="fas fa-phone"></i> Tel: <?php echo $datos['telefono']; ?></p>
                <p><i class="fas fa-envelope"></i><?php echo $datos['correo']; ?> </p>
                <a href="mailto:neider2c@gmail.com" class="apartamento-contact-btn">¡Si te gustó este inmueble, contáctame!</a>
            </div>
        </div>
        <div class="apartamento-gallery">
            <div class="apartamento-main-image">
                <img src="main-image.jpg" alt="Imagen del apartamento">
            </div>
            <div class="apartamento-thumbnails">
                <img src="thumb1.jpg" alt="Thumbnail 1">
                <img src="thumb2.jpg" alt="Thumbnail 2">
                <img src="thumb3.jpg" alt="Thumbnail 3">
                <img src="thumb4.jpg" alt="Thumbnail 4">
                <img src="thumb5.jpg" alt="Thumbnail 5">
            </div>
        </div>
        <div class="apartamento-services">
            <h3>Servicios que cuenta el apartamento (No incluidos en el arriendo)</h3>
            <p><i class="fas fa-lightbulb"></i> Luz</p>
            <p><i class="fas fa-tint"></i> Agua</p>
            <p><i class="fas fa-fire"></i> Gas</p>
        </div>
    </div>



     <div class="descripcion-container">
        <div class="descripcion-header">
            <h3>Descripción</h3>
            <div class="descripcion-toggle">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
        <p class="descripcion-text">
            Se arrienda apartamento ubicado en el barrio villa lucia en pleno centro de la ciudad de Yopal, consta de 3 habitaciones, una con baño privado y otro baño general, cocina integral, sala y comedor, balcón con vista a la calle principal, servicios de luz, agua y gas no incluidos en el valor del arriendo. Se encuentra cerca de restaurantes, tiendas de ropa, supermercados, entidades públicas e institutos de educación superior.
        </p>
    </div>

    <div class="interes-container">
        <h3>Lugares de interés</h3>
        <div class="interes-items">
            <div class="interes-item">
                <i class="fas fa-shopping-cart"></i>
                <p>Supermercado la quinta</p>
            </div>
            <div class="interes-item">
                <i class="fas fa-university"></i>
                <p>Bancolombia</p>
            </div>
            <div class="interes-item">
                <i class="fas fa-store"></i>
                <p>Tienda Koaj</p>
            </div>
            <div class="interes-item">
                <i class="fas fa-utensils"></i>
                <p>Restaurante La Res</p>
            </div>
            <div class="interes-item">
                <i class="fas fa-school"></i>
                <p>Instituto Intec</p>
            </div>
            <div class="interes-item">
                <i class="fas fa-clinic-medical"></i>
                <p>Droguería la septima</p>
            </div>
        </div>
    </div>
    <?php 
    include("footerpie.html");
     ?>
</body>
</html>