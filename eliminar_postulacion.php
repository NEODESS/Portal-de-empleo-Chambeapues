<?php
// Verificar sesión o autenticación del usuario
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirigir o mostrar mensaje de error si el usuario no está autenticado
    echo "No estás autenticado.";
    exit;
}

// Verificar si se recibieron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el trabajo_id del formulario
    $trabajo_id = $_POST['trabajo_id'];
    $usuario_id = $_SESSION['user_id']; // ID del usuario en sesión

    // Conexión a la base de datos (reemplaza con tus propios detalles de conexión)
    include ("config/conexion.php");

    // Eliminar la postulación del usuario para el trabajo especificado
    $sql_delete = "DELETE FROM tomar_chamba WHERE trabajoID = $trabajo_id AND usuarioID = $usuario_id";

    if ($conexion->query($sql_delete) === TRUE) {
        // Después de eliminar la postulación, establece un mensaje en la sesión
        $_SESSION['message'] = 'La postulación ha sido eliminada correctamente.';
    } else {
        // Si hubo un error, también puedes establecer un mensaje en la sesión
        $_SESSION['message'] = 'Hubo un error al eliminar la postulación.';
    }

    // Cerrar conexión a la base de datos
    $conexion->close();

} else {
    echo "Acceso no permitido.";
}

// Redirige al usuario a chambas.php
header("Location: chambas.php");
exit;
?>
