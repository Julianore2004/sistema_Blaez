<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container mt-4">
    <h1>Listar Inventario</h1>
    <a href="index.php?action=registrar" class="btn btn-primary mb-3">Registrar Nuevo</a>
    <input type="text" id="buscarInventario" class="form-control mb-3" placeholder="Buscar por nombre del objeto">
    <div class="mb-3">
        <label for="filtroCategoria" class="form-label">Filtrar por Categoría:</label>
        <select class="form-select" id="filtroCategoria" onchange="filtrarInventario()">
            <option value="">Todas</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombreCategoria']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div id="resultadosBusqueda">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
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
                <th>Acciones</th>
            </tr>
            <?php foreach ($inventarios as $inventario): ?>
                <tr>
                    <td><?php echo $inventario['id']; ?></td>
                    <td><?php echo $inventario['nombre']; ?></td>
                    <td><?php echo $inventario['codigo_patrimonial']; ?></td>
                    <td><?php echo $inventario['denominacion']; ?></td>
                    <td><?php echo $inventario['marca']; ?></td>
                    <td><?php echo $inventario['modelo']; ?></td>
                    <td><?php echo $inventario['tipo']; ?></td>
                    <td><?php echo $inventario['color']; ?></td>
                    <td><?php echo $inventario['serie']; ?></td>
                    <td><?php echo $inventario['dimensiones']; ?></td>
                    <td><?php echo $inventario['valor']; ?></td>
                    <td><?php echo $inventario['situacion']; ?></td>
                    <td><?php echo $inventario['estado_de_observacion']; ?></td>
                    <td><?php echo $inventario['observaciones']; ?></td>
                    
                    <td><?php echo $inventario['nombrecompleto']; ?></td>
                    <td><?php echo $inventario['nombreCategoria']; ?></td>
                    <td>
                        <a href="index.php?action=editar&id=<?php echo $inventario['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="index.php?action=eliminar&id=<?php echo $inventario['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>

<script>
function filtrarInventario() {
    var categoriaId = document.getElementById('filtroCategoria').value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=filtrar_inventario&categoriaId=' + encodeURIComponent(categoriaId), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('resultadosBusqueda').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
</script>
<script>
document.getElementById('buscarInventario').addEventListener('input', function() {
    var nombre = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=buscar_inventario&nombre=' + encodeURIComponent(nombre), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('resultadosBusqueda').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
});
</script>

