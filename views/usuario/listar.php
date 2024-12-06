<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Listar Usuarios</h1>
    <a href="index.php?action=registrar_usuario" class="btn btn-primary mb-3">Registrar Nuevo Usuario</a>
    <input type="text" id="buscarUsuario" class="form-control mb-3" placeholder="Buscar por usuario">
    <div id="resultadosBusqueda">
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
        }
    };
    xhr.send();
});
</script>
