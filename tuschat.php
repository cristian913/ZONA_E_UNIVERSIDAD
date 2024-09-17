<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Hermoso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Arial', sans-serif;
        }

        .content-wrapper {
            background-color: #fff;
            padding: 20px;
            margin: 50px auto;
            max-width: 900px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .box-header h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .direct-chat-messages {
            height: 400px;
            overflow-y: scroll;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
        }

        .direct-chat-msg {
            margin-bottom: 20px;
        }

        .direct-chat-msg.right {
            text-align: right;
        }

        .direct-chat-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .direct-chat-text {
            background-color: #d2d6de;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            max-width: 60%;
        }

        .direct-chat-msg.right .direct-chat-text {
            background-color: #007bff;
            color: #fff;
        }

        .box-footer {
            margin-top: 20px;
        }

        .box-footer .input-group {
            display: flex;
            border-radius: 5px;
            overflow: hidden;
        }

        .box-footer .input-group input[type="text"] {
            border: none;
            padding: 15px;
            font-size: 16px;
            flex: 1;
            outline: none;
        }

        .box-footer .input-group input[type="submit"] {
            background-color: #007bff;
            border: none;
            padding: 15px 20px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .box-footer .input-group input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .box-header h3 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Chat <small>13 nuevos mensajes</small></h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="chats.php" class="btn btn-primary btn-block margin-bottom">Mis chats</a>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Carpetas</h3>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#"><i class="fa fa-inbox"></i> Mis chats
                                <span class="badge bg-primary float-end">13</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">NOMBRE USUARIO</h3>
                    </div>

                    <div class="box-body">
                        <div class="direct-chat-messages">
                            <!-- Mensajes del chat -->
                            <div class="direct-chat-msg">
                                <img class="direct-chat-img" src="https://via.placeholder.com/40" alt="User Image">
                                <div class="direct-chat-text">
                                    Hola, ¿cómo estás?
                                </div>
                            </div>

                            <div class="direct-chat-msg right">
                                <img class="direct-chat-img" src="https://via.placeholder.com/40" alt="User Image">
                                <div class="direct-chat-text">
                                    ¡Estoy bien, gracias!
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <form action="" method="post">
                            <div class="input-group">
                                <input type="text" name="mensaje" placeholder="Escribe un mensaje" class="form-control">
                                <span class="input-group-btn">
                                    <input type="submit" name="enviar" class="btn btn-primary">Enviar
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>