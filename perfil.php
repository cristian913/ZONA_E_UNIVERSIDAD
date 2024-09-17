<?php
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if ($validar == null || $validar == '') {
    header("Location: iniciosession.php");
    die();
}

$id = $_GET['id'];
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
                <form method="post" enctype="multipart/form-data">
                    <input  type="submit" for="selImg" name="bot" class="form-label" value="subir">
                <?php if ($mostrarInput) : ?>
                    <input type="file" id="selImg" name="selImg" class="form-control">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Guardar" name="fotoperfil" id="register" class="btn btn-success">
                </form>
                <?php endif; ?>
                <?php
                    if (isset($_POST['bot'])) {
                     $mostrarInput = true; // Cambia esta variable según tu lógica

                        if ($mostrarInput) {
                            echo '<input type="file" id="selImg" name="selImg" class="form-control">';
                            echo '<input type="submit" value="Guardar" name="fotoperfil" id="register" class="btn btn-success">';
                            header("Refresh:10; url = perfil.php?id=" . urlencode($id));
                        }
                        
                    }
                

                ?>
                <?php
                

                if (isset($_POST['fotoperfil'])) {
                    if ($_FILES["selImg"]["error"] > 0) {
                        echo "Error al cargar el archivo";
                    } else {
                        $permitidos = array("image/png", "image/jpeg", "image/jpg");
                        $limite = 800 * 2024; // 400 KB

                        if (in_array($_FILES["selImg"]["type"], $permitidos) && $_FILES["selImg"]["size"] <= $limite) {
                            $ruta = 'includes/publicaciones/perfil_usuarios/' . $id . '/';

                            if (!file_exists($ruta)) {
                                mkdir($ruta, 0777, true);
                            }

                            $contador = 1;
                            $extension = pathinfo($_FILES["selImg"]["name"], PATHINFO_EXTENSION);

                            do {
                                $nombreImagen = $ruta . $contador . '.' . $extension;
                                $perfil = $contador . '.' . $extension;
                                $contador++;
                            } while (file_exists($nombreImagen));

                            $resultado = move_uploaded_file($_FILES["selImg"]["tmp_name"], $nombreImagen);

                            if ($resultado) {
                                $consulta = "UPDATE user SET perfil = '$perfil' WHERE id = '$id'";
                                if (mysqli_query($conexion, $consulta)) {
                                    echo "Perfil actualizado correctamente";
                                   header("Refresh:2; url = perfil.php?id=" . urlencode($id));
                                } else {
                                    echo "Error al actualizar el perfil: " . mysqli_error($conexion);
                                }
                            } else {
                                echo "Error: Archivo no guardado";
                            }
                        } else {
                            echo "Archivo no permitido o excede el tamaño";
                        }
                    }
                }
                ?>

                <h2><?php echo $usuario['nombre']; ?> <?php echo $usuario['apellido']; ?></h2>
                <h3>Arrendador</h3>

                
            </div>
            <nav>
                <ul>
                    <li><a href="#" onclick="cargarContenido('tusdatos.php?id=<?php echo $id; ?>'); return false;">Mis Datos</a></li>
                    <li><a href="#" onclick="cargarContenido('propiedadespublicadas.php?id=<?php echo $id; ?>'); return false;">Propiedades publicadas</a></li>
                    <li><a href="#" onclick="cargarContenido('propiedadescompartidas.php?id=<?php echo $id; ?>'); return false;">Propiedades compartidas</a></li>
                    <li><a href="#" onclick="cargarContenido('propiedadesguardadas.php?id=<?php echo $id; ?>'); return false;">Propiedades guardadas</a></li>
                    <li><a href="#" onclick="cargarContenido('propiedadesvistas.php?id=<?php echo $id; ?>'); return false;">Propiedades vistas</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                    <li><a href="#">Eliminar cuenta</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-content" id="contenido">
            <?php include("tusdatos.php"); ?>
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