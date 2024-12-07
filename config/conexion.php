<?php

/* const BD_HOST = "localhost";
const BD_NAME = "Importec_InventarioBlaez";
const BD_USER = "Importec_InventarioBlaez";
const BD_PASSWORD = "guardian.tale3";
const BD_CHARSET = "utf8";

// ingresar link de proyecto
const BD_URL = "https://inventarioblaez.importecsolutions.com/";
 */


require_once 'config.php';

class Conexion {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
}



/* sistema_inventario/
├── config/
│   ├── config.php
│   ├── conexion.php
├── controller/
│   ├── InventarioController.php
│   ├── CategoriaController.php
│   ├── EstudianteController.php
│   ├── ModuloController.php
│   ├── UsuarioController.php
├── model/
│   ├── InventarioModel.php
│   ├── CategoriaModel.php
│   ├── EstudianteModel.php
│   ├── ModuloModel.php
│   ├── UsuarioModel.php
├── views/
│   ├── css/
│   │   ├── estilos.css
│   │   ├── boostrap.css
│   ├── inventario/
│   │   ├── listar_inventarios_semestre_I_II.php
│   │   ├── listar_inventarios_semestre_III_IV.php
│   │   ├── listar_inventarios_semestre_V_VI.php
│   │   ├── ver_detalles_inventario.css
│   ├── usuario/
│   │   ├── editar_perfil.php
│   │   ├── perfil.php
│   ├── cerrar_session.php
│   ├── inicio.php
│   ├── login.php
│   ├── header.php
│   ├── footer.php
│   ├── ver_detalles_inventario.php
│   ├── editar_perfil.php
│   ├── perfil.php
│   ├── cerrar_session.php
├── index.php
├── .htaccess */

?>
