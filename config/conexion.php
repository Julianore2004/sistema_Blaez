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
├── model/
│   ├── InventarioModel.php
├── views/
│   ├── modulo/
│   │   ├── listar.php
│   │   ├── registrar.php
│   │   ├── editar.php
├── header.php
├── footer.php
├── index.php
├── .htaccess */
?>
