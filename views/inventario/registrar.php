<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Registrar Inventario</h1>
    <form action="index.php?action=registrar" method="post">
        <div class="mb-3">
            <label for="codigo_patrimonial" class="form-label">Código Patrimonial:</label>
            <input type="text" class="form-control" name="codigo_patrimonial" required>
        </div>
        <div class="mb-3">
            <label for="denominacion" class="form-label">Denominación:</label>
            <input type="text" class="form-control" name="denominacion" required>
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca:</label>
            <input type="text" class="form-control" name="marca" required>
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" class="form-control" name="modelo" required>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo:</label>
            <input type="text" class="form-control" name="tipo" required>
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color:</label>
            <input type="text" class="form-control" name="color" required>
        </div>
        <div class="mb-3">
            <label for="serie" class="form-label">Serie:</label>
            <input type="text" class="form-control" name="serie" required>
        </div>
        <div class="mb-3">
            <label for="dimensiones" class="form-label">Dimensiones:</label>
            <input type="text" class="form-control" name="dimensiones" required>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <input type="text" class="form-control" name="valor" required>
        </div>
        <div class="mb-3">
            <label for="situacion" class="form-label">Situación:</label>
            <input type="text" class="form-control" name="situacion" required>
        </div>
        <div class="mb-3">
            <label for="estado_de_observacion" class="form-label">Estado de Observación:</label>
            <input type="text" class="form-control" name="estado_de_observacion" required>
        </div>
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones:</label>
            <input type="text" class="form-control" name="observaciones" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen:</label>
            <input type="text" class="form-control" name="imagen" required>
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
            <label for="id_categoria" class="form-label">Categoría:</label>
            <select class="form-select" name="id_categoria" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombreCategoria']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
