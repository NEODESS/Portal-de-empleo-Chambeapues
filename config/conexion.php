<?php
$host = "localhost";
$usuario = "root";
$contrasena = "admin";
$base_de_datos = "chambeapues";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
