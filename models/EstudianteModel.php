<?php
require_once "./library/conexion.php"; // Asegúrate de que el archivo de conexión esté disponible

// MODEL ESTUDIANTE

class EstudianteModel {
    public static function insertarEstudiante($nombre, $programa, $semestre) {
        $tabla = "estudiantes";  // Nombre de la tabla
        $campos = "nombrecompleto, programa_de_estudios, semestre";  // Campos de la tabla
        $valores = "'$nombre', '$programa', '$semestre'";  // Valores a insertar

        // Llamada a una función para insertar datos
        return ConsultasSQL::InsertSQL($tabla, $campos, $valores);
    }

    public static function obtenerEstudiantes() {
        // Usar la conexión establecida
        $conn = Conexion::connect();
        
        $query = "SELECT id, nombrecompleto, programa_de_estudios, semestre FROM estudiantes";
        return $conn->query($query); // Ejecuta la consulta y retorna el resultado
    }
}

?>


