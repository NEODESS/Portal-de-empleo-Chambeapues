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
    <title>ADM | PQR Chambea pues</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.5" />
    <link rel="icon" type="image/x-icon" href="../assets/img/faviconcp.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
</head>
<style>
        /* Estilo para la tabla */
        .table-responsive {
            overflow-x: auto;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: #ffffff;
            color: #212529;
        }
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: #4AD489;
            color: #ffffff;
        }
        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
        /* Estilo para el botón */
        .btn-se-dio-respuesta {
            background-color: #4AD489;
            color: #ffffff;
            border: none;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: all 0.3s ease;
        }
        .btn-se-dio-respuesta:hover {
            background-color: #3ab370;
        }
    </style>

<body>
<?php
// Incluir el archivo de configuración de la conexión a la base de datos
include("../config/conexion.php");

// Función para escapar cadenas para evitar SQL Injection
function escapar($conexion, $valor) {
    return mysqli_real_escape_string($conexion, $valor);
}

// Verificar si se ha enviado la solicitud para borrar un registro
if (isset($_POST['borrar'])) {
    $id = escapar($conexion, $_POST['id']);
    $tabla = escapar($conexion, $_POST['tabla']);

    // Realizar la eliminación según la tabla seleccionada
    $sql = "DELETE FROM $tabla WHERE id = $id";
    if ($conexion->query($sql) === TRUE) {
        ?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                Swal.fire({
    icon: 'success',
    title: 'Se dio respuesta',
    text: 'Ya se comunicó con el cliente',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    toast: true,
    position: 'bottom-end', // Aquí se ajusta la posición a la esquina inferior derecha
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});

                </script>
                <?php
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al eliminar el registro: ' . $conexion->error . '</div>';
    }
}

// Consulta para obtener los registros de la tabla pqr
$sql_pqr = "SELECT id, tipo, nombre, email, telefono, mensaje, fecha_envio FROM pqr";
$result_pqr = $conexion->query($sql_pqr);
?>
    <div class="container">
        
        <nav >
            <ul>
                <li><a href="" class="logo">
                        <img src="../assets/logo chambea pues.png">
                        <span class="nav-item"><?php echo $_SESSION['name']?></span>
                    </a></li>
                <li><a href="analisis.php">
                        <i class="fas fa-database"></i>
                        <span class="nav-item">Análisis</span>
                    </a></li>
                <li><a href="pqr.php" style="color: #34AF6D;">
                        <i class="fas fa-comment"></i>
                        <span class="nav-item">PQR</span>
                    </a></li>

                <li><a href="Cerrar-sesion.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item"></span>
                    </a></li>
            </ul>
        </nav>
        <div class="main-content">
        <h1><a href="acciones/exportpqr.php" title="Exportar a CSV" download="usuarios.csv"><i
        class="bi bi-filetype-csv"> Exportar a CSV</i></a></h1>
<div class="container-center">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Nombre</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono</th>
                        <th>Mensaje</th>
                        <th>Fecha de Envío</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result_pqr->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['tipo']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php echo $row['mensaje']; ?></td>
                            <td><?php echo $row['fecha_envio']; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="tabla" value="pqr">
                                    <button type="submit" name="borrar" class="btn btn-success btn-sm">Se dio respuesta</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos al finalizar
$conexion->close();
?>
