<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "zonae");

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

if (isset($_POST['publicar'])) {
    // Escapar las entradas del usuario
    $id = mysqli_real_escape_string($conexion, $_POST['id']);
    $barrio = mysqli_real_escape_string($conexion, $_POST['barrio']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $titulopublicacion = mysqli_real_escape_string($conexion, $_POST['titulopublicacion']);
    $departamento = mysqli_real_escape_string($conexion, $_POST['departamento']);
    $municipio = mysqli_real_escape_string($conexion, $_POST['municipio']);
    $tipo_inmueble = mysqli_real_escape_string($conexion, $_POST['tipo_inmueble']);
    $descripcionpublicacion = mysqli_real_escape_string($conexion, $_POST['descripciónpublicacion']);
    $preciopublicacion = mysqli_real_escape_string($conexion, $_POST['preciopublicacion']);
    $gastospublicacion = mysqli_real_escape_string($conexion, $_POST['gastospublicacion']);
    $nombreapellido = mysqli_real_escape_string($conexion, $_POST['nombre_apellido']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);

    // Obtener el valor de Auto_increment
    $result = mysqli_query($conexion, "SHOW TABLE STATUS WHERE `Name` = 'publicaciones'");
    $data = mysqli_fetch_assoc($result);
    $next_increment = $data['Auto_increment'];

    $alea = substr(strtoupper(md5(microtime(true))), 0, 12);
    $code = $next_increment . $alea;

    $type = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION); // Obtener la extensión del archivo
    $rfoto = $_FILES['foto']['tmp_name'];
    $name = $code . "." . $type;

    if (is_uploaded_file($rfoto)) {
        $destino = "includes/publicaciones/perfil_usuarios/" . $name;
        if (move_uploaded_file($rfoto, $destino)) {
            $nombre = $name;
        } else {
            echo "Error al mover el archivo subido.";
            exit;
        }
    } else {
        $nombre = '';
    }

    // Insertar en la base de datos
    $subir = mysqli_query($conexion, "INSERT INTO publicaciones (usuario, fecha, barrio, direccion, titulopublicacion, departamento, municipio, tipo_inmueble, imagen, descripcion_publicacion, precio_publicacion, gastos_publicacion, nombre_apellido, correo, telefono, comentarios) VALUES ('$id', now(), '$barrio', '$direccion', '$titulopublicacion', '$departamento', '$municipio', '$tipo_inmueble', '$nombre', '$descripcionpublicacion', '$preciopublicacion', '$gastospublicacion', '$nombreapellido', '$correo', '$telefono', '1')");

    // Cerrar la conexión
    mysqli_close($conexion);

    // Redirigir si la inserción fue exitosa
    if ($subir) {
        header("Location: ../index_session.php?id=" . $id);
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>