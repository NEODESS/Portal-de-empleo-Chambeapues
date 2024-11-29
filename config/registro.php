<?php
include ("config/conexion.php");

if (isset($_POST['registro'])) {
    // Verificar que todos los campos del formulario estén llenos
    if (
        !empty($_POST['nombre']) &&
        !empty($_POST['apellido']) &&
        !empty($_POST['edad']) &&
        !empty($_POST['correo']) &&
        !empty($_POST['contrasena'])
    ) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $fecha = date('Y-m-d H:i:s');

        // Verificar si el correo ya está registrado
        $consulta_correo = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resultado_correo = mysqli_query($conexion, $consulta_correo);

        if (mysqli_num_rows($resultado_correo) == 0) {
            // El correo no está registrado, procede con la inserción
            $consulta = "INSERT INTO usuarios(nombre, apellido, edad, correo, contrasena, fecha_registro)
                VALUES ('$nombre', '$apellido', '$edad', '$correo', '$contrasena', '$fecha')";
            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
                // Mostrar alerta de éxito
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Se creó su cuenta!',
                        text: 'Se creó una cuenta de manera exitosa',
                        footer: 'Ya puedes ingresar a tu cuenta',
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
            } else {
                // Mostrar alerta de error en la inserción
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Error en la creación!',
                        text: 'Hubo un problema al crear la cuenta',
                        footer: 'Por favor, inténtalo de nuevo más tarde',
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
        } else {
            // Mostrar alerta de correo ya registrado
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Error en la creación!',
                    text: 'El correo ya está registrado',
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
    } else {
        // Mostrar alerta de campos incompletos
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Error en la creación!',
                text: 'Todos los campos deben ser completados',
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
}
?>