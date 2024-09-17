
<?php

$id= $_GET['id'];
$conexion= mysqli_connect("localhost", "root", "", "zonae");
$consulta= "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>
<!DOCTYPE html>
 
<html>
<head>
   <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>INICIO WEB</title>

    <link rel="stylesheet" href="css/publicacionesindex.css" />
    <link rel="stylesheet" href="css/barra.css" />
    <script src="https://kit.fontawesome.com/87dae9917c.js" crossorigin="anonymous"></script>
    <script defer src="codigo/codigo.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="codigo/jquery.jscroll.js"></script>
</head>
<body>
 <?php
    include("barrausuario.php");
?>
  <!-- codigo scroll -->
          <div class="scroll">
            <?php require_once 'publicacionesindex.php'; ?>
          </div>

            <script>
            //Simple codigo para hacer la paginacion scroll
            $(document).ready(function() {
              $('.scroll').jscroll({
                loadingHtml: '<img src="image/invisible.png" alt="Loading" />'
            });
            });
            </script>
          <!-- codigo scroll -->

     
        

    <?php
    include("footerpie.html");
    ?>
    <script type="text/javascript">
      n=60
     
      var id =window.setInterval(function(){
        document.onmousemove = function(){
          n=60

        };
         
          n--;
        if (n <= -1) {
         
          location.href="ventanainactividad.php";

        }
      },1200);

    </script>
</body>
</html>
