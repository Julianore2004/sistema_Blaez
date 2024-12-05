
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
            <?php while ($row = $inventarios->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['codigo_patrimonial'] ?></td>
                    <td><?= $row['denominacion'] ?></td>
                    <td><?= $row['marca'] ?></td>
                    <td><?= $row['modelo'] ?></td>
                    <td><?= $row['tipo'] ?></td>
                    <td><?= $row['color'] ?></td>
                    <td><?= $row['serie'] ?></td>
                    <td><?= $row['dimensiones'] ?></td>
                    <td><?= $row['valor'] ?></td>
                    <td><?= $row['situacion'] ?></td>
                    <td><?= $row['estado_de_observacion'] ?></td>
                    <td><?= $row['observaciones'] ?></td>
                    <td><?= $row['estudiante'] ?></td>
                    <td><?= $row['categoria'] ?></td>
                    <td>
                        <img src="<?= $row['imagen'] ?>" alt="Imagen del producto" style="width: 100px;">
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

