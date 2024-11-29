<?php
session_start();

//credenciales de acceso a la base datos

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'admin';
$DATABASE_NAME = 'chambeapues';

// conexion a la base de datos
$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {

    // si se encuentra error en la conexión
    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

// Se valida si se ha enviado información, con la función isset()
if (!isset($_POST['username'], $_POST['username'])) {

    // si no hay datos muestra error y re direccionar
    header('Location: index.html');
    exit();
}

// evitar inyección sql

if ($stmt = $conexion->prepare('SELECT admid, username FROM admin WHERE username = ?')) {

    // parámetros de enlace de la cadenas
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
}
// aca se valida si lo ingresado coincide con la base de datos 
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($admid, $username);
    $stmt->fetch();

    if ($_POST['username'] === $username) {

        // Si coincide se inicia la sesión
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['admid'] = $admid;
            header('Location: analisis.php');
            exit(); // Termina el script después de la redirección
        } else {
            // Contraseña incorrecta
            header('Location: index.html');
            exit(); // Termina el script después de la redirección
        }
    } else {
        // Usuario incorrecto
        header('Location: index.html');
        exit();
}


?>
