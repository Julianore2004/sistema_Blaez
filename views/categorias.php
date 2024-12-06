<?php 
require_once "./controllers/CategoriaController.php";

// Obtener las categorías
$categorias = CategoriaController::listarCategorias();
?>

<div class="container mt-5">
    <div class="text-end mb-3">
        <a class="btn btn-primary" href="<?php echo BD_URL ?>registrar-categoria">Agregar Nueva Categoría</a>
    </div>
    <h2>Lista de Categorías</h2>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= $categoria['id'] ?></td>
                    <td><?= $categoria['nombreCategoria'] ?></td>
                    <td><?= $categoria['descripcion_categoria'] ?></td>
                    <td><?= date("d/m/Y H:i:s", strtotime($categoria['date_added'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
