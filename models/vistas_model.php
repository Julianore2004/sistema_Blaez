<?php
session_start();
class vistaModelo
{

    protected static function obtener_vistas($vista)
    {
        $palabras_permitidas = [
            'inicio',
            'inventario',
            'inventarios',
            'usuarios',
            'nuevo-usuario',
            'modificar-usuario',
            'productos',
            'nuevo-producto',
            'producto',
            'carrito',
            'ofertas',
            'novedades',
            'miperfil',
            'detalle_producto',
            'registrarse',
            'nuevo-producto',
            'nueva-categoria',
            'nueva-compra',
            'nueva-persona',
            'admin',
            'principal',
            'productos',
            'categorias',
            'estudiantes',
            'registrar-estudiante',
            'registrar-modulo',
            'registrar-inventario',
            'registrar-usuarios',
            'registrar-categoria',
            'modulos',
        ];
        /*   if (!isset($_SESSION['sesion_venta_id'])) {
            return "login";
         } */
        // Comprobar si la vista es permitida
        if (in_array($vista, $palabras_permitidas)) {
            if (is_file("./views/" . $vista . ".php")) {
                $contenido = "./views/" . $vista . ".php";
            } else {
                $contenido = "404";
            }
        } elseif ($vista == "index" || $vista == "login") {
            $contenido = "login";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }

}
