<?php
// editdatos.php
session_start();
include ("config/conexion.php");

if (!isset($_SESSION['user_id'])) {
    $_SESSION['mensaje'] = "No estás autenticado.";
    header('Location: configracion.php'); // Asegúrate de que esta sea la ruta correcta.
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);
    $correo = $conexion->real_escape_string($_POST['correo']);
    $edad = $conexion->real_escape_string($_POST['edad']);

    $sql_update = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', edad = '$edad' WHERE user_id = $user_id";

    if ($conexion->query($sql_update) === TRUE) {
        $_SESSION['mensaje'] = "Datos actualizados correctamente.";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar los datos: " . $conexion->error;
    }

    $conexion->close();
    header('Location: configracion.php'); // Redirige al usuario después de actualizar los datos.
    exit;
}
?>
