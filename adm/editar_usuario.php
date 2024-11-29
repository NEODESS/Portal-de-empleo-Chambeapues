<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexion.php';

// Variable para almacenar el mensaje de éxito o error
$message = '';

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $user_id = $_POST['user_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];

    // Consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', edad= '$edad', correo='$correo' WHERE user_id=$user_id";

    if ($conexion->query($sql) === TRUE) {
        // Mensaje de éxito
        $message = "<div class='alert alert-success' role='alert'>Usuario actualizado exitosamente.</div>";
        // Script de JavaScript para redireccionar después de 3 segundos
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'analisis.php';
                }, 3000);
            </script>";
    } else {
        // Mensaje de error
        $message = "<div class='alert alert-danger' role='alert'>Error al actualizar el usuario: " . $conexion->error . "</div>";
    }
}

// Obtener el ID del usuario desde la URL
$user_id = $_GET['id'];

// Consulta SQL para obtener los datos del usuario específico
$sql = "SELECT * FROM usuarios WHERE user_id = $user_id";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../assets/img/faviconcp.png" />
        <title>Edit usuarios</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .container {
                margin-top: 50px;
            }
        </style>
    </head>

    <body>

        <div class="container mt-4">
            <h2>Editar Usuario</h2>
            <?php echo $message; ?> <!-- Mostrar mensaje de éxito o error -->
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $user_id); ?>">
                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido"
                        value="<?php echo $row['apellido']; ?>">
                </div>
                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $row['edad']; ?>">
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control" id="correo" name="correo"
                        value="<?php echo $row['correo']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="analisis.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>

    </body>

    </html>

    <?php
} else {
    // Si no se encuentra el usuario
    echo "<div class='alert alert-danger' role='alert'>Usuario no encontrado.</div>";
}
?>