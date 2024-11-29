<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trabajo_id = $_POST['trabajo_id'];
    $usuario_id = $_SESSION['user_id'];

    include ("config/conexion.php");

    $sql_check = "SELECT * FROM tomar_chamba WHERE trabajoID = $trabajo_id AND usuarioID = $usuario_id";
    $result_check = $conexion->query($sql_check);

    if ($result_check->num_rows > 0) {
        $message = "Ya te has postulado para este trabajo anteriormente.";
    } else {
        $sql_insert = "INSERT INTO tomar_chamba (trabajoID, usuarioID) VALUES ($trabajo_id, $usuario_id)";

        if ($conexion->query($sql_insert) === TRUE) {
            $message = "Te has postulado exitosamente para este trabajo.";
            $_SESSION['message'] = $message; // Solo establece el mensaje de la sesión si el usuario se postula a la vacante
        } else {
            $message = "Error al intentar postularte para este trabajo: " . $conexion->error;
        }
    }

    $conexion->close();

} else {
    $message = "Acceso no permitido.";
}

header("Location: inicio.php");
exit;
?>
