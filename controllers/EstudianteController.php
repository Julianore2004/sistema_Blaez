<?php
require_once "models/EstudianteModel.php";  // Incluye el modelo que maneja la inserción

class EstudianteController {
    public static function registrarEstudiante($nombre, $programa, $semestre) {
        // Limpiar los datos para prevenir SQL injection
        $nombre = consultasSQL::clean_string($nombre);
        $programa = consultasSQL::clean_string($programa);
        $semestre = consultasSQL::clean_string($semestre);

        // Intentar insertar el estudiante
        if (EstudianteModel::insertarEstudiante($nombre, $programa, $semestre)) {
            return "Estudiante registrado con éxito.";  // Mensaje de éxito
        } else {
            return "Error al registrar el estudiante.";  // Mensaje de error
        }
    }
    public static function listarEstudiantes() {
        return EstudianteModel::obtenerEstudiantes();
    }
}
?>
