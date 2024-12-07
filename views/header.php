<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio - Sistema de Inventario</title>
  <link rel="stylesheet" href="views/css/estilos.css" />
  <link rel="stylesheet" href="views/css/boostrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
  <nav class="navbar navbar-expand-lg" style="background-color: #0f67f6; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?action=listar">
        <img src="./img/logo_tecno.png" alt="Logo" width="65" height="28" />
      </a>
      <a class="navbar-brand text-white" href="index.php?action=listar" style="font-weight: bold">Sistema de Inventario</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation" style="color: #fff">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link text-white" href="index.php?action=inicio" style="opacity: 0.9">Inicio</a>

          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?action=listar" style="opacity: 0.9">Inventarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?action=listar_categorias" style="opacity: 0.9">Categorías</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?action=listar_estudiantes" style="opacity: 0.9">Estudiantes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?action=listar_modulos" style="opacity: 0.9">Módulos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?action=listar_usuarios" style="opacity: 0.9">Usuarios</a>
          </li>
        </ul>
      </div>

      <div class="nav-item dropdown ms-auto">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Usuario
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="./cerrar_session.php">Cerrar sesión</a></li>
        </ul>
      </div>
    </div>
  </nav>
