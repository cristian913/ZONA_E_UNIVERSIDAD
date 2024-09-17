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
            
                <div class="form-group">
                    <label for="nombres">Nombres: <?php echo $usuario['nombre'];?></label>
                    
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos: <?php echo $usuario['apellido'];?></label>
                   
                </div>
                <div class="form-group">
                    <label for="fecha-nacimiento">Fecha de nacimiento</label>
                </div>
                <div class="form-group">
                   
                </div>
                <div class="form-group">
                   
                </div>
                <div class="form-group">
                    <label for="correo">Correo : <?php echo $usuario['correo'];?></label>
            
                </div>
                
            
            

               

              

        