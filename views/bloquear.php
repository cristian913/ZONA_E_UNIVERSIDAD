<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){
    header("Location: ../includes/login.php");
    die();

}

$id= $_GET['id'];
$estado= $_GET['estado'];
$conexion= mysqli_connect("localhost", "root", "", "zonae");
$consulta= "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container mt-5">
    <div class="row">
    <div class="col-sm-6 offset-sm-3">
    <div class="alert alert-danger text-center">
    <p>¿Desea confirmar el bloqueo del usuario?</p>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <form action="../lib/_functions.php" method="POST">
                  <div class="form-group">
                           
                            
                     <input type="hidden" name="accion" value="bloquear_usuario">
                       <input type="hidden" name="id" value="<?php echo $id;?>">
                     <input type="hidden" name="estado" value="<?php echo $estado;?>">
                     <button type="submit" class="btn btn-success" >bloquear</button>
                    <a href="user.php" class="btn btn-danger">Cancelar</a>

                               
        </div>
    </div>



</body>
</html>