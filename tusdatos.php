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
$consulta = "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<h2>Datos personales</h2>
            <form action="../includes/_functions.php" method="POST">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                    <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre'];?>">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $usuario['apellido'];?>">
                </div>
                <div class="form-group">
                    <label for="fecha-nacimiento">Fecha de nacimiento</label>
                    <input type="date" id="fecha-nacimiento" name="fecha_nacimiento"  value="">
                </div>
                <div class="form-group">
                    <label for="genero">Género</label>
                    <select id="genero" name="genero" >
                        <option value="">Seleccione</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pais">País</label>
                    <select id="pais" name="pais">
                        <option value="">Seleccione</option>
                        <option value="">colombia</option>
                        <option value="">argentina</option>
                        <!-- Agregar más opciones de países aquí -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $usuario['correo'];?>">
                </div>
                <h2>Notificaciones</h2>
                <div class="form-group">
                    <label for="publicaciones">Mis publicaciones</label>
                    <select id="publicaciones" name="publicaciones">
                        <option value="">Seleccione</option>
                        <!-- Agregar más opciones aquí -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="novedades">Novedades</label>
                    <select id="novedades" name="novedades">
                        <option value="">Seleccione</option>
                        <!-- Agregar más opciones aquí -->
                    </select>
                </div>
                <!--
                <input type="hidden" name="accion" value="editar">
                -->
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="actualizar">Guardar cambios</button>
            </form>
            

                <?php
                
                    if (!$conexion) {
                        die("Error en la conexión: " . mysqli_connect_error());
                        
                    }


                  if (isset($_POST['actualizar'])) {
                    $conexion = mysqli_connect("localhost", "root", "", "zonae");
                        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
                         $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
                         $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
                          extract($_POST);
                      $consulta="UPDATE user SET nombre = '$nombre',apellido = '$apellido', correo = '$correo' WHERE id = '$id' ";
                     mysqli_query($conexion, $consulta);
                     echo "<br>Datos actualizados correctamente. Será redirigido en 5 segundos...";
                    header("Refresh:5; url = perfil.php?id=" . urlencode($id));


                  }else{
                   echo "<br>ingrese sus datos para actualizarlos";
                  }
               

              
                        




        ?>



        