<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/controller/InventarioController.php';
require_once __DIR__ . '/controller/CategoriaController.php';
require_once __DIR__ . '/controller/EstudianteController.php';
require_once __DIR__ . '/controller/ModuloController.php';
require_once __DIR__ . '/controller/UsuarioController.php';
// Requerir otros controladores según sea necesario

$controller = null;
$action = isset($_GET['action']) ? $_GET['action'] : 'login'; // Establecer 'login' como acción predeterminada

if (!isset($_SESSION['user_id']) && $action !== 'login' && $action !== 'logout') {
    header('Location: index.php?action=login');
    exit;
}

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioController = new UsuarioController();
            $usuarioController->login();
        } else {
            require_once __DIR__ . '/views/login.php';
        }
        break;
    case 'logout':
        require_once __DIR__ . '/views/cerrar_session.php';
        break;
    case 'inicio':
        require_once __DIR__ . '/views/inicio.php';
        break;
    case 'listar_inventarios_semestre_I_II':
        $controller = new InventarioController();
        $controller->listarInventariosSemestreIyII();
        break;
    case 'listar_inventarios_semestre_III_IV':
        $controller = new InventarioController();
        $controller->listarInventariosSemestreIIIyIV();
        break;
    case 'listar_inventarios_semestre_V_VI':
        $controller = new InventarioController();
        $controller->listarInventariosSemestreVyVI();
        break;
    case 'ver_detalles_inventario':
        $controller = new InventarioController();
        $controller->verDetallesInventario();
        break;
    case 'listar':
    case 'registrar':
    case 'editar':
    case 'eliminar':
    case 'filtrar':
        if ($_SESSION['rol'] === 'Usuario') {
            header('Location: index.php?action=inicio');
            exit;
        }
        $controller = new InventarioController();
        break;
    case 'listar_categorias':
    case 'registrar_categoria':
    case 'editar_categoria':
    case 'eliminar_categoria':
    case 'buscar_categoria':
        if ($_SESSION['rol'] === 'Usuario') {
            header('Location: index.php?action=inicio');
            exit;
        }
        $controller = new CategoriaController();
        break;
    case 'listar_estudiantes':
    case 'registrar_estudiante':
    case 'editar_estudiante':
    case 'eliminar_estudiante':
    case 'buscar_estudiante':
        if ($_SESSION['rol'] === 'Usuario') {
            header('Location: index.php?action=inicio');
            exit;
        }
        $controller = new EstudianteController();
        break;
    case 'listar_modulos':
    case 'registrar_modulo':
    case 'editar_modulo':
    case 'eliminar_modulo':
        if ($_SESSION['rol'] === 'Usuario') {
            header('Location: index.php?action=inicio');
            exit;
        }
        $controller = new ModuloController();
        break;
    case 'listar_usuarios':
    case 'registrar_usuario':
    case 'editar_usuario':
    case 'eliminar_usuario':
    case 'buscar_usuario':
        if ($_SESSION['rol'] === 'Usuario') {
            header('Location: index.php?action=inicio');
            exit;
        }
        $controller = new UsuarioController();
        break;
    case 'buscar_inventario':
        if ($_SESSION['rol'] === 'Usuario') {
            header('Location: index.php?action=inicio');
            exit;
        }
        $controller = new InventarioController();
        break;
    case 'filtrar_por_categoria':
        if ($_SESSION['rol'] === 'Usuario') {
            header('Location: index.php?action=inicio');
            exit;
        }
        $controller = new InventarioController();
        $controller->filtrarPorCategoria();
        exit;
    case 'filtrar_por_semestre':
        if ($_SESSION['rol'] === 'Usuario') {
            header('Location: index.php?action=inicio');
            exit;
        }
        $controller = new EstudianteController();
        $controller->filtrarPorSemestre();
        exit;
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
    default:
      
}
?>
