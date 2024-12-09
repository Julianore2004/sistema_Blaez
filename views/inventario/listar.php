<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Listar Inventario</h1>
    <a href="index.php?action=registrar" class="btn btn-primary mb-3">Registrar Nuevo</a>
    <input type="text" id="buscarInventario" class="form-control mb-3" placeholder="Buscar por nombre del objeto">
    <div class="mb-3">
        <label for="categoria" class="form-label">Filtrar por Categoría:</label>
        <select class="form-select" id="categoria" onchange="filtrarInventario()">
            <option value="">Seleccionar Categoría</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombreCategoria']; ?></option>
            <?php endforeach; ?>
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
    </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>

<script>
    function filtrarInventario() {
        var categoriaId = document.getElementById('categoria').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php?action=filtrar_por_categoria', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('resultadosFiltrados').innerHTML = xhr.responseText;
                updatePagination();
            }
        };
        xhr.send('id_categoria=' + categoriaId);
    }

    document.getElementById('buscarInventario').addEventListener('input', function() {
        var nombre = this.value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?action=buscar_inventario&nombre=' + encodeURIComponent(nombre), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('resultadosBusqueda').innerHTML = xhr.responseText;
                updatePagination();
            }
        };
        xhr.send();
    });

    let currentPage = 1;
    const rowsPerPage = 5;

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
<style>
    .table-responsive-top-scroll {
        overflow-x: auto;
        display: block;
        width: 100%;
    }

    .table-responsive-top-scroll::-webkit-scrollbar {
        height: 8px;
    }

    .table-responsive-top-scroll::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .table-responsive-top-scroll::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .table-responsive-top-scroll::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .table-responsive-top-scroll::-webkit-scrollbar-track:hover {
        background: #ddd;
    }
</style>


