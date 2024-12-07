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
        <table class="table table-bordered"  id="tablaEstudiantes">
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Programa de Estudios</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($estudiantes as $estudiante): ?>
                <tr>
                    <td><?php echo $estudiante['id']; ?></td>
                    <td><?php echo $estudiante['nombrecompleto']; ?></td>
                    <td><?php echo $estudiante['programa_de_estudios']; ?></td>
                    <td><?php echo $estudiante['semestre']; ?></td>
                    <td>
                        <a href="index.php?action=editar_estudiante&id=<?php echo $estudiante['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="index.php?action=eliminar_estudiante&id=<?php echo $estudiante['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
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
            }
        };
        xhr.send('semestre=' + semestre);
    }
</script>
<script>
document.getElementById('buscarEstudiante').addEventListener('input', function() {
    var nombre = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=buscar_estudiante&nombre=' + encodeURIComponent(nombre), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('resultadosBusqueda').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
});
</script>
