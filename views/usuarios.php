<?php
require_once "./controllers/UserController.php";

// Obtener los usuarios desde el controlador
$usuarios = UserController::listarUsuarios();
?>



<div class="container mt-5">
    <div class="text-end mb-3">
        <a class="btn btn-primary" href="<?php echo BD_URL ?>registrar-usuarios">Agregar Usuario</a>
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
            <?php while ($row = $usuarios->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= htmlspecialchars($row['firstname']) ?></td>
                    <td><?= htmlspecialchars($row['lastname']) ?></td>
                    <td><?= htmlspecialchars($row['user_name']) ?></td>
                    <td><?= htmlspecialchars($row['user_email']) ?></td>
                    <td><?= htmlspecialchars($row['rol']) ?></td>
                    <td><?= htmlspecialchars($row['date_added']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>