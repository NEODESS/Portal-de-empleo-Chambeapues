<?php
// Iniciamos la sesión
session_start();

// Limpiamos todas las variables de sesión
$_SESSION = array();

// Destruimos la sesión
session_destroy();

// Redirigimos al usuario al formulario de inicio de sesión
header("Location: index.html");
exit;
?>
