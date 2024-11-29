<?php
session_start(); // Inicia la sesión (si no está iniciada ya)
include("conexion.php");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si el user_id está presente en la sesión
if (!isset($_SESSION['user_id'])) {
    die("Error: Usuario no autenticado");
}

// Obtener los datos del formulario
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$ubicacion = $_POST['ubicacion'];
$precio = $_POST['precio'];
$user_id = $_SESSION['user_id']; // Obtener el user_id de la sesión

// Preparar y ejecutar la consulta SQL para insertar el evento
$sql = "INSERT INTO trabajos (titulo, descripcion, fecha_inicio, fecha_fin, ubicacion, precio, empleadorID) 
        VALUES ('$titulo', '$descripcion', '$fecha_inicio', '$fecha_fin', '$ubicacion', '$precio', '$user_id')";

if ($conexion->query($sql) === TRUE) {
    header("location: ../publicar.php");
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
