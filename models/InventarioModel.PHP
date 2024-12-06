<?php
require_once "./library/conexion.php";

class InventarioModel {
    // Insertar nuevo inventario
    public static function insertarInventario($datos) {
        try {
            $conexion = Conexion::connect();
            $query = "INSERT INTO inventario 
                      (codigo_patrimonial, denominacion, marca, modelo, tipo, color, serie, dimensiones, valor, situacion, estado_de_observacion, observaciones, imagen, id_estudiante, id_categoria) 
                      VALUES 
                      (:codigo_patrimonial, :denominacion, :marca, :modelo, :tipo, :color, :serie, :dimensiones, :valor, :situacion, :estado_de_observacion, :observaciones, :imagen, :id_estudiante, :id_categoria)";
            $stmt = $conexion->prepare($query);

            // Ejecutar la consulta con los datos sanitizados
            return $stmt->execute($datos);
        } catch (PDOException $e) {
            error_log("Error al insertar inventario: " . $e->getMessage());
            return false;
        }
    }

    public static function obtenerEstudiantes() {
        $conexion = Conexion::connect();
        $query = "SELECT id, nombrecompleto FROM estudiantes";
        return $conexion->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerCategorias() {
        $conexion = Conexion::connect();
        $query = "SELECT id, nombreCategoria FROM categorias";
        return $conexion->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerInventarios() {
        $conexion = Conexion::connect();
        $query = "SELECT i.id, i.codigo_patrimonial, i.denominacion, i.marca, i.modelo, i.tipo, i.color, 
                         i.serie, i.dimensiones, i.valor, i.situacion, i.estado_de_observacion, i.observaciones, 
                         i.imagen, e.nombrecompleto AS estudiante, c.nombreCategoria AS categoria 
                  FROM inventario i 
                  JOIN estudiantes e ON i.id_estudiante = e.id
                  JOIN categorias c ON i.id_categoria = c.id";
        return $conexion->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
