<?php require_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1 class="text-center">Bienvenido al Sistema de Inventario</h1>
    <div class="row mt-5">
        <?php
        // Incluir el modelo para listar los módulos
        require_once __DIR__ . '/../model/ModuloModel.php';
        $moduloModel = new ModuloModel();
        $modulos = $moduloModel->listar();

        foreach ($modulos as $modulo): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($modulo['imagen']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($modulo['nombre']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($modulo['nombre']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($modulo['descripcion']); ?></p>
                        <p class="card-text"><small class="text-muted">Semestre: <?php echo htmlspecialchars($modulo['semestre']); ?></small></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once __DIR__ . '/footer.php'; ?>
