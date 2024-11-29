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
    <title>Perfil | Chambea pues</title>
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

        .container-publicar {
            padding: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        h2 {
            color: #34AF6D;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        textarea,
        input[type="date"],
        input[type="file"],
        input[type="submit"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #34AF6D;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #258e55;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

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
                <li><a href="chambas.php">
                        <i class="fas fa-user-plus"></i>
                        <span class="nav-item">Chambas</span>
                    </a></li>
                <li><a href="publicar.php" style="color: #34AF6D;">
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
            </div>
            <div class="container-publicar">
            <form action="config/publicar.php" method="post">
                    <h2>Publicar chamba</h2>
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required>

                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" required>

                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" required>

                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" required>

                    <label for="precio">Precio en COP:</label>
                    <input type="number" name="precio" step="1000" min="0" required>

                    <input type="submit" value="Enviar">
                </form>

            </div>
        
<script>
    $(document).ready(function(){
        $("form").on("submit", function(e){
            e.preventDefault();
            var form = this;
            Swal.fire({
                icon: 'success',
                title: 'Publicando!',
                text: 'El trabajo se publicará en unos segundos.',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                toast: true,
                position: 'top-end',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            }).then(function(result) {
                if (result.dismiss === Swal.DismissReason.timer) {
                    form.submit();
                }
            });
        });
    });
</script>

</body>


</html>