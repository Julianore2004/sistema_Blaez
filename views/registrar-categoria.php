<?php
// Si se recibe una solicitud POST, procesamos los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "controllers/CategoriaController.php";

    // Recibimos los datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    // Llamamos al controlador para registrar la categoría
    $mensaje = CategoriaController::registrarCategoria($nombre, $descripcion);
    echo "<script>alert('$mensaje');</script>";
}
?>

<!-- Formulario para registrar una nueva categoría -->
<form method="POST" action="" class="container mt-4">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Registro de Categorías</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label" for="nombre">Nombre de la Categoría:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descripcion">Descripción:</label>
                <input class="form-control" type="text" name="descripcion" id="descripcion" required>
            </div>
            <div class="mb-3">
                <button class="btn btn-dark" type="submit">Registrar Categoría</button>
            </div>
        </div>
    </div>
</form>
