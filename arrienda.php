<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/barra.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

</head>
<body>

  
    
    <nav class="conte_title">
        <nav class="conte_title1">
            <center>

            <form  class ="fomuu" method="post">
              <input type="submit" name="casa" value="casa" class="botton">
              <input type="submit" name="apartaestudio" value="apartaestudio" class="botton">
              <input type="submit" name="habitacion" value="habitacion" class="botton">
              <!--cajas que llenar datos-->
              <input type="text" class="caja" name="barrio" placeholder="ingrese barrio">
              <input type="text" class="caja" name="direccion" placeholder="ingrese direccion">

              <input type="submit" name ="guardar" value="guardar" class="botton">
            </form>
             <?php 
              include("programer.php");
              ?>
           
        </center>
        </nav>
        </nav>
        
  
      
  </footer> 
</body>
</html>