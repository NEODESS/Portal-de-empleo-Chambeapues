<?php
// Verificar sesión o autenticación del usuario
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirigir o mostrar mensaje de error si el usuario no está autenticado
    echo "No estás autenticado.";
    exit;
}

// Obtener los datos del formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trabajo_id = $_POST['trabajo_id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $ubicacion = $_POST['ubicacion'];
    $precio = $_POST['precio'];

    // Conexión a la base de datos (reemplaza con tus propios detalles de conexión)
    include("config/conexion.php");

    // Verificar si el trabajo pertenece al usuario actual
    $sql_check = "SELECT * FROM trabajos WHERE trabajoID = $trabajo_id AND empleadorID = {$_SESSION['user_id']}";
    $result_check = $conexion->query($sql_check);

    if ($result_check->num_rows == 1) {
        // Actualizar el trabajo en la base de datos
        $sql_update = "UPDATE trabajos SET 
                        titulo = '$titulo', 
                        descripcion = '$descripcion', 
                        fecha_inicio = '$fecha_inicio', 
                        fecha_fin = '$fecha_fin', 
                        ubicacion = '$ubicacion', 
                        precio = '$precio' 
                        WHERE trabajoID = $trabajo_id";

        if ($conexion->query($sql_update) === TRUE) {
            // Redirigir de vuelta a chambas.php
            header("Location: chambas.php");
            exit; // Asegurar que se detiene la ejecución después de redirigir
        } else {
            echo "Error al actualizar el trabajo: " . $conexion->error;
        }
    } else {
        echo "No tienes permisos para editar este trabajo.";
    }

    // Cerrar conexión a la base de datos
    $conexion->close();

} else {
    echo "Acceso no permitido.";
}
?>
