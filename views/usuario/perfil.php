<?php
require_once __DIR__ . '/../../config/session_manager.php';
require_once __DIR__ . '/../../model/UsuarioModel.php';

$usuarioModel = new UsuarioModel();
$usuario = $usuarioModel->obtenerPorId($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f67f6, #021b79);
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 450px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card-text {
            font-size: 14px;
            color: #d3d3d3;
        }

        .card-img-top {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .btn-primary {
            background: linear-gradient(135deg, #ffd700, #f39c12);
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            color: #000;
            font-weight: bold;
            width: 100%;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #f39c12, #ffd700);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #0f67f6, #021b79);
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            color: #ffffff;
            font-weight: bold;
            width: 100%;
            transition: 0.3s ease;
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #021b79, #0f67f6);
        }

        .footer-text {
            text-align: center;
            font-size: 14px;
        }

        .footer-text a {
            color: #ffd700;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        /* Decorative binary background */
        .binary-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            z-index: -1;
            opacity: 0.1;
        }

        .binary-background span {
            position: absolute;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            color: #ffffff;
            animation: float 5s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="binary-background">
        <!-- Repeated binary code for the animated background -->
        <span style="left: 10%; animation-delay: 0s;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">101010</font></font></span>
        <span style="left: 20%; animation-delay: 1s;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">010101</font></font></span>
        <span style="left: 30%; animation-delay: 2s;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">111000</font></font></span>
        <span style="left: 40%; animation-delay: 3s;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">101101</font></font></span>
        <span style="left: 50%; animation-delay: 4s;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">000111</font></font></span>
        <span style="left: 60%; animation-delay: 5s;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">110010</font></font></span>
        <span style="left: 70%; animation-delay: 6s;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">011100</font></font></span>
        <span style="left: 80%; animation-delay: 7s;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">101011</font></font></span>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card align-items-center">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/028/560/491/small/chatgpt-an-ai-robot-conversing-on-a-white-backgrounda-chatbot-powered-by-artificial-intelligence-photo.jpg" class="card-img-top" alt="Imagen de Usuario" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo htmlspecialchars($usuario['firstname'] . ' ' . $usuario['lastname']); ?></h5>
                        <p class="card-text"><strong>ID:</strong> <?php echo htmlspecialchars($usuario['user_id']); ?></p>
                        <p class="card-text"><strong>Nombre de Usuario:</strong> <?php echo htmlspecialchars($usuario['user_name']); ?></p>
                        <p class="card-text"><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($usuario['user_email']); ?></p>
                        <p class="card-text"><strong>Rol:</strong> <?php echo htmlspecialchars($usuario['rol']); ?></p>
                        <a href="index.php?action=editar_perfil" class="btn btn-primary">Editar Perfil</a>
                        <a href="index.php?action=inicio" class="btn btn-secondary">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
