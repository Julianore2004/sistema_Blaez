<?php
require_once __DIR__ . '/controller/InventarioController.php';
require_once __DIR__ . '/controller/CategoriaController.php';
require_once __DIR__ . '/controller/EstudianteController.php';
require_once __DIR__ . '/controller/ModuloController.php';
require_once __DIR__ . '/controller/UsuarioController.php';
// Requerir otros controladores según sea necesario

$controller = null;
$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

switch ($action) {
    case 'listar':
    case 'registrar':
    case 'editar':
    case 'eliminar':
    case 'filtrar':
        $controller = new InventarioController();
        break;
    case 'listar_categorias':
    case 'registrar_categoria':
    case 'editar_categoria':
    case 'eliminar_categoria':
    case 'buscar_categoria':
        $controller = new CategoriaController();
        break;
    case 'listar_estudiantes':
    case 'registrar_estudiante':
    case 'editar_estudiante':
    case 'eliminar_estudiante':
    case 'buscar_estudiante':
        $controller = new EstudianteController();
        break;
    case 'listar_modulos':
    case 'registrar_modulo':
    case 'editar_modulo':
    case 'eliminar_modulo':
        $controller = new ModuloController();
        break;
    case 'listar_usuarios':
    case 'registrar_usuario':
    case 'editar_usuario':
    case 'eliminar_usuario':
    case 'buscar_usuario':
        $controller = new UsuarioController();
        break;
    case 'buscar_inventario':
        $controller = new InventarioController();
        break;
    case 'filtrar_por_categoria':
        $controller = new InventarioController();
        $controller->filtrarPorCategoria();
        exit;
    case 'filtrar_por_semestre':
        $controller = new EstudianteController();
        $controller->filtrarPorSemestre();
        exit;
    // Agregar casos para otras acciones según sea necesario
    default:
        echo "Acción no válida";
        exit;
}

switch ($action) {
    case 'listar':
        $controller->listar();
        break;
    case 'registrar':
        $controller->registrar();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    case 'listar_categorias':
        $controller->listar();
        break;
    case 'registrar_categoria':
        $controller->registrar();
        break;
    case 'editar_categoria':
        $controller->editar();
        break;
    case 'eliminar_categoria':
        $controller->eliminar();
        break;
    case 'buscar_categoria':
        $controller->buscar();
        break;
    case 'listar_estudiantes':
        $controller->listar();
        break;
    case 'registrar_estudiante':
        $controller->registrar();
        break;
    case 'editar_estudiante':
        $controller->editar();
        break;
    case 'eliminar_estudiante':
        $controller->eliminar();
        break;
    case 'buscar_estudiante':
        $controller->buscar();
        break;
    case 'listar_modulos':
        $controller->listar();
        break;
    case 'registrar_modulo':
        $controller->registrar();
        break;
    case 'editar_modulo':
        $controller->editar();
        break;
    case 'eliminar_modulo':
        $controller->eliminar();
        break;
    case 'listar_usuarios':
        $controller->listar();
        break;
    case 'registrar_usuario':
        $controller->registrar();
        break;
    case 'editar_usuario':
        $controller->editar();
        break;
    case 'eliminar_usuario':
        $controller->eliminar();
        break;
    case 'buscar_usuario':
        $controller->buscar();
        break;
    case 'buscar_inventario':
        $controller->buscar();
        break;

    // Agregar casos para otras acciones según sea necesario
    default:
        echo "Acción no válida";
        break;
}
?>