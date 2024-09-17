<?php
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if ($validar == null || $validar == '') {
    header("Location: iniciosession.php");
    die();
}

$id = $_GET['id'];
$para = $_GET['para'];
$de = $_GET['de'];

$conexion = mysqli_connect("localhost", "root", "", "zonae");

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

$consulta = "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="./css/Usuario.css">
    <link rel="stylesheet" href="./css/barra.css">
</head>
<body>
    <?php include("barrausuario.php"); ?>
    <div class="container">
        <div class="sidebar">
            <div class="profile">
                

                <img src="./includes/publicaciones/perfil_usuarios/<?php echo $usuario['id']; ?>/<?php echo $usuario['perfil']; ?>"onerror="this.src='./includes/publicaciones/perfil_usuarios/usuario.png'" width="60%" height="60%" style="border-radius: 50%;">
               

                <h2><?php echo $usuario['nombre']; ?> <?php echo $usuario['apellido']; ?></h2>
                <h3>Arrendador</h3>

                
            </div>
            <nav>
                <ul>

                    <li><a href="#" onclick="cargarContenido('vistadatos.php?id=<?php echo $id; ?>'); return false;">Datos del usuario</a></li>
                    <li><a href="#" onclick="cargarContenido('propiedadespublicadas.php?id=<?php echo $id; ?>'); return false;">Propiedades publicadas</a></li>
                    <li>
                    <a href="#" onclick="cargarContenido('chat.php?id=<?php echo urlencode($id); ?>&para=<?php echo urlencode($para); ?>&de=<?php echo urlencode($de); ?>'); return false;">
    Chat
</a>
                </li>
                </ul>
            </nav>
        </div>
        <div class="main-content" id="contenido">
            <?php include("vistadatos.php"); ?>
            <!-- El contenido dinámico se cargará aquí -->
        </div>
    </div>

    <?php include("footerpie.html"); ?>

    <script>
    function cargarContenido(pagina) {
        fetch(pagina)
            .then(response => response.ok ? response.text() : Promise.reject('Error en la solicitud'))
            .then(data => document.getElementById('contenido').innerHTML = data)
            .catch(error => console.error(error));
    }
    </script>
</body>
</html>