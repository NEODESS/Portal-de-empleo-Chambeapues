<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
        }
        .success-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Ajusta la altura según tus necesidades */
        }

        .success-message {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px; /* Espacio entre el mensaje y el enlace */
        }

        .back-link {
            font-size: 18px;
            text-decoration: none;
            color: blue; /* Color del enlace */
        }

        .back-link:hover {
            text-decoration: underline; /* Efecto de subrayado al pasar el mouse */
        }

        .error-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh; /* Ajusta la altura según tus necesidades */
        }

        .error-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px; /* Espacio entre la imagen y el mensaje */
        }

        .error-message {
            font-size: 20px;
            text-align: center;
            margin-bottom: 20px; /* Espacio entre el mensaje y el enlace */
        }

        .back-link {
            font-size: 16px;
            text-decoration: none;
            color: blue; /* Color del enlace */
        }

        .back-link:hover {
            text-decoration: underline; /* Efecto de subrayado al pasar el mouse */
        }
    </style>
</body>
</html>
<?php
include '../config/conexion.php';

// Obtener el ID del usuario desde la URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    try {
        // Consulta SQL para borrar el usuario específico
        $sql = "DELETE FROM usuarios WHERE user_id = $user_id";

        if ($conexion->query($sql) === TRUE) {
            echo "<div class='success-container'>";
            echo "<p class='success-message'>Usuario borrado exitosamente.</p>";
            echo "<p><a href='javascript:history.back()' class='back-link'>Volver a la página anterior</a></p>";
            echo "</div>";

        } else {
            echo "<div style='text-align: center;'>";
            echo "<img src='.../assets/meme/foto4.jpeg' alt='Error'>";
            echo "<p style='font-size: 18px;'>Error al borrar el usuario.</p>";
            echo "<p><a href='javascript:history.back()'>Volver a la página anterior</a></p>";
            echo "</div>";            
        }
    } catch (mysqli_sql_exception $e) {
        // Capturar la excepción de MySQL
        echo "<div style='text-align: center;'>";
        echo "<img src='../assets/meme/foto4.jpeg' alt='Error'>";
        echo "<p style='font-size: 18px;'>No puedes borrar este usuario.</p>";
        echo "<p>No puedes borrar un usuario que tiene una publicacion o una postulacion</p>";
        echo "<p><a href='javascript:history.back()'>Volver a la página anterior</a></p>";
        echo "</div>";
    }
} else {
    echo "<div class='error-container'>";
    echo "<p class='error-message'>ID de usuario no proporcionado.</p>";
    echo "<p><a href='javascript:history.back()' class='back-link'>Volver a la página anterior</a></p>";
    echo "</div>";

}
?>
