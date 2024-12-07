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
    
    public function registrar() {
        $categorias = $this->model->obtenerCategorias();
        $estudiantes = $this->model->obtenerEstudiantes();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->registrar($_POST);
            header('Location: index.php?action=listar');
        } else {
            require_once __DIR__ . '/../views/inventario/registrar.php';
        }
    }

    public function editar() {
        $categorias = $this->model->obtenerCategorias();
        $estudiantes = $this->model->obtenerEstudiantes();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->editar($_POST);
            header('Location: index.php?action=listar');
        } else {
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
