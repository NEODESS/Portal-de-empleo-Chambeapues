<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse | Chambea pues</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/faviconcp.png" />
    <script src="https://kit.fontawesome.com/49efdcaeae.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
        }

        .container {
            text-align: center;
        }

        .hidden {
            display: none;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .options {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .option {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 200px;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .option:hover {
            transform: scale(1.05);
            border: solid 1px #4CAF50;
        }

        .option input {
            display: none;
        }

        input[type="radio"]:checked+label {
            color: #3f9742;
        }


        .option label {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }

        .icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .text {
            font-size: 16px;
        }

        .create-account {
            background-color: #e0e0e0;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: not-allowed;
            align-items: center;
        }

        .create-account:enabled {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .login {
            margin-top: 10px;
        }

        .login a {
            color: #4CAF50;
            text-decoration: none;
        }

        .login a:hover {
            text-decoration: underline;
        }

        #signup-form {
            max-width: 400px;
            margin: 0 auto;
            text-align: left;
        }

        .social-login {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .google {
            background-color: #4285F4;
            color: #fff;
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .separator span {
            flex-grow: 1;
            border-bottom: 1px solid #ccc;
        }

        .separator span::before {
            content: " ";
            display: inline-block;
            width: 20px;
            margin-right: 10px;
        }

        .separator span::after {
            content: " ";
            display: inline-block;
            width: 20px;
            margin-left: 10px;
        }

        .input-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        input,
        select {
            width: 100%;
            padding: 10px 0;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .checkbox-group input {
            margin-right: 10px;
        }

        a {
            text-decoration: none;
        }

        .checkbox-group a {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    include ("config/registro.php");
    ?>
    <div class="container">
        <div id="initial-form">
            <h1>Unete a nuetro equipo</h1>
            <div class="options">
                <div class="option">
                    <input type="radio" id="client" name="role">
                    <label for="client">
                        <div class="icon">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="text">Encontrar gente berraca</div>
                    </label>
                </div>
                <div class="option">
                    <input type="radio" id="freelancer" name="role">
                    <label for="freelancer">
                        <div class="icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="text">Encontrar chamba</div>
                    </label>
                </div>
            </div>
            <button class="create-account" disabled>Crear cuenta</button>
            <div class="login">
                <p>Ya Tienes una cuenta? <a href="login.php">Ingresar aqui</a></p>
            </div>
        </div>

        <div id="signup-form" class="hidden">
            <h1>Registro </h1>
            <a href="desarrollo.html"><button class="social-login google">Continua con Google</button></a>
            <div class="separator"><span>o</span></div>
            <form method="post">
                <div class="input-group">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombres">
                    <input type="text" id="apellido" name="apellido" placeholder="Apelidos">
                </div>
                <input type="email" id="correo" name="correo" placeholder="Correo">
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña (8 o mas caracteres)">
                <select id="edad" name="edad">
                    <option value=""> Seleccione </option>
                    <?php
                    for ($i = 18; $i <= 70; $i++) {
                        echo "<option value='$i'>$i</option>";
                    } ?>
                </select>
                <div class="checkbox-group">
                    <input type="checkbox" id="email-opt-in" name="email-opt-in">
                    <label for="email-opt-in">
                        Envíenme correos electrónicos útiles para encontrar trabajos gratificantes y oportunidades de
                        empleo, promociones, actualizaciones.</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms">
                    <label for="terms">Sí, entiendo y acepto los<a href="./Terminos/index.html"> Términos de servicio de
                            Chambea pues</a>,
                        incluido el<a href="./Terminos/index.html"> Acuerdo de usuario</a>
                        y <a href="./Terminos/index.html">la Política de privacidad .</a>.</label>
                </div>

                <div class="login">
                    <button class="create-account" type="submit" name="registro">Crear cuenta</button>
                    <p>Ya Tienes una cuenta? <a href="login.php">Ingresar aqui</a></p>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const options = document.querySelectorAll('.option input');
            const createAccountButton = document.querySelector('.create-account');
            const initialForm = document.getElementById('initial-form');
            const signupForm = document.getElementById('signup-form');

            options.forEach(option => {
                option.addEventListener('change', () => {
                    createAccountButton.disabled = false;
                });
            });

            createAccountButton.addEventListener('click', () => {
                initialForm.classList.add('hidden');
                signupForm.classList.remove('hidden');
            });
        });

    </script>
</body>

</html>