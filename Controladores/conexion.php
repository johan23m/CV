<?php
$servername = "tu_servidor";
$username = "tu_usuario";
$password = "tu_contraseña";
$database = "nombre_de_tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?