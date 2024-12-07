<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Nombre de Usuario</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['user_id']; ?></td>
            <td><?php echo $usuario['firstname']; ?></td>
            <td><?php echo $usuario['lastname']; ?></td>
            <td><?php echo $usuario['user_name']; ?></td>
            <td><?php echo $usuario['user_email']; ?></td>
            <td><?php echo $usuario['rol']; ?></td>
            <td>
                <a href="index.php?action=editar_usuario&id=<?php echo $usuario['user_id']; ?>" class="btn btn-warning">Editar</a>
                <a href="index.php?action=eliminar_usuario&id=<?php echo $usuario['user_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

