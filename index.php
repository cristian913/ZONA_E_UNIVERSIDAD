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
<?php
    include("barrainicio.html");
?>
     <main>

        <div class="contenedor-title">
            <h2>encuentra el  lugar que<br> estabas buscando</h2>

        </div>

        <div class="contenedor-principal">
            <div class="contenedor-busqueda">
                <div class="busqueda1">
                    Tipo de mueble
                </div>
            </div>

            <div class="contenedor-busqueda">
                <div class="busqueda2">
                    Ciudad, barrio o tipo de interes
                </div>
            </div>

            <div class="contenedor-busqueda">
                <div class="busqueda3">
                    <button class="button3">Buscar</button>
                </div>
            </div>
        </div>

        <!--primera imagen-->
        <div class="contenedor-imagen1">
            <img src="./image/image1.png" alt="imagen">
            <p>!Que Esperas Para Formar Parte De Esta Increible Aventura!</p>

        </div>


        <!--segunda imagen-->
        <div class="contenedor-imagen2">
            <img src="./image/image2.png" alt="imagen">
            

        </div>

        <!-- texto segunda imagen-->
        <div class="parrafo-segunda-imagen">
            <h2>Todo lo que buscas en un mismo lugar</h2>
            <a href="">conoce mas sobre nosotros</a>

        </div>


        <!---      section de carrucel de promociones             -->


        <div class="carousel">
            
            <div class="container-imagenes">
                <div> 
                    <a href="/inicio-autenticacion/login-usuario.html"><img class="foto" 

                        src="./image/carreta1.jpeg" alt="logo-kokorico">
                    </a>

                    
                    
                </div>
                    
                <div>
                    <a href="/inicio-autenticacion/login-usuario.html"><img class="foto"
                    
                        src="./image/carreta2.jpeg" alt="logo-corral">
                    </a>

                   
                </div>
                
                <div>
                    <a href="/inicio-autenticacion/login-usuario.html"><img class="foto"
                        
                        src="./image/carreta3.jpeg" alt="logo-corral">
                    </a>

                    
                </div>    

                <div>
                    <a href="/inicio-autenticacion/login-usuario.html"><img class="foto"
                        
                        src="./image/carreta1.jpeg" alt="logo-presto">
                    </a>

                    
                </div>

                <div>
                    <a href="/inicio-autenticacion/login-usuario.html"><img class="foto"
                        
                        src="./image/carreta2.jpeg" alt="logo-candelaria">
                    </a>

                   
                </div>

                <div>
                    <a href="/inicio-autenticacion/login-usuario.html"><img class="foto"
                    
                        src="./image/carreta2.jpeg" alt="logo-corral">
                    </a>

                    
                </div>

                <div>
                    <a href="/inicio-autenticacion/login-usuario.html"><img class="foto"
                    
                        src="./image/carreta3.jpeg" alt="logo-pospy">
                    </a>
                    
                </div>

                <div>
                    <a href="/proyecto/inicio-autenticacion/login-usuario.html"><img class="foto"
                    
                        src="./image/carreta1.jpeg" alt="logo-frisby">
                    </a>
                    
                </div>

            
            </div>

            <div class="right-arrow">
                <img src="./image/right.svg" alt="">
            </div>
                
            <div class="left-arrow">
                <img src="./image/left.svg" alt="">
            </div>

            
        </div>


        <!--contedenor de estrellas-->

        <div class="contenedor-principal">
            <div class="contenedor-busqueda">
                
                <div class="busqueda1">
                    <img src="./image/estrellita.png" alt="">
                    Facil de navegar
                </div>

            </div>

            <div class="contenedor-busqueda">
                <div class="busqueda2">
                    <img src="./image/estrellita.png" alt="">
                    Cientos de opciones disponibles
                </div>
            </div>

            
            <div class="contenedor-busqueda">
                <div class="busqueda2">
                    <img src="./image/estrellita.png" alt="">
                        Información de interes
                </div>
            </div>
    
                
           
            


        </div>
        
        <div class="contenedor-title-2">
            <h2>Unete totalmente gratis, busca o publica un imueble</h2>

        </div>

        <!--primera imagen-->
        <div class="contenedor-imagen1">
            <img src="./image/image3.png" alt="imagen">
           

        </div>

    </main>
    <?php
    include("footerpie.html");
    ?>
    
   
</body>
</html>
