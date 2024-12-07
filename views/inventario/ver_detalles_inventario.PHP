
<?php
require_once __DIR__ . '/../../config/session_manager.php';

if ($_SESSION['rol'] === 'Administrador') {
    require_once __DIR__ . '/../header.php';
} elseif ($_SESSION['rol'] === 'Usuario') {
    require_once __DIR__ . '/../header_usuario.php';
}
?>
<div class="container mt-4">
    <h1>Detalles del Inventario</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo htmlspecialchars($inventario['imagen']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($inventario['nombre_inventario']); ?>">
        </div>
        <div class="col-md-6">
            <h5 class="card-title"><?php echo htmlspecialchars($inventario['nombre_inventario']); ?></h5>
            <p class="card-text"><strong>Código Patrimonial:</strong> <?php echo htmlspecialchars($inventario['codigo_patrimonial']); ?></p>
            <p class="card-text"><strong>Denominación:</strong> <?php echo htmlspecialchars($inventario['denominacion']); ?></p>
            <p class="card-text"><strong>Marca:</strong> <?php echo htmlspecialchars($inventario['marca']); ?></p>
            <p class="card-text"><strong>Modelo:</strong> <?php echo htmlspecialchars($inventario['modelo']); ?></p>
            <p class="card-text"><strong>Tipo:</strong> <?php echo htmlspecialchars($inventario['tipo']); ?></p>
            <p class="card-text"><strong>Color:</strong> <?php echo htmlspecialchars($inventario['color']); ?></p>
            <p class="card-text"><strong>Serie:</strong> <?php echo htmlspecialchars($inventario['serie']); ?></p>
            <p class="card-text"><strong>Dimensiones:</strong> <?php echo htmlspecialchars($inventario['dimensiones']); ?></p>
            <p class="card-text"><strong>Valor:</strong> <?php echo htmlspecialchars($inventario['valor']); ?></p>
            <p class="card-text"><strong>Situación:</strong> <?php echo htmlspecialchars($inventario['situacion']); ?></p>
            <p class="card-text"><strong>Estado de Observación:</strong> <?php echo htmlspecialchars($inventario['estado_de_observacion']); ?></p>
            <p class="card-text"><strong>Observaciones:</strong> <?php echo htmlspecialchars($inventario['observaciones']); ?></p>
            <p class="card-text"><strong>Estudiante:</strong> <?php echo htmlspecialchars($inventario['nombre_estudiante']); ?></p>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
