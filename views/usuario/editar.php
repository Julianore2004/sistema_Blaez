<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Editar Usuario</h1>
    <form action="index.php?action=editar_usuario" method="post">
        <input type="hidden" name="user_id" value="<?php echo $usuario['user_id']; ?>">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="firstname" value="<?php echo $usuario['firstname']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido:</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo $usuario['lastname']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="user_name" class="form-label">Nombre de Usuario:</label>
            <input type="text" class="form-control" name="user_name" value="<?php echo $usuario['user_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="user_password" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="user_password" required>
        </div>
        <div class="mb-3">
            <label for="user_email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="user_email" value="<?php echo $usuario['user_email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol:</label>
            <select class="form-select" name="rol" required>
                <option value="Usuario" <?php if ($usuario['rol'] == 'Usuario') echo 'selected'; ?>>Usuario</option>
                <option value="Administrador" <?php if ($usuario['rol'] == 'Administrador') echo 'selected'; ?>>Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
