<?php
require_once "./controllers/InventarioController.php";
// Controlador para obtener los inventarios
$inventarios = InventarioController::listarInventarios();
?>

<div class="container mt-5">
    <div class="text-end mb-3">
        <a class="btn btn-primary" href="<?php echo BD_URL ?>registrar-inventario">Agregar Nuevo Inventario</a>

    </div>

    <h2 class="mb-4">Listado de Inventarios</h2>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
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
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <?php foreach ($inventarios as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['codigo_patrimonial']) ?></td>
                    <td><?= htmlspecialchars($row['denominacion']) ?></td>
                    <td><?= htmlspecialchars($row['marca']) ?></td>
                    <td><?= htmlspecialchars($row['modelo']) ?></td>
                    <td><?= htmlspecialchars($row['tipo']) ?></td>
                    <td><?= htmlspecialchars($row['color']) ?></td>
                    <td><?= htmlspecialchars($row['serie']) ?></td>
                    <td><?= htmlspecialchars($row['dimensiones']) ?></td>
                    <td><?= htmlspecialchars($row['valor']) ?></td>
                    <td><?= htmlspecialchars($row['situacion']) ?></td>
                    <td><?= htmlspecialchars($row['estado_de_observacion']) ?></td>
                    <td><?= htmlspecialchars($row['observaciones']) ?></td>
                    <td><?= htmlspecialchars($row['estudiante']) ?></td>
                    <td><?= htmlspecialchars($row['categoria']) ?></td>
                    <td>
                        <img src="<?= htmlspecialchars($row['imagen']) ?>" alt="Imagen del producto" style="width: 100px;">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>