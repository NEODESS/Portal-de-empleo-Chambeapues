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
    <title>Inicio | Chambea pues</title>
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

        button {
            background-color: #4CAF50;
            /* Color de fondo verde */
            border: none;
            /* Sin borde */
            color: white;
            /* Color de texto blanco */
            padding: 10px 20px;
            /* Espacio interno */
            text-align: center;
            /* Alineación del texto al centro */
            text-decoration: none;
            /* Sin decoración de texto */
            display: inline-block;
            /* Mostrar como elemento en línea */
            font-size: 16px;
            /* Tamaño de fuente */
            margin-top: auto;
            /* Margen superior automático para alinear en la parte inferior */
            cursor: pointer;
            /* Cursor de puntero */
            border-radius: 5px;
            /* Bordes redondeados */
        }


        .job-card {
            background-color: #ffffff;
            /* Fondo blanco */
            border-radius: 10px;
            /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
            padding: 10px;
            /* Espacio interno */
            margin-bottom: 20px;
            /* Margen inferior */
            display: flex;
            /* Mostrar en fila */
            flex-direction: row;
            align-items: center;
            /* Alinear los elementos en el eje Y */

        }

        .job-details img {
            width: 100px;
            /* Ancho de la imagen */
            height: auto;
            /* Altura automática */
            margin-right: 20px;
            /* Margen derecho */
        }

        .job-details h2 p {
            margin-top: 0;
            /* Eliminar margen superior */
        }

        .job-details h2 p {
            margin: 5px 0;
            /* Margen superior e inferior */
        }

        .button-container {
            flex-grow: 1;
            /* El contenido crece para llenar el espacio */
            display: flex;
            /* Mostrar en fila */
            justify-content: flex-end;
            /* Alinear al final */
            align-content: center
        }

        .button-container button {
            background-color: #4CAF50;
            /* Color de fondo verde */
            border: none;
            /* Sin borde */
            color: white;
            /* Color de texto blanco */
            padding: 10px 20px;
            /* Espacio interno */
            text-align: center;
            /* Alineación del texto al centro */
            text-decoration: none;
            /* Sin decoración de texto */
            display: inline-block;
            /* Mostrar como elemento en línea */
            font-size: 16px;
            /* Tamaño de fuente */
            margin-top: auto;
            /* Margen superior automático para alinear en la parte inferior */
            cursor: pointer;
            /* Cursor de puntero */
            border-radius: 5px;
            /* Bordes redondeados */
        }

        .button-container button:hover {
            background-color: #45a049;
            /* Color de fondo más oscuro al pasar el mouse */
        }

        .search-filters {
            margin-bottom: 20px;
        }

        .search-filters input[type="text"] {
            padding: 8px;
            width: 200px;
        }

        .search-filters button {
            padding: 8px 12px;
            background-color: #45a049;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="" class="logo">
                        <img src="assets/logo chambea pues.png">
                        <span class="nav-item">
                            <?php echo $_SESSION['nombre']?>
                        </span>
                    </a></li>
                <li><a href="inicio.php">
                        <i class="fas fa-home" style="color: #34AF6D;"></i>
                        <span class="nav-item">Inicio</span>
                    </a></li>
                <li><a href="perfil.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Perfil</span>
                    </a></li>
                <li><a href="chambas.php">
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
            <h1>Encontrar chamba</h1>
</div>
<div class="search-filters">
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="search" placeholder="Buscar...">
        <!-- Aquí podrías agregar más campos de filtro si los necesitas -->
        <button type="submit">Buscar</button>
    </form>
</div>
<!--buscador -->
<?php
// Incluir el archivo de configuración de la conexión a la base de datos
include("config/conexion.php");

// Verificar si se ha enviado un parámetro de búsqueda
if (isset($_GET['search']) && !empty($_GET['search'])) {
    // Sanitizar y escapar el parámetro de búsqueda para evitar inyecciones SQL
    $search = $conexion->real_escape_string($_GET['search']);
    
    // Construir la consulta SQL con la condición de búsqueda
    $sql = "SELECT t.trabajoID, t.foto, t.titulo, t.descripcion, t.fecha_inicio, t.fecha_fin, t.ubicacion, t.precio, t.empleadorID, u.nombre AS nombre_empleador, u.apellido AS apellido_empleador
            FROM trabajos AS t
            INNER JOIN usuarios AS u ON t.empleadorID = u.user_id
            WHERE t.titulo LIKE '%$search%' OR t.descripcion LIKE '%$search%'";
    
    // Ejecutar la consulta
    $result = $conexion->query($sql);
    
    // Mostrar resultados y demás código de visualización
    if ($result->num_rows > 0) {
        // Mostrar el número de trabajos encontrados
        echo "<p>Se encontraron (" . $result->num_rows . ") chambas disponibles para ti</p>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Generar el contenedor HTML para cada fila de la base de datos
            echo "<div class='job-card'>";
            echo "<div class='job-details'>";
            echo "<img src='acciones/foto_trabajo/icono.png' alt=''>";
            echo "</div>";
            echo "<div class='job-details'>";
            echo "<h2>" . $row['titulo'] . "</h2>";
            echo "<p>Empleador: " . $row['nombre_empleador'] . " " . $row['apellido_empleador'] . "</p>";
            echo "<p>" . $row['descripcion'] . "</p>";
            echo "<p>Fecha de inicio: " . $row['fecha_inicio'] . "</p>";
            echo "<p>Fecha de fin: " . $row['fecha_fin'] . "</p>";
            echo "<p>Ubicación: " . $row['ubicacion'] . "</p>";
            echo "<p>Precio: $" . $row['precio'] . "</p>";
            // Botón de postularse con formulario para enviar los datos
            echo "<form action='tomar_chamba.php' method='POST'>";
            echo "<input type='hidden' name='trabajo_id' value='" . $row['trabajoID'] . "'>";
            // Aquí verificamos si el usuario ya se ha postulado a este trabajo
            // Si es así, agregamos la clase 'postulado' al botón
            $sql_check = "SELECT * FROM tomar_chamba WHERE trabajoID = " . $row['trabajoID'] . " AND usuarioID = " . $_SESSION['user_id'];
            $result_check = $conexion->query($sql_check);
            if ($result_check->num_rows > 0) {
                // El usuario ya se ha postulado al trabajo, así que no mostramos el botón
                echo "<button type='submit' id='postularse-button' style='display: none'>Postularse</button>";
            } else {
                // El usuario no se ha postulado al trabajo, así que mostramos el botón
                echo "<button type='submit' id='postularse-button'>Postularse</button>";
            }
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No se encontraron trabajos disponibles.</p>";
    }
} else {
    // Consulta SQL para obtener todos los trabajos con los datos del empleador
    $sql = "SELECT t.trabajoID, t.foto, t.titulo, t.descripcion, t.fecha_inicio, t.fecha_fin, t.ubicacion, t.precio, t.empleadorID, u.nombre AS nombre_empleador, u.apellido AS apellido_empleador
            FROM trabajos AS t
            INNER JOIN usuarios AS u ON t.empleadorID = u.user_id";
    
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar el número de trabajos encontrados
        echo "<p>Se encontraron (" . $result->num_rows . ") chambas disponibles para ti</p>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Generar el contenedor HTML para cada fila de la base de datos
            echo "<div class='job-card'>";
            echo "<div class='job-details'>";
            echo "<img src='acciones/foto_trabajo/icono.png' alt=''>";
            echo "</div>";
            echo "<div class='job-details'>";
            echo "<h2>" . $row['titulo'] . "</h2>";
            echo "<p>Empleador: " . $row['nombre_empleador'] . " " . $row['apellido_empleador'] . "</p>";
            echo "<p>" . $row['descripcion'] . "</p>";
            echo "<p>Fecha de inicio: " . $row['fecha_inicio'] . "</p>";
            echo "<p>Fecha de fin: " . $row['fecha_fin'] . "</p>";
            echo "<p>Ubicación: " . $row['ubicacion'] . "</p>";
            echo "<p>Precio: $" . $row['precio'] . "</p>";
            // Botón de postularse con formulario para enviar los datos
            echo "<form action='tomar_chamba.php' method='POST'>";
            echo "<input type='hidden' name='trabajo_id' value='" . $row['trabajoID'] . "'>";
            // Aquí verificamos si el usuario ya se ha postulado a este trabajo
            // Si es así, agregamos la clase 'postulado' al botón
            $sql_check = "SELECT * FROM tomar_chamba WHERE trabajoID = " . $row['trabajoID'] . " AND usuarioID = " . $_SESSION['user_id'];
            $result_check = $conexion->query($sql_check);
            if ($result_check->num_rows > 0) {
                // El usuario ya se ha postulado al trabajo, así que no mostramos el botón
                echo "<button type='submit' id='postularse-button' style='display: none'>Postularse</button>";
            } else {
                // El usuario no se ha postulado al trabajo, así que mostramos el botón
                echo "<button type='submit' id='postularse-button'>Postularse</button>";
            }
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No se encontraron trabajos disponibles.</p>";
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var message = "<?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?>";

        if (message === "Te has postulado exitosamente para este trabajo.") {
            Swal.fire({
                icon: 'success',
                title: 'Felicidades!',
                text: 'Te postulaste correctamente',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                toast: true,
                position: 'top-end',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        }

        // Limpia el mensaje de la sesión para que no se muestre en futuras recargas de la página
        <?php unset($_SESSION['message']); ?>;
    });

    // Selecciona el botón
    var btn = document
</script>

</body>
</html>