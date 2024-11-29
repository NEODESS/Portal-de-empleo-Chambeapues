<?php
// Iniciamos la sesión
session_start();
include ("config/conexion.php");

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no ha iniciado sesión, muestra que es una obligacion
    header("Location: obligacion.html");
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT nombre, apellido, correo, edades FROM usuarios WHERE user_id = $user_id";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "Error al obtener los datos del usuario.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Configuracion | Chambea pues</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/x-icon" href="./assets/img/faviconcp.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- SweetAlert2 desde un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

        .main-content {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .info-container,
        .password-container,
        .account-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            min-width: 300px;
        }

        .info-container h2,
        .password-container h2,
        .account-container h2 {
            margin-bottom: 20px;
        }

        .setting {
            margin-bottom: 20px;
        }

        .setting label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: calc(100% - 30px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-wrapper select {
            width: calc(100% - 30px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-wrapper button {
            background: #34AF6D;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .input-wrapper i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .toggle-icon {
            font-size: 24px;
            cursor: pointer;
        }

        .button-wrapper {
            margin-top: 20px;
            text-align: center;
        }

        button {
            background: #34AF6D;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<script>
    function toggleField(id) {
        var input = document.getElementById(id);
        if (input.classList.contains('hidden')) {
            input.classList.remove('hidden');
        } else {
            input.classList.add('hidden');
        }
    }
</script>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="" class="logo">
                        <img src="assets/logo chambea pues.png">
                        <span class="nav-item">
                            <?php echo $_SESSION['nombre'] ?>
                        </span>
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
                <li><a href="publicar.php">
                        <i class="fas fa-newspaper"></i>
                        <span class="nav-item">Publicar chamba</span>
                    </a></li>
                <li><a href="configracion.php" style="color: #34AF6D;">
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
                <h1>Ajustes</h1>
            </div>

            <div class="main-content">
                <div class="info-container">
                    <form id="userConfigForm" action="editdatos.php" method="post">
    <h2>Datos Personales</h2>
    <div class="setting">
        <label for="nombre">Nombre</label>
        <div class="input-wrapper">
            <input type="text" id="nombre" name="nombre" placeholder="Introduzca su nombre"
                value="<?php echo $user_data['nombre']; ?>">
        </div>
        <label for="apellido">Apellido</label>
        <div class="input-wrapper">
            <input type="text" id="apellido" name="apellido" placeholder="Introduzca su apellido"
                value="<?php echo $user_data['apellido']; ?>">
        </div>
        <div class="setting">
            <label for="correo">Correo</label>
            <div class="input-wrapper">
                <input type="email" id="correo" name="correo"
                    placeholder="Introduce tu correo electrónico"
                    value="<?php echo $user_data['correo']; ?>">
            </div>
        </div>
        <div class="setting">
            <label for="edad">Edad</label>
            <div class="input-wrapper">
                <select id="edad" name="edad">
                    <option value="">Seleccione</option>
                    <?php
                    for ($i = 18; $i <= 50; $i++) {
                        $selected = ($i == $user_data['edad']) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="button-wrapper">
            <button type="submit" class="save-changes-btn">Guardar Cambios</button>
        </div>
</form>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const saveChangesBtn = document.querySelector('.save-changes-btn');

    if (saveChangesBtn) {
        saveChangesBtn.addEventListener('click', (event) => {
            event.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Los cambios serán guardados.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, guardar cambios!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById("userConfigForm"); // Asegúrate de tener un formulario con este ID
                    let formData = new FormData(form);

                    fetch('editdatos.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire(
                            '¡Cambios Guardados!',
                            'Cierra la sesión e ingresa nuevamente para ver los cambios aplicados.',
                            'success'
                        );
                    });
                }
            });
        });
    } else {
        console.error('Botón de guardar cambios no encontrado');
    }
});
</script>
            </div>
            <!--
            <div class="password-container">
            <form action="cambiar_password.php" method="post">
                <h2>Cambiar Contraseña</h2>
                <div class="setting">
                    <label for="current_password">Contraseña Actual</label>
                    <div class="input-wrapper">
                        <input type="password" id="current_password" name="current_password"
                            placeholder="Contraseña actual" required>
                    </div>
                </div>
                <div class="setting">
                    <label for="new_password">Nueva Contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" id="new_password" name="new_password" placeholder="Nueva contraseña"
                            required>
                    </div>
                </div>
                <div class="setting">
                    <label for="confirm_password">Confirmar Nueva Contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Confirmar nueva contraseña" required>
                    </div>
                </div>
                <div class="button-wrapper">
                    <button type="submit" class="btn btn-primary mt-3">Guardar Contraseña</button>
                </div>
                </form>
            </div>
            -->
        </section>
    </div>
</body>

</html>

</body>

</html>