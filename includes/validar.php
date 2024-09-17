<?php
$conexion = mysqli_connect("localhost", "root", "", "zonae");

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

if (isset($_POST['registrar'])) {
    $usuario = trim($_POST['usuario']);
    $correo = trim($_POST['correo']);
    $contraseña = trim($_POST['contraseña']);
    $repcontrasena = trim($_POST['repcontraseña']);
    $estado=1;
    $rol =3;
    $perfil ="";


    if (strlen($usuario) >= 1 && strlen($correo) >= 1 && strlen($contraseña) >= 1) {
        // Separar nombre y apellidos usando espacio como delimitador
        $partes = explode(' ', $usuario);

        // Verificar que al menos el nombre y el apellido están presentes
        if (count($partes) >= 2) {
            $nombre = mysqli_real_escape_string($conexion, $partes[0]); // Primer parte como nombre
            $apellido = mysqli_real_escape_string($conexion, implode(' ', array_slice($partes, 1))); // El resto como apellidos
            $correo = mysqli_real_escape_string($conexion, $correo);
            //este es para cifrar la contraseña de la base de dtaos
            /*
            $contraseña = md5(mysqli_real_escape_string($conexion, $contraseña));
            $repcontrasena = md5(mysqli_real_escape_string($conexion, $repcontrasena));
            */

            // Verificar si el correo ya existe
            $query = "SELECT correo FROM user WHERE correo = '$correo'";
            $result = mysqli_query($conexion, $query);

            if (mysqli_num_rows($result) >= 1) {
                ?>
                <hr>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    El email ya está en uso por favor escoja otro o verifique si tiene una cuenta
                </div>
                <?php
            } else {
                if ($contraseña != $repcontrasena) {
                    ?>
                    <hr>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Las contraseñas no coinciden
                    </div>
                    <?php
                } else {
                    // Insertar nuevo usuario
                   $query = "INSERT INTO user (nombre, apellido, correo, fecha_reg, contraseña, estado, rol, perfil) VALUES ('$nombre', '$apellido', '$correo',now(), '$contraseña', '$estado', '$rol', '$perfil')";

                        mysqli_query($conexion, $query);
                        $last_id = mysqli_insert_id($conexion);
                        mysqli_close($conexion);

                        // Redirigir a la página deseada con el ID como parámetro
                        header("Location: ../index_session.php?id=" . $last_id);
                        exit();

                   
                }
            }
        } else {
            echo "<script>alert('Por favor, ingrese al menos un nombre y un apellido.'); window.location.href = 'creausuario.php';</script>";
        }
    } else {
        ?>
                <hr>
                <div class="alerta">
                    <button type="button" >&times;</button>
                    Por favor, complete todos los campos del formulario.
                </div>
                <?php
     
    }
}
?>