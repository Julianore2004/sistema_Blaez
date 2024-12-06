<?php
require_once "./library/conexion.php";

class ModuloModel {
    // Insertar nuevo módulo
    public static function insertarModulo($datos) {
        $tabla = "modulo";
        $campos = "nombre, descripcion, id_inventario, imagen";
        $valores = [$datos['nombre'], $datos['descripcion'], $datos['id_inventario'], $datos['imagen']];

        return ConsultasSQL::InsertSQL($tabla, $campos, $valores);
    }

    // Obtener lista de inventarios
    public static function obtenerInventarios() {
        $conn = Conexion::connect();
        $sql = "SELECT id, codigo_patrimonial FROM inventario";

        try {
            $stmt = $conn->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error al obtener inventarios: " . $e->getMessage());
            return [];
        }
    }

    // Obtener lista de módulos
    public static function obtenerModulos() {
        $conn = Conexion::connect();
        $sql = "SELECT m.id, m.nombre, m.descripcion, m.imagen, i.codigo_patrimonial AS inventario
                FROM modulo m
                LEFT JOIN inventario i ON m.id_inventario = i.id";

        try {
            $stmt = $conn->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error al obtener módulos: " . $e->getMessage());
            return [];
        }
    }
}

?>