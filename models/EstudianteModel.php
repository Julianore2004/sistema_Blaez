<?php
require_once "library/conexion.php"; // Asegúrate de que el archivo de conexión esté disponible

class EstudianteModel {
    public static function insertarEstudiante($nombre, $programa, $semestre) {
        $tabla = "estudiantes";  // Nombre de la tabla
        $campos = "nombrecompleto, programa_de_estudios, semestre";  // Campos de la tabla
        $valores = "'$nombre', '$programa', '$semestre'";  // Valores a insertar, con la fecha actual

        // Llamada a una función para insertar datos
        return consultasSQL::InsertSQL($tabla, $campos, $valores);
    }
    public static function obtenerEstudiantes() {
        $query = "SELECT id, nombrecompleto, programa_de_estudios, semestre FROM estudiantes";
        return Conexion::consultar($query);
    }
}
?>


