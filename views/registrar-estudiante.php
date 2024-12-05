<?php
// Si se recibe una solicitud POST, procesamos los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "controllers/EstudianteController.php";

    // Recibimos los datos del formulario
    $nombre = $_POST["nombre"];
    $programa = $_POST["programa"];
    $semestre = $_POST["semestre"];

    // Llamamos al controlador para registrar el estudiante
    $mensaje = EstudianteController::registrarEstudiante($nombre, $programa, $semestre);
    echo "<script>alert('$mensaje');</script>";  // Mostramos un mensaje de éxito o error
}
?>

<!-- Formulario para registrar un nuevo estudiante -->
<form method="POST" action="" class="container mt-4">

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Registro de Usuarios</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label" for="nombre">Nombre Completo:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" required><br>
            </div>
            <div class="mb-3">
            <label class="form-label" for="programa">Programa de Estudios:</label>
            <input class="form-control" type="text" name="programa" id="programa" required><br>
            </div>
            <div class="mb-3">
            <label class="form-label" for="semestre">Semestre:</label>
            <input class="form-control" type="text" name="semestre" id="semestre" required><br>
            </div>
            <button class="btn btn-dark" type="submit">Registrar Estudiante</button>
        </div>
    </div>
    </div>
</form>