<?php
require_once "./config/config.php";

class Conexion {
    private static $conexion;

    // Método para establecer conexión segura con la base de datos
    public static function connect() {
        if (!self::$conexion) {
            try {
                $dsn = "mysql:host=" . BD_HOST . ";dbname=" . BD_NAME . ";charset=" . BD_CHARSET;
                self::$conexion = new PDO($dsn, BD_USER, BD_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                die("Error en la conexión: " . $e->getMessage());
            }
        }
        return self::$conexion;
    }
}

// CONEXION.PHP

class ConsultasSQL {
    // Método para insertar datos en cualquier tabla usando consultas preparadas
    public static function InsertSQL($tabla, $campos, $valores) {
        $conn = Conexion::connect();

        if (is_string($valores)) {
            $valores = explode(', ', $valores); // Convertir la cadena en un array si se pasa como cadena
        }

        // Crear la lista de placeholders para los valores
        $placeholders = implode(", ", array_fill(0, count($valores), "?"));
        $sql = "INSERT INTO $tabla ($campos) VALUES ($placeholders)";
        $stmt = $conn->prepare($sql);

        try {
            $stmt->execute($valores); // Ejecutar consulta
            return true; // Retornar true si la consulta fue exitosa
        } catch (PDOException $e) {
            error_log("Error al insertar: " . $e->getMessage()); // Registrar el error
            return false; // Retornar false si ocurrió un error
        }
    }

    // Función para limpiar cadenas
    public static function cleanString($string) {
        return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
    }

    // Método para realizar consultas SELECT
    public static function consultar($query) {
        $conn = Conexion::connect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(); // Retorna todos los resultados de la consulta
    }
}


?>


