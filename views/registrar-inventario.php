<?php
require_once "controllers/InventarioController.php";

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = [
        "codigo_patrimonial" => $_POST["codigo_patrimonial"],
        "denominacion" => $_POST["denominacion"],
        "marca" => $_POST["marca"],
        "modelo" => $_POST["modelo"],
        "tipo" => $_POST["tipo"],
        "color" => $_POST["color"],
        "serie" => $_POST["serie"],
        "dimensiones" => $_POST["dimensiones"],
        "valor" => $_POST["valor"],
        "situacion" => $_POST["situacion"],
        "estado_de_observacion" => $_POST["estado_de_observacion"],
        "observaciones" => $_POST["observaciones"],
        "imagen" => $_POST["imagen"],
        "id_estudiante" => $_POST["id_estudiante"],
        "id_categoria" => $_POST["id_categoria"]
    ];

    $mensaje = InventarioController::registrarInventario($datos);
    echo "<script>alert('$mensaje');</script>";
}

// Obtener listas para el formulario
$estudiantes = InventarioController::listarEstudiantes();
$categorias = InventarioController::listarCategorias();
?>

<form method="POST" action="" class="container mt-4">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Registro de Usuarios</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label" for="codigo_patrimonial">Código Patrimonial:</label>
                <input class="form-control" type="text" name="codigo_patrimonial" id="codigo_patrimonial" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="denominacion">Denominación:</label>
                <input class="form-control" type="text" name="denominacion" id="denominacion" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="marca">Marca:</label>
                <input class="form-control" type="text" name="marca" id="marca" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="modelo">Modelo:</label>
                <input class="form-control" type="text" name="modelo" id="modelo" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="tipo">Tipo:</label>
                <input class="form-control" type="text" name="tipo" id="tipo" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="color">Color:</label>
                <input class="form-control" type="text" name="color" id="color" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="serie">Serie:</label>
                <input class="form-control" type="text" name="serie" id="serie" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="dimensiones">Dimensiones:</label>
                <input class="form-control" type="text" name="dimensiones" id="dimensiones" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="valor">Valor:</label>
                <input class="form-control" type="text" name="valor" id="valor" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="situacion">Situación:</label>
                <input class="form-control" type="text" name="situacion" id="situacion" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="estado_de_observacion">Estado de Observación:</label>
                <input class="form-control" type="text" name="estado_de_observacion" id="estado_de_observacion"
                    required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="observaciones">Observaciones:</label>
                <input class="form-control" type="text" name="observaciones" id="observaciones" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="imagen">URL Imagen:</label>
                <input class="form-control" type="text" name="imagen" id="imagen"><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="id_estudiante">Estudiante:</label>
                <select class="form-control" name="id_estudiante" id="id_estudiante" required>
                    <option value="">Seleccione un estudiante</option>
                    <?php foreach ($estudiantes as $row): ?>
                        <option value="<?= htmlspecialchars($row['id']) ?>"><?= htmlspecialchars($row['nombrecompleto']) ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="id_categoria">Categoría:</label>
                <select class="form-control" name="id_categoria" id="id_categoria" required>
                    <option value="">Seleccione una categoría</option>
                    <?php foreach ($categorias as $row): ?>
                        <option value="<?= htmlspecialchars($row['id']) ?>"><?= htmlspecialchars($row['nombreCategoria']) ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
            </div>
            <button class="btn btn-dark" type="submit">Registrar Inventario</button>
        </div>
    </div>
    </div>
</form>