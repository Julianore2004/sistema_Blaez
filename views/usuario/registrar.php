<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Registrar Usuario</h1>
    <form action="index.php?action=registrar_usuario" method="post">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="firstname" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido:</label>
            <input type="text" class="form-control" name="lastname" required>
        </div>
        <div class="mb-3">
            <label for="user_name" class="form-label">Nombre de Usuario:</label>
            <input type="text" class="form-control" name="user_name" required>
        </div>
        <div class="mb-3">
            <label for="user_password" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="user_password" required>
        </div>
        <div class="mb-3">
            <label for="user_email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="user_email" required>
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol:</label>
            <select class="form-select" name="rol" required>
                <option value="Usuario">Usuario</option>
                <option value="Administrador">Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
