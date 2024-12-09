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