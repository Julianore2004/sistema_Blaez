<?php
session_start();
if ($_SESSION['rol'] === 'administrador') {
    require_once __DIR__ . '/header_admin.php';
} else {
    require_once __DIR__ . '/header_user.php';
}
?>
<div class="container mt-4">
    <h1>Perfil de Usuario</h1>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['firstname']); ?></p>
    <p><strong>Apellido:</strong> <?php echo htmlspecialchars($usuario['lastname']); ?></p>
    <p><strong>Nombre de Usuario:</strong> <?php echo htmlspecialchars($usuario['user_name']); ?></p>
    <a href="index.php?action=editar_perfil" class="btn btn-primary">Editar Perfil</a>
</div>
<?php require_once __DIR__ . '/footer.php'; ?>
