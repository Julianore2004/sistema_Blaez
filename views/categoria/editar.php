<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
<button class="btn btn-primary mt-3" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i>Regresar</button>
    <h1>Editar Categoría</h1>
    <form action="index.php?action=editar_categoria" method="post">
        <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">
        <div class="mb-3">
            <label for="nombreCategoria" class="form-label">Nombre de Categoría:</label>
            <input type="text" class="form-control" name="nombreCategoria" value="<?php echo $categoria['nombreCategoria']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion_categoria" class="form-label">Descripción:</label>
            <input type="text" class="form-control" name="descripcion_categoria" value="<?php echo $categoria['descripcion_categoria']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
