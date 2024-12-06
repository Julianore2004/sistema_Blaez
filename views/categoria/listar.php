<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Listar Categorías</h1>
    <a href="index.php?action=registrar_categoria" class="btn btn-primary mb-3">Registrar Nueva Categoría</a>
    <input type="text" id="buscarCategoria" class="form-control mb-3" placeholder="Buscar por nombre de categoría">
    <div id="resultadosBusqueda">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nombre de Categoría</th>
                <th>Descripción</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?php echo $categoria['id']; ?></td>
                    <td><?php echo $categoria['nombreCategoria']; ?></td>
                    <td><?php echo $categoria['descripcion_categoria']; ?></td>
                    <td><?php echo $categoria['date_added']; ?></td>
                    <td>
                        <a href="index.php?action=editar_categoria&id=<?php echo $categoria['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="index.php?action=eliminar_categoria&id=<?php echo $categoria['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>

<script>
document.getElementById('buscarCategoria').addEventListener('input', function() {
    var nombre = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=buscar_categoria&nombre=' + encodeURIComponent(nombre), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('resultadosBusqueda').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
});
</script>
