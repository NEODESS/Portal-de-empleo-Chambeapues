<?php
/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include ("../config/conexion.php");
    $usuarios = "usuarios";


    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $edad = trim($_POST['edad']);
    $correo = trim($_POST['correo']);

    $dirLocal = "fotos_usuario";

    if (isset($_FILES['img'])) {
        $archivoTemporal = $_FILES['img']['tmp_name'];
        $nombreArchivo = $_FILES['img']['name'];

        $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

        // Generar un nombre único y seguro para el archivo
        $nombreArchivo = substr(md5(uniqid(rand())), 0, 10) . "." . $extension;
        $rutaDestino = $dirLocal . '/' . $nombreArchivo;

        // Mover el archivo a la ubicación deseada
        if (move_uploaded_file($archivoTemporal, $rutaDestino)) {

            $sql = "INSERT INTO $usuarios (nombre, apellido, edad, correo, img) 
            VALUES ('$nombre', '$apellido', '$edad', '$correo', '$nombreArchivo')";

            if ($conexion->query($sql) === TRUE) {
                header("location:../");
            } else {
                echo "Error al crear el registro: " . $conexion->error;
            }
        } else {
            echo json_encode(array('error' => 'Error al mover el archivo'));
        }
    } else {
        echo json_encode(array('error' => 'No se ha enviado ningún archivo o ha ocurrido un error al cargar el archivo'));
    }
}

/**
 * Función para obtener todos los empleados 
 */

function obtenerusuario($conexion)
{
    $sql = "SELECT * FROM usuarios ORDER BY user_id ASC";
    $resultado = $conexion->query($sql);
    if (!$resultado) {
        return false;
    }
    return $resultado;
}
