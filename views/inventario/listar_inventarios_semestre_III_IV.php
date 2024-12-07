<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Inventarios de Semestre III y IV</h1>
    <div class="row">
        <?php foreach ($inventarios as $inventario): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($inventario['imagen']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($inventario['nombre_inventario']); ?>">
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