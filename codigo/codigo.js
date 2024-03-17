
const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");

navToggle.addEventListener("click", () => {
  navMenu.classList.toggle("nav-menu_visible");

  if (navMenu.classList.contains("nav-menu_visible")) {
    navToggle.setAttribute("aria-label", "Cerrar menú");
  } else {
    navToggle.setAttribute("aria-label", "Abrir menú");
  }
});

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