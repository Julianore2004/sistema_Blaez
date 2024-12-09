
<?php
require_once __DIR__ . '/../../config/session_manager.php';

if ($_SESSION['rol'] === 'Administrador') {
    require_once __DIR__ . '/../header.php';
} elseif ($_SESSION['rol'] === 'Usuario') {
    require_once __DIR__ . '/../header_usuario.php';
}
?>
<div class="container mt-4">
<button class="btn btn-primary mt-3" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i>Regresar</button>
    <h1>Inventarios de Semestre I y II</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
        <?php foreach ($inventarios as $inventario): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($inventario['imagen']); ?>" class="card-img-top w-100" style="height: 200px; object-fit: cover;" alt="<?php echo htmlspecialchars($inventario['nombre_inventario']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($inventario['nombre_inventario']); ?></h5>
                        <p class="card-text"><small class="text-muted">Estudiante: <?php echo htmlspecialchars($inventario['nombre_estudiante']); ?></small></p>
                        <a href="index.php?action=ver_detalles_inventario&id=<?php echo $inventario['id_inventario']; ?>" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
