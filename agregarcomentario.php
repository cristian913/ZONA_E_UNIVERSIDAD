<?php
require('includes/_db.php');

// Escapar las entradas del usuario
$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
$comentario = mysqli_real_escape_string($conexion, $_POST['comentario']);
$publicacion = mysqli_real_escape_string($conexion, $_POST['publicacion']);

// Insertar el comentario en la base de datos
$insert = mysqli_query($conexion, "INSERT INTO comentarios (usuario, comentario, fecha, publicacion) VALUES ('$usuario', '$comentario', NOW(), '$publicacion')");

if (!$insert) {
    die("Error al insertar el comentario: " . mysqli_error($conexion));
}

// Obtener información de la publicación
$llamado = mysqli_query($conexion, "SELECT * FROM publicaciones WHERE id_pub = '$publicacion'");
if ($llamado && mysqli_num_rows($llamado) > 0) {
    $ll = mysqli_fetch_array($llamado);
    $usuario2 = mysqli_real_escape_string($conexion, $ll['usuario']);

    // Insertar la notificación en la base de datos
    $insert2 = mysqli_query($conexion, "INSERT INTO notificaciones (user1, user2, tipo, leido, fecha, id_pub) VALUES ('$usuario', '$usuario2', 'ha comentado', '0', NOW(), '$publicacion')");

    if (!$insert2) {
        die("Error al insertar la notificación: " . mysqli_error($conexion));
    }
} else {
    die("Error al obtener la publicación: " . mysqli_error($conexion));
}

// Cerrar la conexión
mysqli_close($conexion);
?>