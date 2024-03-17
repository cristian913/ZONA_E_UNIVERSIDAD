<!DOCTYPE html>
<html>
<head>
    <title>Página de Ayuda</title>
    <script defer src="codigo/codigo.js"></script>
    <link rel="stylesheet" href="css/desplegable.css" />
  
</head>
<body>
    <h1>Página de Ayuda</h1>

    <!-- Botón de Ayuda -->
    <button id="botonAyuda">Ayuda</button>

    <!-- Contenedor para el tooltip -->
    <div id="tooltip">Preguntas Frecuentes</div>

    <!-- Contenedor para el panel de preguntas frecuentes -->
    <div id="faqPanel" >
        <div class="faqItem">
            <a href="preguntas_frecuentes/como_inicio_sesion.html"> ¿Cómo inicio sesión?</a>
        </div>
        <div class="faqItem">
            <a href="preguntas_frecuentes/como_registrarme.html"> ¿como me registro?</a>
        </div>
        <div class="faqItem">
            <a href="preguntas_frecuentes/como_publico_producto.html"> ¿Cómo publico mi producto?</a>
        </div>
        <div class="faqItem">
            <a href="preguntas_frecuentes/como_buscar_sitio_cerca.html"> ¿como busco un sitio cercano a la U?</a>
        </div>
        <div class="faqItem">
            <a href="preguntas_frecuentes/como_modifico_miperfil.html"> ¿Cómo modifico mi perfil?</a>
        </div>
        <div class="faqItem">
            <a href="#preguntas_frecuentes/contacta_dueño_producto.html"> ¿como contacto al dueño del producto?</a>
        </div>
        <div class="faqItem">
            <a href="#pregunta7"> ¿Cómo denuncio un usuario?</a>
        </div>
        <div class="faqItem">
            <a href="#pregunta8">¿como elimino mi cuenta?</a>
        </div>
        
    </div>
    <script>
        // Obtener elementos del DOM
        var botonAyuda = document.getElementById("botonAyuda");
        var tooltip = document.getElementById("tooltip");
        var faqPanel = document.getElementById("faqPanel");

        // Mostrar el tooltip cuando el cursor pasa por encima del botón de ayuda
        botonAyuda.addEventListener("mouseover", function() {
            tooltip.style.display = "block";
        });

        // Ocultar el tooltip cuando el cursor sale del botón de ayuda
        botonAyuda.addEventListener("mouseout", function() {
            tooltip.style.display = "none";
        });

        // Mostrar el panel de preguntas frecuentes cuando se hace clic en el botón de ayuda
        botonAyuda.addEventListener("click", function() {
            faqPanel.style.display = "block";
        });
    </script>


</body>
</html>