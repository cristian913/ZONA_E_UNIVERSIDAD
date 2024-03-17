<?php
$conexion=mysqli_connect("localhost","root","","registrosss"); 

if(isset($_POST['guardar'])){
    $perfil=addslashes(file_get_contents($_FILES['perfil']['tpm_name']));
$query="UPDATE user SET perfil= $perfil WHERE id = $id";
$resultado=$conexion->query($query);
if ($resultado) {
    echo"se an insertado correrctamente los datos";
}else{
    echo"errror";



}
 header('Location: ../perfil.php');

?>