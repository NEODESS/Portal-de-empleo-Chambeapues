<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirigir o mostrar mensaje de error si el usuario no está autenticado
    echo "No estás autenticado.";
    exit;
}
// Configuración de la conexión a la base de datos
include("config/conexion.php");

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos del formulario
    $tipo = mysqli_real_escape_string($conexion, $_POST['tipo']);
    $nombre = $_SESSION['nombre'] . ' ' . $_SESSION['apellido'];
    $email = $_SESSION['correo'];
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $mensaje = mysqli_real_escape_string($conexion, $_POST['mensaje']);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO pqr (tipo, nombre, email, telefono, mensaje) 
            VALUES ('$tipo', '$nombre', '$email', '$telefono', '$mensaje')";

    // Ejecuta la consulta SQL
    if ($conexion->query($sql) === TRUE) {
        // Si la consulta se ejecutó correctamente, establece una variable de sesión para indicar que el formulario se envió correctamente
        $_SESSION['form_sent'] = true;

        // Redirige de vuelta a ayuda.php
        header("Location: ayuda.php");
        exit;
    } else {
        // Si hubo un error al ejecutar la consulta, muestra un mensaje de error
        echo "Error al enviar el PQR: " . $conexion->error;
    }
}

// Cierra la conexión a la base de datos
$conexion->close();
?>
