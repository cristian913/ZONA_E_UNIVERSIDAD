<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "registrosss");

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para copiar los datos de 'user' a 'datosusuario'
$consulta = "
    INSERT INTO datosusuario (id, nombre, apellido) 
    SELECT id, nombre, apellido FROM user
    ON DUPLICATE KEY UPDATE 
        nombre = VALUES(nombre),
        apellido = VALUES(apellido);
";

// Ejecutar la consulta
if (mysqli_query($conexion, $consulta)) {
    echo "Datos copiados con éxito.";
} else {
    echo "Error: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>