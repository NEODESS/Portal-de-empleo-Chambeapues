<?php
// Verificar sesión o autenticación del usuario
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirigir o mostrar mensaje de error si el usuario no está autenticado
    echo "No estás autenticado.";
    exit;
}

// Obtener el ID del trabajo a editar desde la URL
if (isset($_GET['trabajoID'])) {
    $trabajo_id = $_GET['trabajoID'];

    // Conexión a la base de datos (reemplaza con tus propios detalles de conexión)
    include("config/conexion.php");

    // Consulta SQL para obtener los datos del trabajo con el ID específico
    $sql = "SELECT * FROM trabajos WHERE trabajoID = $trabajo_id AND empleadorID = {$_SESSION['user_id']}";
    $result = $conexion->query($sql);

    if ($result->num_rows == 1) {
        // Obtener los datos del trabajo
        $row = $result->fetch_assoc();
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
        $fecha_inicio = $row['fecha_inicio'];
        $fecha_fin = $row['fecha_fin'];
        $ubicacion = $row['ubicacion'];
        $precio = $row['precio'];
        // Aquí puedes implementar el formulario de edición
?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Editar Trabajo</title>
            <!-- Aquí puedes incluir tus estilos CSS -->
            <style>
    body {
        font-family: Arial, sans-serif;
    }
    .form-container input[type=text], .form-container input[type=date], .form-container input[type=number], .form-container textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
    .form-container button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    .form-container button:hover {
        background-color: #45a049;
    }
</style>
<div class="form-container">
    <form action="actualizar_trabajo.php" method="POST">
        <input type="hidden" name="trabajo_id" value="<?php echo $trabajo_id; ?>">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" required>
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" required><?php echo $descripcion; ?></textarea>
                    <label for="fecha_inicio">Fecha de inicio:</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>" required>
                    <label for="fecha_fin">Fecha de fin:</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $fecha_fin; ?>" required>
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" value="<?php echo $ubicacion; ?>" required>
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" value="<?php echo $precio; ?>" required>
                    <button type="submit">Guardar Cambios</button>
                </form>
            </div>
            
        </body>
        </html>
<?php
    } else {
        echo "No se encontró el trabajo específico para editar.";
    }

    // Cerrar conexión a la base de datos
    $conexion->close();

} else {
    echo "ID de trabajo no especificado.";
}
?>
