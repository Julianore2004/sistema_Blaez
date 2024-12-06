<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Editar Módulo</h1>
    <form action="index.php?action=editar_modulo" method="post">
        <input type="hidden" name="id" value="<?php echo $modulo['id']; ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $modulo['nombre']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" name="descripcion" required><?php echo $modulo['descripcion']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="id_inventario" class="form-label">Inventario:</label>
            <select class="form-select" name="id_inventario" required>
                <?php foreach ($inventarios as $inventario): ?>
                    <option value="<?php echo $inventario['id']; ?>" <?php if ($inventario['id'] == $modulo['id_inventario']) echo 'selected'; ?>><?php echo $inventario['denominacion']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">URL de la Imagen:</label>
            <input type="url" class="form-control" name="imagen" value="<?php echo $modulo['imagen']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
