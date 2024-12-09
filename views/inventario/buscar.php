<div id="resultadosBusqueda">
<div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <button class="btn btn-primary" onclick="prevPage()" id="prevButton" disabled>Anterior</button>
            <button class="btn btn-primary" onclick="nextPage()" id="nextButton">Siguiente</button>
        </div>
        <div class="text-white">
            <span id="pageInfo"></span>
        </div>
    </div>
    <div class="table-responsive-top-scroll">
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>N°</th>
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
            <th>Estudiante</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="cuerpoInventario" class="bg-white">
        <?php
        $contador = 1;
        foreach ($inventarios as $inventario): ?>
            <tr>
                <td><?php echo $contador; ?></td>
                <td style="display:none;"><?php echo $inventario['id']; ?></td>
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
                <td><?php echo $inventario['nombrecompleto']; ?></td>
                <td><?php echo $inventario['nombreCategoria']; ?></td>
                <td>
                    <a href="index.php?action=editar&id=<?php echo $inventario['id']; ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="index.php?action=eliminar&id=<?php echo $inventario['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </a>
                </td>
            </tr>
            <?php $contador++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>