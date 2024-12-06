<?php

require_once "./config/config.php";

require_once "./controllers/vistas_control.php";

$mostrar = new vistasControlador();

$vista = $mostrar->obtenerVistaControlador();
if ( $vista == "404" || $vista == "login") {
    require_once "./views/$vista.php";
}else {
    include "./views/inc/header.php";
    include $vista;
    include "./views/inc/footer.php";
}

?>
