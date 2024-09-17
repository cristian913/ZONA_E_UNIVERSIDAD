<?php
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if ($validar == null || $validar == '') {
    header("Location: iniciosession.php");
    die();
}

$para = $_GET['para'];
$de = $_GET['de'];

?>
<style>
  .chat-box {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    background-color: #fff;
  }

  .chat-header {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    text-align: center;
  }

  .chat-messages {
    height: 300px;
    overflow-y: scroll;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #f9f9f9;
  }

  .input-group {
    display: flex;
    align-items: center;
  }

  .input-group input[type="text"] {
    flex-grow: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 10px;
    outline: none;
    font-size: 14px;
  }

  .input-group .btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
  }

  .input-group .btn:hover {
    background-color: #0056b3;
  }
</style>

<div class="chat-box">
  <div class="chat-header">
    NOMBRE USUARIO
  </div>
  
  <div class="chat-messages">
    <!-- Aquí irían los mensajes del chat -->
  </div>

  <form action="" method="post">
    <div class="input-group">
      <input type="text" value="<?php echo $para?>">
      <input type="text" value="<?php echo $de?> " name="">
      <input type="text" name="mensaje" placeholder="Escribe un mensaje" class="form-control">
      <input type="submit" name="enviar" class="btn btn-primary" value="Enviar">
    </div>
  </form>
</div>
<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "zonae");

// Verificar la conexión
if ($conexion ->connect_error) {
    die("Conexión fallida: " . $conexion ->connect_error);
}

if (isset($_POST['enviar'])) {
    // Recoger el mensaje y el ID del usuario destinatario
    $mensaje = mysqli_real_escape_string($conexion , $_POST['mensaje']);
    $de = $de;  // El ID del usuario que envía el mensaje
    $para =$para;

    // Comprobar si ya existe un chat entre estos dos usuarios
    $comprobar = mysqli_query($conexion , "SELECT * FROM c_chats WHERE (de = '$de' AND para = '$para') OR (de = '$para' AND para = '$de')");
    $com = mysqli_fetch_array($comprobar);

    if (mysqli_num_rows($comprobar) == 0) {
        // Si no existe un chat entre estos usuarios, crear uno
        $insert = mysqli_query($conexion , "INSERT INTO c_chats (de, para) VALUES ('$de', '$para')");
        $siguiente = mysqli_query($conexion , "SELECT id_cch FROM c_chats WHERE (de = '$de' AND para = '$para') OR (de = '$para' AND para = '$de')");
        $si = mysqli_fetch_array($siguiente);
        $id_cch = $si['id_cch'];

        // Insertar el mensaje en la tabla de chats
        $insert2 = mysqli_query($conexion , "INSERT INTO chats (id_cch, de, para, mensaje, fecha, leido) 
                                        VALUES ('$id_cch', '$de', '$para', '$mensaje', NOW(), '0')");
        if ($insert2) {
            echo '<script>window.location="chat.php?usuario='.$para.'"</script>';
        }
    } else {
        // Si ya existe un chat, agregar el mensaje a la conversación existente
        $id_cch = $com['id_cch'];
        $insert3 = mysqli_query($conexion , "INSERT INTO chats (id_cch, de, para, mensaje, fecha, leido) 
                                        VALUES ('$id_cch', '$de', '$para', '$mensaje', NOW(), '0')");
        if ($insert3) {
            echo '<script>window.location="chat.php?usuario='.$para.'"</script>';
        }
    }
}
?>