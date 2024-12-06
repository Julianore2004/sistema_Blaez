<?php
require_once "./controllers/ModuloController.php";

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = [
        "nombre" => $_POST["nombre"],
        "descripcion" => $_POST["descripcion"],
        "id_inventario" => $_POST["id_inventario"],
        "imagen" => $_POST["imagen"],
    ];

    $mensaje = ModuloController::registrarModulo($datos);
    echo "<script>alert('$mensaje');</script>";
}

// Obtener listas para el formulario
$inventario = ModuloController::listarInventario();
?>

<form method="POST" action="" class="container mt-4">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Registro de Módulos</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input class="form-control" type="text" name="descripcion" id="descripcion" required>
            </div>
            <div class="mb-3">
                <label for="id_inventario" class="form-label">Inventario:</label>
                <select class="form-control" name="id_inventario" id="id_inventario" required>
                    <option value="">Seleccione:</option>
                    <?php foreach ($inventario as $row): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['codigo_patrimonial'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">URL Imagen:</label>
                <input class="form-control" type="text" name="imagen" id="imagen">
            </div>
            <button type="submit" class="btn btn-dark">Registrar Módulo</button>
        </div>
    </div>
</form>
