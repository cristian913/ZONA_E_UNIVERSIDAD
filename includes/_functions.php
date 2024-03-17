<?php
   
require_once ("_db.php");




if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'guardar_datos';
            guardar_datos();
    
            break;


             case 'bloquear_usuario';
            bloquear_usuario();
    
            break;

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;

            case 'guardar_publicacion';
            guardar_publicacion();
            break;


		}

	}

    function editar_registro() {
		$conexion=mysqli_connect("localhost","root","","registrosss");
		extract($_POST);
		$consulta="UPDATE user SET nombre = '$nombre', correo = '$correo',
		contraseña='$password', rol = '$rol' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../views/user.php');


}
    function guardar_datos() {
        $conexion=mysqli_connect("localhost","root","","registrosss");
        extract($_POST);
        $consulta="UPDATE user SET  nombre = '$nombres' WHERE id = '$id' ";

        mysqli_query($conexion, $consulta);
        header('Location: ../perfil.php');

  
}
    function bloquear_usuario() {
    
        $conexion=mysqli_connect("localhost","root","","registrosss");
        extract($_POST);

        $consulta="UPDATE user SET  estado= '$estado'
         WHERE id = '$id' ";

        mysqli_query($conexion, $consulta);


        

}



function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","registrosss");
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../views/user.php');

}

function acceso_user() {

    $correo=$_POST['correo'];
    $contraseña =$_POST['contraseña'];
    session_start();
    $_SESSION['correo']=$correo;

    

    $conexion=mysqli_connect("localhost","root","","registrosss");
    $consulta= "SELECT * FROM user WHERE correo='$correo' AND contraseña='$contraseña'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1 && $filas['estado'] == 1){ //admin
        header("Location: ../views/user.php?id=" . $filas['id'] );

    }else if($filas['rol'] == 2 && $filas['estado'] == 1){//lector
        header("Location: ../views/lector.php?id=" . $filas['id']);
    }else if($filas['rol'] == 3 && $filas['estado'] == 1){//usuario
      
       header("Location: ../index_session.php?id=" . $filas['id']);


    }
    
    
    else{

        header('Location: ../iniciosession.php');
        session_destroy();

    }

  
}
 function guardar_publicacion() {
        
        $conexion=mysqli_connect("localhost","root","","registrosss");               
        $SQL="SELECT user.id FROM user
        LEFT JOIN publicaciones ON publicaciones.idusuario = user.id";
        $dato = mysqli_query($conexion, $SQL);

  
}






