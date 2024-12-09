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
                <th>Nombre de Categoría</th>
                <th>Descripción</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaCategorias" class="bg-white">
            <?php
            $contador = 1;
            foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?php echo $contador; ?></td>
                    <td style="display:none;"><?php echo $categoria['id']; ?></td>
                    <td><?php echo $categoria['nombreCategoria']; ?></td>
                    <td><?php echo $categoria['descripcion_categoria']; ?></td>
                    <td><?php echo $categoria['date_added']; ?></td>
                    <td>
                        <a href="index.php?action=editar_categoria&id=<?php echo $categoria['id']; ?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="index.php?action=eliminar_categoria&id=<?php echo $categoria['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
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