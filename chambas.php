<?php
// Iniciamos la sesión
session_start();

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no ha iniciado sesión, muestra que es una obligacion
    header("Location: obligacion.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Chambas | Chambea pues</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/x-icon" href="./assets/img/faviconcp.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: rgb(226, 226, 226);
        }

        nav {
            position: sticky;
            top: 0;
            bottom: 0;
            height: 100vh;
            left: 0;
            width: 90px;
            /* width: 280px; */
            background: #fff;
            overflow: hidden;
            transition: 1s;
        }

        nav:hover {
            width: 280px;
            transition: 1s;
        }

        .logo {
            text-align: center;
            display: flex;
            margin: 10px 0 0 10px;
            padding-bottom: 3rem;
        }

        .logo img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
        }

        .logo span {
            font-weight: bold;
            padding-left: 15px;
            font-size: 18px;
            text-transform: uppercase;
        }

        a {
            position: relative;
            width: 280px;
            font-size: 14px;
            color: rgb(85, 83, 83);
            display: table;
            padding: 10px;
        }

        nav .fas {
            position: relative;
            width: 70px;
            height: 40px;
            top: 20px;
            font-size: 20px;
            text-align: center;
        }

        .nav-item {
            position: relative;
            top: 17px;
            margin-left: 10px;
        }

        a:hover {
            background: #eee;
        }

        a:hover i {
            color: #34AF6D;
            transition: 0.5s;
        }

        .logout {
            position: absolute;
            bottom: 0;
        }

        .container {
            display: flex;
        }

        /* MAin Section */
        .main {
            position: relative;
            padding: 20px;
            width: 100%;
        }

        .main-top {
            display: flex;
            width: 100%;
        }

        .main-top i {
            position: absolute;
            right: 0;
            margin: 10px 30px;
            color: rgb(110, 109, 109);
            cursor: pointer;
        }

        h1 {
            margin: 20px;
        }
    </style>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
</head>
<style>
        h2 {
            color: #4CAF50;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        .job-card {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
        }
        .job-details {
            margin-bottom: 10px;
        }
        .job-details h3 {
            color: #333;
            margin-bottom: 5px;
        }
        .job-details p {
            margin: 5px 0;
        }
        .button-container {
            text-align: right;
        }
        .button-container a {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            margin-left: 5px;
        }
        .button-container a:hover {
            background-color: #45a049;
        }
        form {
            display: inline-block;
        }
        form button {
            background-color: #f44336;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        form button:hover {
            background-color: #d32f2f;
        }
    </style>
</style>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="" class="logo">
                        <img src="assets/logo chambea pues.png">
                        <span class="nav-item"><?php echo $_SESSION['nombre']?></span>
                    </a></li>
                <li><a href="inicio.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Inicio</span>
                    </a></li>
                <li><a href="perfil.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Perfil</span>
                    </a></li>
                <li><a href="chambas.php" style="color: #34AF6D;">
                        <i class="fas fa-user-plus"></i>
                        <span class="nav-item">Chambas</span>
                    </a></li>
                <li><a href="publicar.php">
                        <i class="fas fa-newspaper"></i>
                        <span class="nav-item">Publicar chamba</span>
                    </a></li>
                <li><a href="configracion.php">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Configuracion</span>
                    </a></li>

                <li><a href="ayuda.php">
                        <i class="fas fa-question"></i>
                        <span class="nav-item">Ayuda</span>
                    </a></li>

                <li><a href="cerrar.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Cerrar sesion</span>
                    </a></li>
            </ul>
        </nav>


        <section class="main">
            <div class="main-top">
                <h1>Chambas Recientes</h1>
            </div>
            <?php
// Conexión a la base de datos (reemplaza con tus propios detalles de conexión)
include("config/conexion.php");

$user_id = $_SESSION['user_id'];

// Consulta SQL para obtener los trabajos del usuario actual
$sql = "SELECT trabajoID, titulo, descripcion, fecha_inicio, fecha_fin, ubicacion, precio FROM trabajos WHERE empleadorID = $user_id";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los trabajos del usuario
    echo "<h2>Tus trabajos publicados:</h2>";
    while($row = $result->fetch_assoc()) {
        // Mostrar cada trabajo con opciones de editar y borrar
        echo "<div class='job-card'>";
        echo "<div class='job-details'>";
        echo "</div>";
        echo "<div class='job-details'>";
        echo "<h2>" . $row['titulo'] . "</h2>";
        echo "<p>" . $row['descripcion'] . "</p>";
        echo "<p>Fecha de inicio: " . $row['fecha_inicio'] . "</p>";
        echo "<p>Fecha de fin: " . $row['fecha_fin'] . "</p>";
        echo "<p>Ubicación: " . $row['ubicacion'] . "</p>";
        echo "<p>Precio: $" . $row['precio'] . "</p>";
        echo "</div>";
        echo "<div class='button-container'>";
        echo "<a href='editar_trabajo.php?trabajoID=" . $row['trabajoID'] . "' class='edit-job-link'>Editar</a>";
        echo "<a href='borrar_trabajo.php?trabajoID=" . $row['trabajoID'] . "' class='delete-job-link'>Borrar</a>";
        echo "</div>";
        echo "</div>";
    }
