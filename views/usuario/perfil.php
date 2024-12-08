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
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title">Perfil de Usuario</h5>
                <p class="card-text"><strong>ID:</strong> <?php echo htmlspecialchars($usuario['user_id']); ?></p>
                <p class="card-text"><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['firstname']); ?></p>
                <p class="card-text"><strong>Apellido:</strong> <?php echo htmlspecialchars($usuario['lastname']); ?></p>
                <p class="card-text"><strong>Nombre de Usuario:</strong> <?php echo htmlspecialchars($usuario['user_name']); ?></p>
                <p class="card-text"><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($usuario['user_email']); ?></p>
                <a href="index.php?action=editar_perfil" class="btn btn-primary">Editar Perfil</a>
                <a href="index.php?action=inicio" class="btn btn-secondary">Regresar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
