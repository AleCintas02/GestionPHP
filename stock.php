<?php
include("./Controllers/conexion.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Document</title>

</head>

<body>

    <?php include("menu.php") ?>

    <div class="container mt-4">
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalProducto">Añadir Producto</button>
        <?php
        // Mostrar mensaje de error si existe en la variable de sesión
        if (isset($_SESSION['error_msg'])) {
            echo '<div class="alert alert-danger">' . htmlspecialchars($_SESSION['error_msg']) . '</div>';
            unset($_SESSION['error_msg']); // Limpia el mensaje de error después de mostrarlo
        }

        // Mostrar mensaje de éxito si existe en la variable de sesión
        if (isset($_SESSION['exito_msg'])) {
            echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['exito_msg']) . '</div>';
            unset($_SESSION['exito_msg']); // Limpia el mensaje de éxito después de mostrarlo
        }
        ?>
        <?php include("modalProducto.php") ?>
        <table id="tabla-nueva" class="table table-striped display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Precio Unit.</th>
                    <th>Cant</th>
                    <th>Total</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Vender</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("./Controllers/eliminarStock.php");

                $nombreUsuario = $_SESSION["user"];
                $consulta = mysqli_query($db, "SELECT * FROM productos WHERE idUser = (SELECT user_id FROM login WHERE user = '$nombreUsuario')");

                while ($listar = mysqli_fetch_assoc($consulta)) {
                ?>
                    <tr>
                        <td><?php echo $listar['id']; ?></td>
                        <td><?php echo $listar['nombre']; ?></td>
                        <td><?php echo $listar['categoria']; ?></td>
                        <td>$<?php echo $listar['precio']; ?></td>
                        <td><?php echo ($listar['cantidad'] == 0) ? '<p style="color: red;">Sin stock</p>' : $listar['cantidad']; ?></td>
                        <td>$<?php echo $listar['precioTotal']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditProducto<?php echo $listar['id'] ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </td>
                        <td><a class="btn btn-primary" href="stock.php?id=<?= $listar['id'] ?>" type="button"><i class="fa-solid fa-trash"></i></a></td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalVender<?php echo $listar['id'] ?>">
                                <i class="bi bi-bag-check-fill"></i>
                            </button>
                        </td>
                    </tr>
                <?php
                    include("modalEditarProducto.php");
                    include("modalVender.php");
                }

                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Precio Unit.</th>
                    <th>Cant</th>
                    <th>Total</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Vender</th>
                </tr>
            </tfoot>
        </table>
    </div>


    <script src="https://kit.fontawesome.com/1d10b38d89.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla-nueva').DataTable({
                responsive: true,
            });
        });
    </script>

</body>

</html>