?>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const deleteLinks = document.querySelectorAll('.delete-job-link');

    deleteLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();

            // Realizar la solicitud AJAX para borrar el trabajo
            $.ajax({
                url: link.href,
                type: 'GET',
                success: function(response) {
                    // Mostrar el modal de confirmación
                    Swal.fire(
                        'Eliminando!',
                        'Tu publicación será eliminada  una vez se cierre esta ventana .',
                        'success'
                    ).then(() => {
                        // Recargar la página para reflejar la eliminación
                        location.reload();
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Mostrar un mensaje de error
                    Swal.fire(
                        'Error!',
                        'Hubo un error al eliminar la publicación: ' + errorThrown,
                        'error'
                    );
                }
            });
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const editLinks = document.querySelectorAll('.edit-job-link');

    editLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();

            // Realiza una solicitud AJAX para obtener el contenido de editar_trabajo.php
            $.ajax({
                url: link.href,
                type: 'GET',
                success: function(data) {
                    Swal.fire({
                        title: 'Editar Trabajo',
                        html: data, // Muestra el contenido de editar_trabajo.php en la modal
                        showCloseButton: true,
                        showConfirmButton: false, // Oculta el botón de confirmación
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus, errorThrown);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Hubo un problema al cargar la página de edición.',
                    });
                }
            });
        });
    });

    const deleteLinks = document.querySelectorAll('.delete-job-link');

    deleteLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();

            Swal.fire({
                icon: 'success',
                title: 'Eliminado!',
                text: 'La oferta de trabajo ha sido eliminada.',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                toast: true,
                position: 'top-end',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        });
    });
});
</script>
<?php

} else {
    echo "<p>No has publicado ningún trabajo.</p>";
}

$conexion->close();
?>

<!--chamabas tomadas -->

<?php
// Obtener el ID del usuario en sesión
$usuario_id = $_SESSION['user_id'];

// Conexión a la base de datos (reemplaza con tus propios detalles de conexión)
include("config/conexion.php");

// Consulta SQL para obtener los trabajos a los que se ha postulado el usuario
$sql = "SELECT t.trabajoID, t.titulo, t.descripcion, t.fecha_inicio, t.fecha_fin, t.ubicacion, t.precio, u.nombre AS nombre_empleador, u.apellido AS apellido_empleador
        FROM trabajos AS t
        INNER JOIN tomar_chamba AS tc ON t.trabajoID = tc.trabajoID
        INNER JOIN usuarios AS u ON t.empleadorID = u.user_id
        WHERE tc.usuarioID = $usuario_id";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los trabajos a los que se ha postulado el usuario
    echo "<h2>Trabajos a los que te has postulado:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='job-card'>";
        echo "<div class='job-details'>";
        echo "</div>";
        echo "<div class='job-details'>";
        echo "<h3>" . $row['titulo'] . "</h3>";
        echo "<p>Empleador: " . $row['nombre_empleador'] . " " . $row['apellido_empleador'] . "</p>";
        echo "<p>" . $row['descripcion'] . "</p>";
        echo "<p>Fecha de inicio: " . $row['fecha_inicio'] . "</p>";
        echo "<p>Fecha de fin: " . $row['fecha_fin'] . "</p>";
        echo "<p>Ubicación: " . $row['ubicacion'] . "</p>";
        echo "<p>Precio: $" . $row['precio'] . "</p>";
        // Formulario para eliminar postulación
        echo "<form class='delete-application-form' action='eliminar_postulacion.php' method='POST'>";
        echo "<input type='hidden' name='trabajo_id' value='" . $row['trabajoID'] . "'>";
        echo "<button class='delete-application-button' type='button'>Eliminar Postulación</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";


        echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete-application-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Una vez eliminada, no podrás recuperar esta postulación!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminando!',
                        text: 'La postulación se eliminara en unos segundos.',
                        showConfirmButton: false,
                        timer:3000,
                        timerProgressBar: true,
                        toast: true,
                        position: 'top-end',
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    }).then(() => {
                        // Envía el formulario después de que se cierre la alerta
                        button.closest('.delete-application-form').submit();
                    });
                }
            });
        });
    });
});
</script>
";


    }
} else {
    echo "<p>No te has postulado a ningún trabajo.</p>";
}

// Cerrar conexión a la base de datos
$conexion->close();
?>


</body>

</html>