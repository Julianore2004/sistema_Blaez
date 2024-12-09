<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Listar Estudiantes</h1>
    <a href="index.php?action=registrar_estudiante" class="btn btn-primary mb-3">Registrar Nuevo Estudiante</a>
    <input type="text" id="buscarEstudiante" class="form-control mb-3" placeholder="Buscar por nombre de estudiante">
    <div class="mb-3">
        <label for="semestre" class="form-label">Filtrar por Semestre:</label>
        <select class="form-select" id="semestre" onchange="filtrarEstudiantes()">
            <option value="">Seleccionar Semestre</option>
            <option value="Semestre I">Semestre I</option>
            <option value="Semestre II">Semestre II</option>
            <option value="Semestre III">Semestre III</option>
            <option value="Semestre IV">Semestre IV</option>
            <option value="Semestre V">Semestre V</option>
            <option value="Semestre VI">Semestre VI</option>
        </select>
    </div>
    <div id="resultadosBusqueda">
        <div id="resultadosFiltrados">
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
                    foreach ($estudiantes as $estudiante): ?>
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
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>

<script>
    function filtrarEstudiantes() {
        var semestre = document.getElementById('semestre').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php?action=filtrar_por_semestre', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('resultadosFiltrados').innerHTML = xhr.responseText;
                updatePagination();
            }
        };
        xhr.send('semestre=' + semestre);
    }

    document.getElementById('buscarEstudiante').addEventListener('input', function() {
        var nombre = this.value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?action=buscar_estudiante&nombre=' + encodeURIComponent(nombre), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('resultadosBusqueda').innerHTML = xhr.responseText;
                updatePagination();
            }
        };
        xhr.send();
    });

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
