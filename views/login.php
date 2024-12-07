
<?php
require_once __DIR__ . '/../config/session_manager.php';



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Inicio de Sesión</div>
                    <div class="card-body">
                        <form action="index.php?action=login" method="POST">
                            <div class="mb-3">
                                <label for="user_name" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="user_name" name="user_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="user_password" name="user_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
