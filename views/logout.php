<?php
require_once("../config/conexion.php");
session_start(); // Inicia la sesión si no está iniciada (importante para usar session_destroy)

session_destroy();
header("Location:" . Conectar::ruta() . "index.php");
exit();
?>
