<?php
$conexion= mysqli_connect("localhost", "root", "", "registrosss");

if(isset($_POST['registrar'])){

    if(strlen($_POST['usuario']) && strlen($_POST['correo'])  >=1 && strlen($_POST['contraseña'])  >=1 ){
   
    $nombre = trim($_POST['usuario']);
    $apellido ="sin dato";
    $fecha_nacimiento="sin dato";
    $genero ="seleccion";
    $pais ="seleccion";
    $telefono ="sin dato";
    $centro_educativo ="seleccion";
    $tipo ="seleccion";
    $correo = trim($_POST['correo']);
    $fechareg = date("d/m/y");
    $contraseña = trim($_POST['contraseña']);
    $estado=1;
    $rol =3;
    $perfil ="";


    $consulta= "INSERT INTO user (nombre,apellido,fecha_nacimiento,genero,pais,telefono,correo,centro_educativo,fecha_reg, contraseña,tipo,estado,  rol,perfil)
    VALUES ('$nombre','$apellido', '$fecha_nacimiento', '$genero', '$pais', '$telefono', '$correo','$centro_educativo',  '$fechareg ','$contraseña','$tipo', $estado, '$rol','$perfil')";


    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../iniciosession.php');
  }
}









?>