<?php
session_start();
if ($_SESSION['rol'] === 'administrador') {
    require_once __DIR__ . '/header_admin.php';
} else {
    require_once __DIR__ . '/header_user.php';
}
?>
<div class="container mt-4">
    <h1>Editar Perfil</h1>
    <form action="index.php?action=guardar_perfil" method="POST">
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
            <label for="user_password_hash" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="user_password_hash" name="user_password_hash" placeholder="Ingrese su nueva contraseña">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
<?php require_once __DIR__ . '/footer.php'; ?>
