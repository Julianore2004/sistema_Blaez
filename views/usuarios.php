<?php
// Listar usuarios (listado-usuarios.php)
require_once "./controllers/UserController.php";

// Obtener los usuarios desde el controlador
$usuarios = UserController::listarUsuarios();
?>

<div class="container mt-5">
    <div class="text-end mb-3">
    <a class="btn btn-primary" href="<?php echo BD_URL ?>registrar-usuarios">Agregar Módulo</a>
    </div>

    <h2 class="mb-4">Listado de Usuarios</h2>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Nombre de Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['user_id']) ?></td>
                    <td><?= htmlspecialchars($usuario['firstname']) ?></td>
                    <td><?= htmlspecialchars($usuario['lastname']) ?></td>
                    <td><?= htmlspecialchars($usuario['user_name']) ?></td>
                    <td><?= htmlspecialchars($usuario['user_email']) ?></td>
                    <td><?= htmlspecialchars($usuario['rol']) ?></td>
                    <td><?= date("d/m/Y H:i:s", strtotime($usuario['date_added'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
