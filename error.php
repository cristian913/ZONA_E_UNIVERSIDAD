?> 
            <h3 class="ok">¡Te has inscripto correctamente!</h3>
            
            

           <?php

           class="close" data-dismiss="alert" aria-hidden="true"

           .ok{
  bottom: 0px;
  position: absolute;
  text-align: center;
  width: 100%;
  padding: 12px;
  background: green;
  color: #fff
}
.bad{
  bottom: 0px;
  position: absolute;
  text-align: center;
  width: 100%;
  padding: 12px;
  background: red;
  color: #fff
}
.error{
  position:absolute;
  bottom: 0px;
  text-align: center;
  width: 100%;
  padding: 12px;
  background: red;
  color: #fff
}


if ($mostrarInput) {
                    echo '<input type="file" id="selImg" name="selImg" class="form-control">';
                    echo '<input type="submit" value="Guardar" name="fotoperfil" id="register" class="btn btn-success">';
                }


                 <meta http-equiv="refresh" content="10;url=perfil.php?id=<?php echo urlencode($id); ?>">



                  <?php
                $conexion=mysqli_connect("localhost","root","","registrosss");
                
                extract($_POST);
                $consulta="UPDATE user SET nombre = '$nombre', correo = '$correo',
                contraseña='$password', rol = '$rol' WHERE id = '$id' ";
               mysqli_query($conexion, $consulta);
              header("Refresh:2; url = perfil.php?id=" . urlencode($id));
               
                
             ?>