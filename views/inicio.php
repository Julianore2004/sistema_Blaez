<?php
require_once __DIR__ . '/../config/session_manager.php';

if ($_SESSION['rol'] === 'Administrador') {
    require_once __DIR__ . '/header.php';
} elseif ($_SESSION['rol'] === 'Usuario') {
    require_once __DIR__ . '/header_usuario.php';
}
// Inicializar el contador
$contador = 1;
?>
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
                <img src="<?php echo htmlspecialchars($modulo['imagen']); ?>" class="card-img-top w-100" style="height: 200px; object-fit: cover;" alt="<?php echo htmlspecialchars($modulo['nombre']); ?>">
                    <div class="card-body text-center">
                        <div class="position-relative mb-3">
                            <span class="badge rounded-circle position-absolute top-0 start-50 translate-middle text-white bg-primary">
                                <?php echo $contador; ?>
                            </span>
                        </div>
                        <h5 class="mt-5 card-title"><?php echo htmlspecialchars($modulo['nombre']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($modulo['descripcion']); ?></p>
                        <?php if ($modulo['nombre'] === 'Módulo I'): ?>
                            <a href="index.php?action=listar_inventarios_semestre_I_II" class="btn btn-primary">Ver Inventarios</a>
                        <?php elseif ($modulo['nombre'] === 'Módulo II'): ?>
                            <a href="index.php?action=listar_inventarios_semestre_III_IV" class="btn btn-primary">Ver Inventarios</a>
                        <?php elseif ($modulo['nombre'] === 'Módulo III'): ?>
                            <a href="index.php?action=listar_inventarios_semestre_V_VI" class="btn btn-primary">Ver Inventarios</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
            // Incrementar el contador
            $contador++;
            ?>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once __DIR__ . '/footer.php'; ?>