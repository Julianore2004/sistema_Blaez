<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Listar Módulos</h1>
    <a href="index.php?action=registrar_modulo" class="btn btn-primary mb-3">Registrar Nuevo Módulo</a>
    <div class="row">
        <?php foreach ($modulos as $modulo): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $modulo['imagen']; ?>" class="card-img-top" alt="<?php echo $modulo['nombre']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $modulo['nombre']; ?></h5>
                        <p class="card-text"><?php echo $modulo['descripcion']; ?></p>
                        <p class="card-text"><small class="text-muted">Semestre: <?php echo $modulo['semestre']; ?></small></p>
                        <a href="index.php?action=editar_modulo&id=<?php echo $modulo['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="index.php?action=eliminar_modulo&id=<?php echo $modulo['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este módulo?');">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
