<?php
require_once __DIR__ . '/../model/InventarioModel.php';
require_once __DIR__ . '/../model/CategoriaModel.php';
class InventarioController {
    private $model;

    public function __construct() {
        $this->model = new InventarioModel();
    }

    public function listar() {
        $inventarios = $this->model->listar();
        $categorias = $this->model->obtenerCategorias();
        require_once __DIR__ . '/../views/inventario/listar.php';
    }
    
    public function registrar()
{
    $categorias = $this->model->obtenerCategorias();
    $estudiantes = $this->model->obtenerEstudiantes();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $requiredFields = ['nombre', 'codigo_patrimonial', 'denominacion', 'marca', 'modelo', 'tipo', 'color', 'serie', 'dimensiones', 'valor', 'situacion', 'estado_de_observacion', 'observaciones', 'imagen'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                die("El campo $field es obligatorio.");
            }
        }

        $this->model->registrar($_POST);
        header('Location: index.php?action=listar');
        exit;
    } else {
        require_once __DIR__ . '/../views/inventario/registrar.php';
    }
}

public function editar()
{
    $categorias = $this->model->obtenerCategorias();
    $estudiantes = $this->model->obtenerEstudiantes();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['id'])) {
            die("El ID del inventario es obligatorio.");
        }

        $this->model->editar($_POST);
        header('Location: index.php?action=listar');
        exit;
    } else {
        if (empty($_GET['id'])) {
            die("El ID del inventario es obligatorio.");
        }

        $inventario = $this->model->obtenerPorId($_GET['id']);
        require_once __DIR__ . '/../views/inventario/editar.php';
    }
}


    public function eliminar() {
        $this->model->eliminar($_GET['id']);
        header('Location: index.php?action=listar');
    }

    public function buscar() {
        $nombre = $_GET['nombre'];
        $inventarios = $this->model->buscarPorNombre($nombre);
        require_once __DIR__ . '/../views/inventario/buscar.php';
    }
    public function filtrarPorCategoria() {
        $id_categoria = $_POST['id_categoria'];
        $inventariosFiltrados = $this->model->filtrarPorCategoria($id_categoria);
        require_once __DIR__ . '/../views/inventario/filtrar.php';
    }
}
?>
