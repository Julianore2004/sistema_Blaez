<?php if (!empty($inventariosFiltrados)): ?>
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
            foreach ($inventariosFiltrados as $inventario): ?>
                <tr>
                    <td><?php echo $contador; ?></td>
                    <td style="display:none;"><?php echo $inventario['id']; ?></td>
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

<?php else: ?>
    <p>No se encontraron resultados para la categoría seleccionada.</p>
<?php endif; ?>
</div>
<script>
    let currentPage = 1;
    const rowsPerPage = 10;

    function updatePagination() {
        const rows = document.querySelectorAll('#cuerpoInventario tr');
        const totalPages = Math.ceil(rows.length / rowsPerPage);
        document.getElementById('pageInfo').innerText = `Página ${currentPage} de ${totalPages}`;

        rows.forEach((row, index) => {
            if (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('prevButton').disabled = currentPage === 1;
        document.getElementById('nextButton').disabled = currentPage === totalPages;
    }

    function prevPage() {
        if (currentPage > 1) {
            currentPage--;
            updatePagination();
        }
    }

    function nextPage() {
        const rows = document.querySelectorAll('#cuerpoInventario tr');
        const totalPages = Math.ceil(rows.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            updatePagination();
        }
    }

    // Inicializar la paginación
    updatePagination();
</script>


