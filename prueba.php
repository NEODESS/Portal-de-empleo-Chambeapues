<?php
session_start();
include ("config/conexion.php");

if (!isset($_SESSION['user_id'])) {
    echo "No estás autenticado.";
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT nombre, apellido, correo, edad FROM usuarios WHERE user_id = $user_id";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "Error al obtener los datos del usuario.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        .hidden {
            display: none;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
        }

        .input-wrapper input,
        .input-wrapper select {
            flex: 1;
        }
    </style>
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
</head>

<body>
    <div class="main-content">
        <div class="info-container">
            <!-- Dentro de <div class="info-container"> -->
            <div class="change-password">
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
                    <button type="submit" class="btn btn-primary mt-3">Guardar Contraseña</button>
                </form>
            </div>
            <form action="editdatos.php" method="post">
                <h2>Datos Personales</h2>
                <div class="setting">
                    <label for="nombre">Nombre</label>
                    <div class="input-wrapper">
                        <input type="text" id="nombre" name="nombre" placeholder="Introduzca su nombre"
                            value="<?php echo $user_data['nombre']; ?>" class="hidden">
                        <i class="bi bi-pencil-fill" onclick="toggleField('nombre')"></i>
                    </div>
                    <label for="apellido">Apellido</label>
                    <div class="input-wrapper">
                        <input type="text" id="apellido" name="apellido" placeholder="Introduzca su apellido"
                            value="<?php echo $user_data['apellido']; ?>" class="hidden">
                        <i class="bi bi-pencil-fill" onclick="toggleField('apellido')"></i>

                    </div>
                    <div class="setting">
                        <label for="correo">Correo</label>
                        <div class="input-wrapper">
                            <input type="email" id="correo" name="correo" placeholder="Introduce tu correo electrónico"
                                value="<?php echo $user_data['correo']; ?>" class="hidden">
                            <i class="bi bi-pencil-fill" onclick="toggleField('correo')"></i>
                        </div>
                    </div>
                    <div class="setting">
                        <label for="edad">Edad</label>
                        <div class="input-wrapper">
                            <select id="edad" name="edad" class="hidden">
                                <option value="">Seleccione</option>
                                <?php
                                for ($i = 18; $i <= 50; $i++) {
                                    $selected = ($i == $user_data['edad']) ? 'selected' : '';
                                    echo "<option value='$i' $selected>$i</option>";
                                }
                                ?>
                            </select>
                            <i class="bi bi-pencil-fill" onclick="toggleField('edad')"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
            </form>
        </div>
    </div>
</body>

</html>