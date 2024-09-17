<?php
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if ($validar == null || $validar == '') {
    header("Location: iniciosession.php");
    die();
}

$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "zonae");
$consulta = "SELECT * FROM publicaciones WHERE usuario = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
 <h1>Propiedades compartidas</h1>
        <div class="carousel-wrapper">
            <button class="nav prev"><i class="fas fa-chevron-left"></i></button>
            <div class="carousel">
                <div class="card">
                    <img src="imagen-ejemplo.jpg" alt="Propiedad">
                    <div class="card-content">
                        <h2><?php echo $usuario['barrio'];?> <i class="fas fa-share"></i></h2>
                        <p>$700.000 Cop</p>
                        <ul>
                            <li><i class="fas fa-bed"></i> 2 habitaciones</li>
                            <li><i class="fas fa-bath"></i> 2 baños</li>
                            <li><i class="fas fa-paw"></i> Permitido</li>
                        </ul>
                        <a href="infopublicacion.php?id=<?php echo $id; ?>" class="contact-button">Contactar</a>
                    </div>
                </div>
                <div class="card">
                    <img src="imagen-ejemplo.jpg" alt="Propiedad">
                    <div class="card-content">
                        <h2>ApartaEstudio en arriendo <i class="fas fa-share"></i></h2>
                        <p>$700.000 Cop</p>
                        <ul>
                            <li><i class="fas fa-bed"></i> 2 habitaciones</li>
                            <li><i class="fas fa-bath"></i> 2 baños</li>
                            <li><i class="fas fa-paw"></i> Permitido</li>
                        </ul>
                        <button class="contact-button">Contactar</button>
                    </div>
                </div>
                <div class="card">
                    <img src="imagen-ejemplo.jpg" alt="Propiedad">
                    <div class="card-content">
                        <h2>ApartaEstudio en arriendo <i class="fas fa-share"></i></h2>
                        <p>$700.000 Cop</p>
                        <ul>
                            <li><i class="fas fa-bed"></i> 2 habitaciones</li>
                            <li><i class="fas fa-bath"></i> 2 baños</li>
                            <li><i class="fas fa-paw"></i> Permitido</li>
                        </ul>
                        <button class="contact-button">Contactar</button>
                    </div>
                </div>
                <div class="card">
                    <img src="imagen-ejemplo.jpg" alt="Propiedad">
                    <div class="card-content">
                        <h2>ApartaEstudio en arriendo <i class="fas fa-share"></i></h2>
                        <p>$700.000 Cop</p>
                        <ul>
                            <li><i class="fas fa-bed"></i> 2 habitaciones</li>
                            <li><i class="fas fa-bath"></i> 2 baños</li>
                            <li><i class="fas fa-paw"></i> Permitido</li>
                        </ul>
                        <button class="contact-button">Contactar</button>
                    </div>
                </div>
            </div>
            <button class="nav next"><i class="fas fa-chevron-right"></i></button>
        </div>
         <script >
         document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('.carousel');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');

    let scrollPosition = 0;

    prevButton.addEventListener('click', () => {
        scrollPosition -= carousel.clientWidth;
        if (scrollPosition < 0) {
            scrollPosition = 0;
        }
        carousel.scrollTo({
            top: 0,
            left: scrollPosition,
            behavior: 'smooth'
        });
    });

    nextButton.addEventListener('click', () => {
        scrollPosition += carousel.clientWidth;
        if (scrollPosition > carousel.scrollWidth - carousel.clientWidth) {
            scrollPosition = carousel.scrollWidth - carousel.clientWidth;
        }
        carousel.scrollTo({
            top: 0,
            left: scrollPosition,
            behavior: 'smooth'
        });
    });
});
         </script>