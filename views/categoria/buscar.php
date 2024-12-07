<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nombre de Categoría</th>
        <th>Descripción</th>
        <th>Fecha de Creación</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($categorias as $categoria): ?>
        <tr>
            <td><?php echo $categoria['id']; ?></td>
            <td><?php echo $categoria['nombreCategoria']; ?></td>
            <td><?php echo $categoria['descripcion_categoria']; ?></td>
            <td><?php echo $categoria['date_added']; ?></td>
            <td>
                <a href="index.php?action=editar_categoria&id=<?php echo $categoria['id']; ?>" class="btn btn-warning">Editar</a>
                <a href="index.php?action=eliminar_categoria&id=<?php echo $categoria['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
