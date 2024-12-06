<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Código Patrimonial</th>
        <th>Denominación</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Tipo</th>
        <th>Color</th>
        <th>Serie</th>
        <th>Dimensiones</th>
        <th>Valor</th>
        <th>Situación</th>
        <th>Estado de Observación</th>
        <th>Observaciones</th>
        <th>Imagen</th>
        <th>Estudiante</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($inventarios as $inventario): ?>
        <tr>
            <td><?php echo $inventario['id']; ?></td>
            <td><?php echo $inventario['nombre']; ?></td>
            <td><?php echo $inventario['codigo_patrimonial']; ?></td>
            <td><?php echo $inventario['denominacion']; ?></td>
            <td><?php echo $inventario['marca']; ?></td>
            <td><?php echo $inventario['modelo']; ?></td>
            <td><?php echo $inventario['tipo']; ?></td>
            <td><?php echo $inventario['color']; ?></td>
            <td><?php echo $inventario['serie']; ?></td>
            <td><?php echo $inventario['dimensiones']; ?></td>
            <td><?php echo $inventario['valor']; ?></td>
            <td><?php echo $inventario['situacion']; ?></td>
            <td><?php echo $inventario['estado_de_observacion']; ?></td>
            <td><?php echo $inventario['observaciones']; ?></td>
            <td><?php echo $inventario['imagen']; ?></td>
            <td><?php echo $inventario['nombrecompleto']; ?></td>
            <td><?php echo $inventario['nombreCategoria']; ?></td>
            <td>
                <a href="index.php?action=editar&id=<?php echo $inventario['id']; ?>" class="btn btn-warning">Editar</a>
                <a href="index.php?action=eliminar&id=<?php echo $inventario['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
