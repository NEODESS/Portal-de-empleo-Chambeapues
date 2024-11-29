<?php
// Verificar sesión o autenticación del usuario
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirigir o mostrar mensaje de error si el usuario no está autenticado
    echo "No estás autenticado.";
    exit;
}

// Obtener el ID del trabajo a borrar desde la URL
if (isset($_GET['trabajoID'])) {
    $trabajo_id = $_GET['trabajoID'];

    // Conexión a la base de datos (reemplaza con tus propios detalles de conexión)
    include("config/conexion.php");

    // Verificar si el trabajo pertenece al usuario actual
    $sql = "SELECT * FROM trabajos WHERE trabajoID = $trabajo_id AND empleadorID = {$_SESSION['user_id']}";
    $result = $conexion->query($sql);

    if ($result->num_rows == 1) {
        // Realizar la eliminación del trabajo
        $sql_delete = "DELETE FROM trabajos WHERE trabajoID = $trabajo_id";
        if ($conexion->query($sql_delete) === TRUE) {
            echo "El trabajo ha sido eliminado correctamente.";
        } else {
            if ($conexion->errno == 1451) {
                echo "No puedes borrar ya que alguien se postuló para este trabajo.";
            } else {
                echo "Error al intentar eliminar el trabajo: " . $conexion->error;
            }
        }
    } else {
        echo "No se encontró el trabajo específico para eliminar.";
    }

    // Cerrar conexión a la base de datos
    $conexion->close();

} else {
    echo "ID de trabajo no especificado.";
}

header("Location: chambas.php");
exit;
?>
