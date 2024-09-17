<?php
include 'includes/_db.php';
?>
<script type="text/javascript" src="js/likes.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $(".enviar-btn").keypress(function(event) {

        if (event.which == 13) {

            var getpID =  $(this).parent().attr('id').replace('record-','');
            var usuario = $("input#usuario").val();
            var comentario = $("#comentario-" + getpID).val();
            var publicacion = getpID;
            var avatar = $("input#avatar").val();
            var nombre = $("input#nombre").val();
            var now = new Date();
            var date_show = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds();

            if (comentario.trim() == '') {
                alert('Debes añadir un comentario');
                return false;
            }

            var dataString = 'usuario=' + usuario + '&comentario=' + encodeURIComponent(comentario) + '&publicacion=' + publicacion;

            $.ajax({
                type: "POST",
                url: "agregarcomentario.php",
                data: dataString,
                success: function() {
                    $('#nuevocomentario'+getpID).append('<div class="box-comment"><img class="img-circle img-sm" src="avatars/' + avatar + '"><div class="comment-text"><span class="username"> ' + nombre + '<span class="text-muted pull-right">' + date_show + '</span></span>' + comentario + '</div></div>');
                }
            });
            return false;
        }
    });

});
</script>
<?php
// Establecer conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "zonae");

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Definir la cantidad de registros a mostrar por página
$CantidadMostrar = 5;

// Validar la variable GET para la paginación
$compag = (int)(!isset($_GET['pag']) ? 1 : $_GET['pag']);

// Obtener el total de registros de la tabla 'publicaciones'
$TotalReg = mysqli_query($conexion, "SELECT * FROM publicaciones");
$totalr = mysqli_num_rows($TotalReg);

// Calcular el número total de páginas
$TotalRegistro = ceil($totalr / $CantidadMostrar);

// Operación matemática para determinar el siguiente número de página
$IncrimentNum = (($compag + 1) <= $TotalRegistro) ? ($compag + 1) : 0;

// Consulta SQL para obtener las publicaciones de la página actual
$consultavistas = "SELECT * FROM publicaciones ORDER BY id_pub DESC LIMIT " . (($compag - 1) * $CantidadMostrar) . ", " . $CantidadMostrar;
$consulta = mysqli_query($conexion, $consultavistas);

// Verificar si la consulta tuvo éxito
if (!$consulta) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

