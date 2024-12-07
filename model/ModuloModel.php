<?php
require_once __DIR__ . '/../config/conexion.php';

class ModuloModel {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function listar() {
        $query = "SELECT * FROM modulo";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar($data) {
        $query = "INSERT INTO modulo (nombre, descripcion, semestre, imagen) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssss", $data['nombre'], $data['descripcion'], $data['semestre'], $data['imagen']);
        $stmt->execute();
    }

    public function editar($data) {
        $query = "UPDATE modulo SET nombre=?, descripcion=?, semestre=?, imagen=? WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssssi", $data['nombre'], $data['descripcion'], $data['semestre'], $data['imagen'], $data['id']);
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
}
?>
