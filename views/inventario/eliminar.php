<?php
$inventarioController->eliminar($_GET['id']);
header("Location: listar.php");
exit;
