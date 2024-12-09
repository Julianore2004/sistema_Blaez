<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Listar Usuarios</h1>
    <a href="index.php?action=registrar_usuario" class="btn btn-primary mb-3">Registrar Nuevo Usuario</a>
    <input type="text" id="buscarUsuario" class="form-control mb-3" placeholder="Buscar por usuario">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <button class="btn btn-secondary" onclick="prevPage()" id="prevButton" disabled>Anterior</button>
            <button class="btn btn-secondary" onclick="nextPage()" id="nextButton">Siguiente</button>
        </div>
        <div class="text-white">
            <span id="pageInfo"></span>
        </div>
    </div>
    <div id="resultadosBusqueda">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nombre de Usuario</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="cuerpoUsuarios" class="bg-white">
                <?php
                $contador = 1;
                foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $contador; ?></td>
                        <td style="display:none;"><?php echo $usuario['user_id']; ?></td>
                        <td><?php echo $usuario['firstname']; ?></td>
                        <td><?php echo $usuario['lastname']; ?></td>
                        <td><?php echo $usuario['user_name']; ?></td>
                        <td><?php echo $usuario['user_email']; ?></td>
                        <td><?php echo $usuario['rol']; ?></td>
                        <td>
                            <a href="index.php?action=editar_usuario&id=<?php echo $usuario['user_id']; ?>" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="index.php?action=eliminar_usuario&id=<?php echo $usuario['user_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
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
    document.getElementById('buscarUsuario').addEventListener('input', function() {
        var nombre = this.value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?action=buscar_usuario&nombre=' + encodeURIComponent(nombre), true);
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
        const rows = document.querySelectorAll('#cuerpoUsuarios tr');
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
        const rows = document.querySelectorAll('#cuerpoUsuarios tr');
        const totalPages = Math.ceil(rows.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            updatePagination();
        }
    }

    // Inicializar la paginación
    updatePagination();
</script>

