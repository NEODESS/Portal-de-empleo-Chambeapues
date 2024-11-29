<?php
// Iniciamos la sesión
session_start();

// Verificamos si se enviaron datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificamos si se enviaron datos de correo y contraseña
    if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
        // Establecemos la conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "admin", "chambeapues");

        // Verificamos la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Sanitizamos las entradas de usuario para evitar inyección de SQL
        $correo = $conexion->real_escape_string($_POST['correo']);
        $contrasena = $conexion->real_escape_string($_POST['contrasena']);

        // Consulta SQL para verificar las credenciales y obtener información adicional del usuario
        $consulta = "SELECT user_id, nombre, apellido, edades, correo, fecha_registro FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";

        // Ejecutamos la consulta
        $resultado = $conexion->query($consulta);

        // Verificamos si se encontró un usuario con las credenciales proporcionadas
        if ($resultado->num_rows == 1) {
            // Obtenemos los datos del usuario
            $usuario = $resultado->fetch_assoc();

            // Credenciales válidas, iniciamos la sesión y almacenamos los datos del usuario en la sesión
            $_SESSION['user_id'] = $usuario['user_id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['apellido'] = $usuario['apellido'];
            $_SESSION['edad'] = $usuario['edad'];
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['fecha_registro'] = $usuario['fecha_registro'];

            // Cerramos la conexión
            $conexion->close();

            // Redirigimos al usuario a una página de bienvenida
            header("Location: inicio.php");
            exit;
        } else {
            // Credenciales no válidas, redirigimos al usuario de vuelta al formulario de inicio de sesión con un mensaje de error
            header("Location: login.php?error=credenciales_invalidas");
            exit;
        }


    }
}

// Si se intenta acceder a este archivo directamente sin enviar datos, redirigimos al formulario de inicio de sesión
header("Location: index.html");
exit;
?>
