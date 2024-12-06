<?php
require_once __DIR__ . '/../config/conexion.php';

class ModuloModel {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function listar() {
        $query = "SELECT m.*, e.nombrecompleto AS estudiante_nombrecompleto
                  FROM modulo m
                  LEFT JOIN estudiantes e ON m.id_estudiante = e.id";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar($data) {
        $query = "INSERT INTO modulo (nombre, descripcion, id_estudiante, imagen) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssis", $data['nombre'], $data['descripcion'], $data['id_estudiante'], $data['imagen']);
        $stmt->execute();
    }

    public function editar($data) {
        $query = "UPDATE modulo SET nombre=?, descripcion=?, id_estudiante=?, imagen=? WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssisi", $data['nombre'], $data['descripcion'], $data['id_estudiante'], $data['imagen'], $data['id']);
        $stmt->execute();
    }

    public function eliminar($id) {
        $query = "DELETE FROM modulo WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM modulo WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function obtenerEstudiantes() {
        $query = "SELECT id, nombrecompleto FROM estudiantes";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
