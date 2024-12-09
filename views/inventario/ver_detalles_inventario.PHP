<?php
require_once __DIR__ . '/../../config/session_manager.php';

if ($_SESSION['rol'] === 'Administrador') {
    require_once __DIR__ . '/../header.php';
} elseif ($_SESSION['rol'] === 'Usuario') {
    require_once __DIR__ . '/../header_usuario.php';
}
?>
<style>
       /* Asegúrate de que las imágenes sean responsivas */
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
    
    /* Define un tamaño fijo para las imágenes dentro del contenedor */
    .imagen-inventario {
        width: 100%; /* O el tamaño que desees */
        height: 530px; /* O el tamaño que desees */
        object-fit: cover; /* Asegura que la imagen cubra el área sin distorsionarse */
    }
    
    /* Opcional: Asegúrate de que el contenedor tenga un tamaño fijo */
    .col-md-6 {
        padding: 10px; /* O el padding que desees */
    }
    
</style>
<div class="container contenedor-principal">
<button class="btn btn-primary mt-3" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i>Regresar</button>
        <h1>Detalle del Inventario</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo htmlspecialchars($inventario['imagen']); ?>" class="img-fluid imagen-inventario" alt="<?php echo htmlspecialchars($inventario['nombre_inventario']); ?>">
            </div>
            <div class="col-md-6 detalles-inventario mb-4">
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
