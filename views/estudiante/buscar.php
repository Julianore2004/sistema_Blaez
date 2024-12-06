<table class="table table-bordered">
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
