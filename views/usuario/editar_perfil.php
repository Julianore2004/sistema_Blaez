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
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
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
