<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "controllers/CategoriaController.php";

    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    $mensaje = CategoriaController::registrarCategoria($nombre, $descripcion);
    echo "<script>alert('$mensaje');</script>";
}
?>

<form method="POST" action="" class="container mt-4">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Registro de Usuarios</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label" for="nombre">Nombre de la Categoría:</label>
                <input class="form-control"  type="text" name="nombre" id="nombre" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descripcion">Descripción:</label>
                <input class="form-control"  type="text" name="descripcion" id="descripcion" required>
            </div>
            <div class="mb-3">
                <button class="btn btn-dark" type="submit">Registrar Categoría</button>
            </div>
        </div>
    </div>
</form>