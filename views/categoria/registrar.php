<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Registrar Categoría</h1>
    <form action="index.php?action=registrar_categoria" method="post">
        <div class="mb-3">
            <label for="nombreCategoria" class="form-label">Nombre de Categoría:</label>
            <input type="text" class="form-control" name="nombreCategoria" required>
        </div>
        <div class="mb-3">
            <label for="descripcion_categoria" class="form-label">Descripción:</label>
            <input type="text" class="form-control" name="descripcion_categoria" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>
