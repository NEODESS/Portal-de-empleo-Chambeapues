<?php
// editar_empleado.php
include_once ("config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];

    // Actualizar los datos del empleado en la base de datos
    $sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', edad = '$edad' WHERE user_id = $user_id";

    if ($conexion->query($sql) === TRUE) {
        // Éxito al actualizar
        $response = array('success' => true);
    } else {
        // Error al actualizar
        $response = array('success' => false, 'message' => 'Error al actualizar los datos del empleado: ' . $conexion->error);
    }

    // Devolver respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>