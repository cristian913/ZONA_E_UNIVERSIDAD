<?php

session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if( $validar == null || $validar = ''){

  header("Location:iniciosession.php");
  die();
  
}


?>
<?php




$id= $_GET['id'];
$conexion= mysqli_connect("localhost", "root", "", "registrosss");
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

    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/barra.css" />
    <script src="https://kit.fontawesome.com/87dae9917c.js" crossorigin="anonymous"></script>
    <script defer src="codigo/codigo.js"></script>
</head>
<body>
 <header class="conte_header"   method="POST">
  
     <nav class="conte_barra">
        
        <a href="inicio.html" class="ZONAE nav-link"><i class="fa-solid fa-house" style="color: #ffffff;
        margin-right: 10px;"></i>ZONA E</a>

        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu">
          <li class="menu-item">
            <a href="arrienda.php" class="nav-menu-link nav-link">Arrienda</a>
          </li>
          <li class="menu-item">
            <a href="#" class="nav-menu-link nav-link">Publicar</a>
          </li>
            <li class="menu-item">
            <a href="ayuda.php" class="nav-menu-link nav-link">ayuda</a>
          </li>
          <li class="menu-item">
          

            <a href="perfil.php?id=<?php echo $id?>" class="nav-menu-link nav-link nav-menu-link_active"
              >pefil </a
            >
          </li>
     
          

        </ul>
        
      </nav>
   
     
    </header>

  <nav class="cajaa">

<a href="logout.php">Cerrar Sesión</a>

    
  </nav>
     
        

    <footer>
      
      <nav class="con">
        <a href="inicio.html" class="ZONAE nav-link"><i class="fa-solid fa-house" style="color: #ffffff;margin: 30px;"></i>ZONA E</a>
      </nav >
      <nav class="conte-footer1">
       <ul class="lis-conte">
         <li>
           <a href="">preguntas frecuentes</a>
           <a href="terminos_condiciones.php">terminos y condiciones</a>
           <a href="">politicas privacidad</a>
           <a href="">ayuda</a>
         </li>
       </ul> 
      </nav>
      
      <nav class="conte-footer">
       <ul class="lis-conte">
         <li>
          <h1  class="contatar" >contactanos</h1>
           <a href=""><i class="fa-regular fa-envelope" style="color: #ffffff;margin: 10px;"></i>correo</a>
           <a href=""><i class="fa-brands fa-whatsapp" style="color: #ffffff;margin: 10px;"></i>whassap</a>

           <a href=""><i class="fa-brands fa-facebook" style="color: #ffffff;margin: 10px;"></i></i>faccebook</a>
           
         </li>
       </ul> 
      </nav>
      

      
    </footer>
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
