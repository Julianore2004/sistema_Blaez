<?php
       require_once "./controllers/ModuloController.php";
// Obtener los módulos desde el controlador
$modulos = ModuloController::listarModulos();
?>

<div class="container mt-5">
<div class="text-end mb-3">
<a class="btn btn-primary" href="<?php echo BD_URL ?>registrar-modulo">Agregar Modulo</a>
      
</div>

    <h2 class="mb-4">Listado de Módulos</h2>
    
     <table class="table table-striped">
    <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Inventario</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <?php while ($row = $modulos->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['descripcion'] ?></td>
                    <td><?= $row['inventario'] ?: 'Sin asignar' ?></td>
                    <td>
                        <img src="<?= $row['imagen'] ?>" alt="Imagen del módulo" style="width: 100px; height: auto;">
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

