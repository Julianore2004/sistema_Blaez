<?php
require_once __DIR__ . '/../model/CategoriaModel.php';

class CategoriaController {
    private $model;

    public function __construct() {
        $this->model = new CategoriaModel();
    }

    public function listar() {
        $categorias = $this->model->listar();
        require_once __DIR__ . '/../views/categoria/listar.php';
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->registrar($_POST);
            header('Location: index.php?action=listar_categorias');
        } else {
            require_once __DIR__ . '/../views/categoria/registrar.php';
        }
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->editar($_POST);
            header('Location: index.php?action=listar_categorias');
        } else {
            $categoria = $this->model->obtenerPorId($_GET['id']);
            require_once __DIR__ . '/../views/categoria/editar.php';
        }
    }

    public function eliminar() {
        $this->model->eliminar($_GET['id']);
        header('Location: index.php?action=listar_categorias');
    }

    public function buscar() {
        $nombre = $_GET['nombre'];
        $categorias = $this->model->buscarPorNombre($nombre);
        require_once __DIR__ . '/../views/categoria/buscar.php';
    }
}
?>
