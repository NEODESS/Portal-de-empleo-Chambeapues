<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/img/faviconcp.png" />
    <title>iniciar seseión | Chambea pues</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px 0 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            color: #ffffff;
            background-color: #14a800;
            cursor: pointer;
            font-size: 16px;
        }

        .login-container button.google {
            background-color: #4285F4;
        }

        .login-container .signup-link {
            margin-top: 10px;
        }

        .login-container .signup-link a {
            color: #14a800;
            text-decoration: none;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            text-align: center;
            width: 100%;
        }

        .footer p {
            color: #666;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Iniciar a Chambear</h2>
        <form action="login_procesar.php" method="post">
            <input type="email" name="correo" id="correo" placeholder="Correo">
            <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña">
            <button type="submit" name="btn" id="btn">Continuar</button>
            <p>o</p>
        </form>
        <a href="desarrollo.html"><button class="google" href="registro.php">Continuar con Google</button></a>
        <div class="signup-link">
            <p>No tienes cuenta? <a href="registro.php">Registrarse</a></p>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 - 2024 Chambea pues® Global Inc. - <a href="./Terminos/index.html">Politica y privacidad</a></p>
    </div>
    <?php
// Verificamos si hay un mensaje de error
if (isset($_GET['error']) && $_GET['error'] === 'credenciales_invalidas') {
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Correo o contraseña no válidos',
            footer: 'Verifica que la informacion este bien dijitada',
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
    </script>
    <?php
}
?>
</body>

</html>