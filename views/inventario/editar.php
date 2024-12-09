<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
<button class="btn btn-primary mt-3" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i>Regresar</button>
    <h1>Editar Inventario</h1>
    <form action="index.php?action=editar" method="post">
        <input type="hidden" name="id" value="<?php echo $inventario['id']; ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $inventario['nombre']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="codigo_patrimonial" class="form-label">Código Patrimonial:</label>
            <input type="text" class="form-control" name="codigo_patrimonial" value="<?php echo $inventario['codigo_patrimonial']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="denominacion" class="form-label">Denominación:</label>
            <input type="text" class="form-control" name="denominacion" value="<?php echo $inventario['denominacion']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca:</label>
            <input type="text" class="form-control" name="marca" value="<?php echo $inventario['marca']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" class="form-control" name="modelo" value="<?php echo $inventario['modelo']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo:</label>
            <input type="text" class="form-control" name="tipo" value="<?php echo $inventario['tipo']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color:</label>
            <input type="text" class="form-control" name="color" value="<?php echo $inventario['color']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="serie" class="form-label">Serie:</label>
            <input type="text" class="form-control" name="serie" value="<?php echo $inventario['serie']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="dimensiones" class="form-label">Dimensiones:</label>
            <input type="text" class="form-control" name="dimensiones" value="<?php echo $inventario['dimensiones']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <input type="text" class="form-control" name="valor" value="<?php echo $inventario['valor']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="situacion" class="form-label">Situación:</label>
            <input type="text" class="form-control" name="situacion" value="<?php echo $inventario['situacion']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="estado_de_observacion" class="form-label">Estado de Observación:</label>
            <input type="text" class="form-control" name="estado_de_observacion" value="<?php echo $inventario['estado_de_observacion']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones:</label>
            <input type="text" class="form-control" name="observaciones" value="<?php echo $inventario['observaciones']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen:</label>
            <input type="text" class="form-control" name="imagen" value="<?php echo $inventario['imagen']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_estudiante" class="form-label">Estudiante:</label>
            <select class="form-select" name="id_estudiante" required>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <option value="<?php echo $estudiante['id']; ?>" <?php if ($estudiante['id'] == $inventario['id_estudiante']) echo 'selected'; ?>><?php echo $estudiante['nombrecompleto']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría:</label>
            <select class="form-select" name="id_categoria" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?php echo $categoria['id']; ?>" <?php if ($categoria['id'] == $inventario['id_categoria']) echo 'selected'; ?>><?php echo $categoria['nombreCategoria']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