// Recorrer las publicaciones obtenidas
while ($lista = mysqli_fetch_array($consulta)) {

    // Escapar la entrada para evitar inyección SQL
    $userid = mysqli_real_escape_string($conexion, $lista['usuario']);
    
    // Consulta para obtener el usuario relacionado
    $usuariob = mysqli_query($conexion, "SELECT * FROM user WHERE id = '$userid'");
    
    // Verificar si la consulta tuvo éxito antes de intentar obtener los datos
    if ($usuariob && mysqli_num_rows($usuariob) > 0) {
        $use = mysqli_fetch_array($usuariob);
    } else {
        $use = null;
    }

    // Consulta para obtener las fotos relacionadas con la publicación
    $fotos = mysqli_query($conexion, "SELECT * FROM publicaciones WHERE usuario = '" . $lista['id_pub'] . "'");
    
    if ($fotos && mysqli_num_rows($fotos) > 0) {
        $fot = mysqli_fetch_array($fotos);
    } else {
        $fot = null;
    }

    // Aquí puedes continuar con el procesamiento de los datos obtenidos...
?>

<!-- START PUBLICACIONES -->
<div class="box box-widget">
    <div class="box-header with-border">
      <div class="user-block" onclick="location.href='perfilss.php?id=<?php echo urlencode($use['id']); ?>&para=<?php echo urlencode($use['id']); ?>&de=<?php echo urlencode($id); ?>';">
                <img class="img-circle" src="./includes/publicaciones/perfil_usuarios/<?php echo $use['id']; ?>/<?php echo $use['perfil']; ?>"
                 onerror="this.src='./includes/publicaciones/perfil_usuarios/usuario.png'" alt="User Image">
            </a>
            <span class="description" onclick="location.href='perfil.php?id=<?php echo $use['id'];?>';" style="cursor:pointer; color: #3C8DBC;">
                <?php echo $use['nombre'];?> <?php echo $use['apellido'];?>
            </span>
            <span class="description">. <?php echo $lista['fecha'];?></span>
        </div>
        <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <h3><?php echo $lista['titulopublicacion'];?> </h3>
        <p><?php echo $lista['descripcion_publicacion'];?> </p>

        <!-- Imagen de la publicación -->
        <a onclick="location.href='infopublicacion.php?id=<?php echo $use['id'];?>';">
            <img src="./includes/publicaciones/perfil_usuarios/<?php echo $userid; ?>/<?php echo $use['perfil']; ?>" onerror="this.src='./includes/publicaciones/perfil_usuarios/usuario.png'" width="100%">
        </a>

        <br><br>
        <?php
        $numcomen = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM comentarios WHERE publicacion = '".$lista['id_pub']."'"));
        ?>
        <ul class="list-inline">
            <li>
                <div class="btn btn-default btn-xs like" id="post_id"><i class="fa fa-thumbs-o-up"></i> Me gusta </div>
                <span id="likes_post_id"> (Número de Likes)</span>
            </li>
            <li class="pull-right">
                <span href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comentarios
                        (<?php echo $numcomen; ?>)</span>
            </li>
        </ul>
    </div>

    <div class="box-footer box-comments">
        <?php
        // Obtener los comentarios
        $comentarios = mysqli_query($conexion, "SELECT * FROM comentarios WHERE publicacion = '".$lista['id_pub']."' ORDER BY id_com DESC LIMIT 2");

        while($com = mysqli_fetch_array($comentarios)) {
            $usuarioc = mysqli_query($conexion, "SELECT * FROM user WHERE id = '".$com['usuario']."'");
            $usec = mysqli_fetch_array($usuarioc);
        ?>
        <div class="box-comment">
            <img src="./includes/publicaciones/perfil_usuarios/<?php echo $usec['id']; ?>/<?php echo $usec['perfil']; ?>" onerror="this.src='./includes/publicaciones/perfil_usuarios/usuario.png'"class="img-circle">

            <div class="comment-text">
                <span class="username">
                    <?php echo $usec['nombre'];?>
                    <span class="text-muted pull-right"><?php echo $com['fecha'];?></span>
                </span>
                <?php echo $com['comentario'];?>
            </div>
        </div>
        <?php } ?>

        <?php if ($numcomen > 2) { ?> 
        <br>
        <center><span onclick="location.href='publicacion.php?id=<?php echo $lista['id_pub'];?>';" style="cursor:pointer; color: #3C8DBC;">Ver todos los comentarios</span></center>
        <?php } ?>

        <div id="nuevocomentario<?php echo $lista['id_pub'];?>"></div>
        <br>
        <form method="post" action="">
            <label id="record-<?php echo $lista['id_pub'];?>">
            <input type="text" class="enviar-btn form-control input-sm" style="width: 800px;" placeholder="Escribe un comentario" name="comentario" id="comentario-<?php echo $lista['id_pub'];?>">
            <input type="hidden" name="usuario" value="<?php echo $id?>" id="usuario">
            <input type="hidden" name="publicacion" value="<?php echo $lista['id_pub'];?>" id="publicacion">
            
        </form>
    </div>
</div>

<?php
} // Fin del bucle while
// Validar el incrementador para que no genere error de consulta
if ($IncrimentNum > 0) {
    echo "<a href=\"publicaciones.php?pag=" . $IncrimentNum . "\">Siguiente</a>";
}

// Cerrar la conexión
mysqli_close($conexion);
?>