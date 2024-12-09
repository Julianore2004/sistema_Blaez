<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Listar Categorías</h1>
    <a href="index.php?action=registrar_categoria" class="btn btn-primary mb-3">Registrar Nueva Categoría</a>
    <input type="text" id="buscarCategoria" class="form-control mb-3" placeholder="Buscar por nombre de categoría">
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
<?php require_once __DIR__ . '/../footer.php'; ?>

<script>
    document.getElementById('buscarCategoria').addEventListener('input', function() {
        var nombre = this.value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?action=buscar_categoria&nombre=' + encodeURIComponent(nombre), true);
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
        const rows = document.querySelectorAll('#tablaCategorias tr');
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
        const rows = document.querySelectorAll('#tablaCategorias tr');
        const totalPages = Math.ceil(rows.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            updatePagination();
        }
    }

    // Inicializar la paginación
    updatePagination();
</script>
