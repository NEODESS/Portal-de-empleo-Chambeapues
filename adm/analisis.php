<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Chambas | Chambea pues</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.5" />
    <link rel="icon" type="image/x-icon" href="../assets/img/faviconcp.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="./css/barnav.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>
    <div class="container">

        <nav>
            <ul>
                <li><a href="" class="logo">
                        <img src="../assets/logo chambea pues.png">
                        <span class="nav-item"><?php echo $_SESSION['name']?></span>
                    </a></li>
                <li><a href="analisis.php" style="color: #34AF6D;">
                        <i class="fas fa-database"></i>
                        <span class="nav-item">Análisis</span>
                    </a></li>
                <li><a href="pqr.php">
                        <i class="fas fa-comment"></i>
                        <span class="nav-item">PQR</span>
                    </a></li>

                <li><a href="Cerrar-sesion.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item"></span>
                    </a></li>
            </ul>
        </nav>


        <section class="main">
            <div class="main-top">
                <?php
                include("../config/conexion.php");
                include("acciones/acciones.php");

                $usuarios = obtenerusuario($conexion); // Cambiado de $usuario a $usuarios para evitar conflicto de nombres
                $totalusuarios = $usuarios->num_rows;
                ?>
                <h1>Usuarios (
                    <?php echo $totalusuarios ?>)
                </h1>
            </div>
            <section class="attendance">
                <div class="attendance-list">
                    <h1><a href="acciones/exportar.php" title="Exportar a CSV" download="usuarios.csv"><i
                                class="bi bi-filetype-csv"> Exportar a CSV</i></a></h1>
                    <table class="table" id="table_usuario">
                        <thead class="header">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Edad</th>
                                <th>Correo</th>
                                <th>Avatar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) { ?>
                            <tr id="usuario_<?php echo $usuario['user_id']; ?>">
                                <td>
                                    <?php echo $usuario['user_id']; ?>
                                </td>
                                <td>
                                    <?php echo $usuario['nombre']; ?>
                                </td>
                                <td>
                                    <?php echo $usuario['apellido']; ?>
                                </td>
                                <td>
                                    <?php echo $usuario['edad']; ?>
                                </td>
                                <td>
                                    <?php echo $usuario['correo']; ?>
                                </td>
                                <td>
                                    <div class="veb">
                                        <img class="rounded-circle" src="../assets/imgs/sin-foto.png" alt="" width="50"
                                            height="50" border-radius="50%">
                                    </div>
                                </td>
                                <td class="boton">
                                    <a href="editar_usuario.php?id=<?php echo $usuario['user_id']; ?>"
                                        title="Editar datos del usuario" class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="borrar_usuario.php?id=<?php echo $usuario['user_id']; ?>"
                                        title="Eliminar datos del usuario" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>

            </tbody>
            </table>
    </div>
    </section>
    </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function () {
            $("#table_usuario").DataTable({
                pageLength: 5,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
                },
            });
        });
    </script>
</body>

</html>