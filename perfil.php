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

        .container-perfil {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            color: #333;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            max-width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: block;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .profile-info {
            text-align: center;
        }
        .profile-info h1 {
            margin: 0;
            font-size: 32px;
            color: #34AF6D; /* Color de acento */
        }
        .profile-info p {
            margin: 5px 0;
            font-size: 18px;
            color: #666;
        }
        .profile-info .label {
            font-weight: bold;
            color: #444;
        }
    </style>
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
                <li><a href="perfil.php" style="color: #34AF6D;">
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
                <h1>Hoja de vida</h1>
            </div>
            <div class="container-perfil">
        <img src="assets/imgs/sin-foto.png" alt="Foto de perfil" class="profile-img">
        <div class="profile-info">
            <h1><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h1>
            <p class="label">Edad:</p>
            <p><?php echo $_SESSION['edad'];?> años</p>
            <p class="label">Correo:</p>
            <p><?php echo $_SESSION['correo']; ?></p>
            <p class="label">Fecha de Registro:</p>
            <p><?php echo $_SESSION['fecha_registro'];?></p>
        </div>
    </div>
</body>

</html>