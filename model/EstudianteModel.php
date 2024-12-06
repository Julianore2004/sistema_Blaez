<?php
require_once __DIR__ . '/../config/conexion.php';

class EstudianteModel {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function listar() {
        $query = "SELECT * FROM estudiantes";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar($data) {
        $query = "INSERT INTO estudiantes (nombrecompleto, programa_de_estudios, semestre) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sss", $data['nombrecompleto'], $data['programa_de_estudios'], $data['semestre']);
        $stmt->execute();
    }

    public function editar($data) {
        $query = "UPDATE estudiantes SET nombrecompleto=?, programa_de_estudios=?, semestre=? WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssi", $data['nombrecompleto'], $data['programa_de_estudios'], $data['semestre'], $data['id']);
        $stmt->execute();
    }

    public function eliminar($id) {
        $query = "DELETE FROM estudiantes WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM estudiantes WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
