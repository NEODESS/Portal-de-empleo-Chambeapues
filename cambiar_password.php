<?php
session_start();
include("config/conexion.php");

if (!isset($_SESSION['user_id'])) {
    echo "No estás autenticado.";
    exit;
}

$user_id = $_SESSION['user_id'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Obtener la contraseña actual de la base de datos
$sql = "SELECT contrasena FROM usuarios WHERE user_id = $user_id";
$result = $conexion->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stored_password = $row['contrasena'];
    
    // Verificar la contraseña actual
    if (password_verify($current_password, $stored_password)) {
        // Las contraseñas coinciden, proceder a cambiar la contraseña
        if ($new_password === $confirm_password) {
            // Hash de la nueva contraseña
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            // Actualizar la contraseña en la base de datos
            $update_sql = "UPDATE usuarios SET contrasena = '$hashed_password' WHERE user_id = $user_id";
            if ($conexion->query($update_sql) === TRUE) {
                echo "Contraseña actualizada correctamente.";
            } else {
                echo "Error al actualizar la contraseña: " . $conexion->error;
            }
        } else {
            echo "Las nuevas contraseñas no coinciden.";
        }
    } else {
        echo "La contraseña actual es incorrecta.";
    }
} else {
    echo "Error al verificar la contraseña actual.";
}

$conexion->close();
?>
