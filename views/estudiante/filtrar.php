<?php if (!empty($estudiantesFiltrados)): ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <button class="btn btn-primary" onclick="prevPage()" id="prevButton" disabled>Anterior</button>
            <button class="btn btn-primary" onclick="nextPage()" id="nextButton">Siguiente</button>
        </div>
        <div class="text-white">
            <span id="pageInfo"></span>
        </div>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>N°</th>
                <th>Nombre Completo</th>
                <th>Programa de Estudios</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="cuerpoEstudiantes" class="bg-white">
            <?php
            $contador = 1;
            foreach ($estudiantesFiltrados as $estudiante): ?>
                <tr>
                    <td><?php echo $contador; ?></td>
                    <td style="display:none;"><?php echo $estudiante['id']; ?></td>
                    <td><?php echo $estudiante['nombrecompleto']; ?></td>
                    <td><?php echo $estudiante['programa_de_estudios']; ?></td>
                    <td><?php echo $estudiante['semestre']; ?></td>
                    <td>
                        <a href="index.php?action=editar_estudiante&id=<?php echo $estudiante['id']; ?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="index.php?action=eliminar_estudiante&id=<?php echo $estudiante['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?');">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </a>
                    </td>
                </tr>
                <?php $contador++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron resultados para el semestre seleccionado.</p>
<?php endif; ?>

<script>
    let currentPage = 1;
    const rowsPerPage = 10;

    function updatePagination() {
        const rows = document.querySelectorAll('#cuerpoEstudiantes tr');
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
        const rows = document.querySelectorAll('#cuerpoEstudiantes tr');
        const totalPages = Math.ceil(rows.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            updatePagination();
        }
    }

    // Inicializar la paginación
    updatePagination();
</script>

