
<?php
require_once "./controllers/UserController.php";

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = [
        "firstname" => $_POST["firstname"],
        "lastname" => $_POST["lastname"],
        "user_name" => $_POST["user_name"],
        "user_password_hash" => password_hash($_POST["user_password_hash"], PASSWORD_BCRYPT), // Hash de la contraseña
        "user_email" => $_POST["user_email"],
        "rol" => $_POST["rol"],
    ];

    $mensaje = UserController::registrarUsuario($datos);
    echo "<script>alert('$mensaje');</script>";
}
?>
<form action="" method="POST" class="container mt-4">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Registro de Usuario</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="firstname" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="mb-3">
                <label for="user_name" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="user_name" name="user_name" required>
            </div>
            <div class="mb-3">
                <label for="user_password_hash" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="user_password_hash" name="user_password_hash" required>
            </div>
            <div class="mb-3">
                <label for="user_email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="user_email" name="user_email" required>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" id="rol" name="rol">
                    <option value="usuario">Encargado</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-dark">Registrar Usuario</button>
        </div>
    </div>
</form>
