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
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f67f6, #021b79);
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
        }

        .row a {
            text-decoration: none;
            color: #000000;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-weight: bold;
        }

        .container h1 {
            color: #ffd700;
        }

        .container p {
            color: #000000;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 450px;
        }

        .card-title {
            color: #000000;
            font-weight: bold;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ffd700, #f39c12);
            border: none;
            color: #000;
            font-weight: bold;
            width: 100%;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #f39c12, #ffd700);
        }

        .module-section {
            padding: 50px 0;
        }

        .module-header {
            font-size: 2rem;
            color: #343a40;
            font-weight: 600;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .badge {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0d6efd;
        }

        .rounded-circle {
            border-radius: 50% !important;
            align-content: center;
        }

        .card-text {
            font-size: 0.95rem;
            color: #000000;
        }

        .contenedor-principal {
            margin-top: 2rem;
        }

        .imagen-inventario {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .detalles-inventario {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .detalles-inventario h5 {
            margin-bottom: 1.5rem;
        }

        .detalles-inventario p {
            margin-bottom: 1rem;
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
    <div class="container mt-5 d-flex justify-content-center">
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
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title">Editar Perfil</h5>
                <form action="index.php?action=editar_perfil" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($usuario['user_id']); ?>">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo htmlspecialchars($usuario['firstname']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo htmlspecialchars($usuario['lastname']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo htmlspecialchars($usuario['user_name']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_password" class="form-label">Nueva Contraseña (dejar vacío para no cambiar)</label>
                        <input type="password" class="form-control" id="user_password" name="user_password">
                    </div>
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo htmlspecialchars($usuario['user_email']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="index.php?action=ver_perfil" class="btn btn-secondary">Regresar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


