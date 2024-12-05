<?php
require_once "config/config.php";

class Conexion {
    private static $conexion;

    public static function connect() {
        if (!self::$conexion) {
            self::$conexion = new mysqli(BD_HOST, BD_USER, BD_PASSWORD, BD_NAME);
            self::$conexion->set_charset(BD_CHARSET);
            if (self::$conexion->connect_error) {
                die("Error de conexión: " . self::$conexion->connect_error);
            }
        }
        return self::$conexion;
    }

    public static function consultar($query) {
        $conexion = self::connect();
        $resultado = $conexion->query($query);

        if (!$resultado) {
            die("Error en la consulta SQL: " . $conexion->error);
        }
        return $resultado;
    }
}

class consultasSQL {
    // Método para insertar datos en cualquier tabla
    public static function InsertSQL($tabla, $campos, $valores) {
        $conn = Conexion::connect();  // Conexión a la base de datos
        $sql = "INSERT INTO $tabla ($campos) VALUES ($valores)";  // Consulta SQL para insertar

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            return true;  // Si la consulta se ejecutó correctamente
        } else {
            return false;  // Si ocurrió un error
        }

        // Cerrar la conexión
        $conn->close();
    }

    // Función para limpiar las cadenas de texto y evitar inyecciones SQL
    public static function clean_string($string) {
        $conn = Conexion::connect();
        return mysqli_real_escape_string($conn, trim($string));  // Eliminar espacios y evitar inyecciones
    }
    
}
?>
