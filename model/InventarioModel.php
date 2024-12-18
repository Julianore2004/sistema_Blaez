<?php
require_once __DIR__ . '/../config/conexion.php';

class InventarioModel
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function listar()
    {
        $query = "SELECT i.*, c.nombreCategoria, e.nombrecompleto
                  FROM inventario i
                  JOIN categorias c ON i.id_categoria = c.id
                  JOIN estudiantes e ON i.id_estudiante = e.id";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrar($data)
    {
        $query = "INSERT INTO inventario 
        (nombre, codigo_patrimonial, denominacion, marca, modelo, tipo, color, serie, dimensiones, valor, situacion, estado_de_observacion, observaciones, imagen, id_estudiante, id_categoria) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($query);

        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param(
            "ssssssssssssssis",
            $data['nombre'],
            $data['codigo_patrimonial'],
            $data['denominacion'],
            $data['marca'],
            $data['modelo'],
            $data['tipo'],
            $data['color'],
            $data['serie'],
            $data['dimensiones'],
            $data['valor'],
            $data['situacion'],
            $data['estado_de_observacion'],
            $data['observaciones'],
            $data['imagen'],
            $data['id_estudiante'],
            $data['id_categoria']
        );

        if (!$stmt->execute()) {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }

        $stmt->close();
    }

    public function editar($data)
    {
        $query = "UPDATE inventario 
        SET nombre=?, codigo_patrimonial=?, denominacion=?, marca=?, modelo=?, tipo=?, color=?, serie=?, dimensiones=?, valor=?, situacion=?, estado_de_observacion=?, observaciones=?, imagen=?, id_estudiante=?, id_categoria=? 
        WHERE id=?";

        $stmt = $this->conexion->prepare($query);

        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param(
            "ssssssssssssssssi",
            $data['nombre'],
            $data['codigo_patrimonial'],
            $data['denominacion'],
            $data['marca'],
            $data['modelo'],
            $data['tipo'],
            $data['color'],
            $data['serie'],
            $data['dimensiones'],
            $data['valor'],
            $data['situacion'],
            $data['estado_de_observacion'],
            $data['observaciones'],
            $data['imagen'],
            $data['id_estudiante'],
            $data['id_categoria'],
            $data['id']
        );

        if (!$stmt->execute()) {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }

        $stmt->close();
    }


    public function eliminar($id)
    {
        $query = "DELETE FROM inventario WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function obtenerPorId($id)
    {
        $query = "SELECT * FROM inventario WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }


    public function obtenerEstudiantes()
    {
        $query = "SELECT id, nombrecompleto FROM estudiantes";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function buscarPorNombre($nombre)
    {
        $query = "SELECT i.*, c.nombreCategoria, e.nombrecompleto
                  FROM inventario i
                  JOIN categorias c ON i.id_categoria = c.id
                  JOIN estudiantes e ON i.id_estudiante = e.id
                  WHERE i.nombre LIKE ?";
        $stmt = $this->conexion->prepare($query);
        $nombre = '%' . $nombre . '%';
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerCategorias()
    {
        $query = "SELECT id, nombreCategoria FROM categorias";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function filtrarPorCategoria($id_categoria)
    {
        $query = "SELECT i.*, c.nombreCategoria, e.nombrecompleto
                  FROM inventario i
                  JOIN categorias c ON i.id_categoria = c.id
                  JOIN estudiantes e ON i.id_estudiante = e.id
                  WHERE i.id_categoria = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id_categoria);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function listarInventariosSemestreIyII() {
        $query = "
            SELECT
                i.id AS id_inventario,
                i.nombre AS nombre_inventario,
                i.codigo_patrimonial,
                i.denominacion,
                i.marca,
                i.modelo,
                i.tipo,
                i.color,
                i.serie,
                i.dimensiones,
                i.valor,
                i.situacion,
                i.estado_de_observacion,
                i.observaciones,
                i.imagen,
                e.nombrecompleto AS nombre_estudiante,
                e.semestre
            FROM
                inventario i
            LEFT JOIN
                estudiantes e ON i.id_estudiante = e.id
            WHERE
                e.semestre IN ('Semestre I', 'Semestre II')";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function listarInventariosSemestreIIIyIV() {
        $query = "
            SELECT
                i.id AS id_inventario,
                i.nombre AS nombre_inventario,
                i.codigo_patrimonial,
                i.denominacion,
                i.marca,
                i.modelo,
                i.tipo,
                i.color,
                i.serie,
                i.dimensiones,
                i.valor,
                i.situacion,
                i.estado_de_observacion,
                i.observaciones,
                i.imagen,
                e.nombrecompleto AS nombre_estudiante,
                e.semestre
            FROM
                inventario i
            LEFT JOIN
                estudiantes e ON i.id_estudiante = e.id
            WHERE
                e.semestre IN ('Semestre III', 'Semestre IV')";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function listarInventariosSemestreVyVI() {
        $query = "
            SELECT
                i.id AS id_inventario,
                i.nombre AS nombre_inventario,
                i.codigo_patrimonial,
                i.denominacion,
                i.marca,
                i.modelo,
                i.tipo,
                i.color,
                i.serie,
                i.dimensiones,
                i.valor,
                i.situacion,
                i.estado_de_observacion,
                i.observaciones,
                i.imagen,
                e.nombrecompleto AS nombre_estudiante,
                e.semestre
            FROM
                inventario i
            LEFT JOIN
                estudiantes e ON i.id_estudiante = e.id
            WHERE
                e.semestre IN ('Semestre V', 'Semestre VI')";
        $result = $this->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function obtenerInventarioPorId($id) {
        $query = "
            SELECT
                i.id AS id_inventario,
                i.nombre AS nombre_inventario,
                i.codigo_patrimonial,
                i.denominacion,
                i.marca,
                i.modelo,
                i.tipo,
                i.color,
                i.serie,
                i.dimensiones,
                i.valor,
                i.situacion,
                i.estado_de_observacion,
                i.observaciones,
                i.imagen,
                e.nombrecompleto AS nombre_estudiante,
                e.semestre
            FROM
                inventario i
            LEFT JOIN
                estudiantes e ON i.id_estudiante = e.id
            WHERE
                i.id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    
}
?>