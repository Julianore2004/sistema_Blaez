<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Registrar Módulo</h1>
    <form action="index.php?action=registrar_modulo" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" name="descripcion" required></textarea>
        </div>
        <div class="mb-3">
            <label for="id_estudiante" class="form-label">Estudiante:</label>
            <select class="form-select" name="id_estudiante" required>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <option value="<?php echo $estudiante['id']; ?>"><?php echo $estudiante['nombrecompleto']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">URL de la Imagen:</label>
            <input type="url" class="form-control" name="imagen" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
