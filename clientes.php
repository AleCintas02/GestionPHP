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
    <title>Document</title>

</head>

<body>

    <?php
    
    include("menu.php");
    
    
    ?>

    <div class="container mt-4">
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Añadir Cliente</button>
        <?php include("modalClientes.php") ?>
        <?php if(isset($_GET["error"]) || isset($_GET["cliente_existente"])){ ?>

            <p class="alert alert-danger">Este cliente ya existe en la base de datos</p>


            <?php } ?>
        
        
       
        <table id="tabla-nueva" class="table table-striped display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Télefono</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Vencimiento</th>
                    <th scope="col">Dias restantes</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>




                <?php
                include("./Controllers/eliminarCliente.php");
                $nombreUsuario = $_SESSION['user'];

                $listarClientes = "SELECT * FROM clientes where idUser = (SELECT user_id FROM login WHERE user = '$nombreUsuario')";
                $listar = mysqli_query($db, $listarClientes);
                ?>
                <?php
                
                while ($datos = mysqli_fetch_assoc($listar)) {
                    $fecha_mostrar = date('d/m/Y', strtotime($datos['fecha']));

                ?>

                    <tr>
                        <th scope="row"><?php echo $datos['dni'] ?></th>
                        <td><?php echo $datos['nombre'] ?></td>
                        <td><?php echo $datos['apellido'] ?></td>
                        <td><?php echo $datos['correo'] ?></td>
                        <td><?php echo $datos['telefono'] ?></td>
                        <td style="color: blue"><?php echo $fecha_mostrar ?></td>
                        <td style="color: red"><?php $fechaVencimiento = date('d/m/Y', strtotime($datos['fecha'] . '+30 days'));
                            echo $fechaVencimiento ?></td>
                        <td style="color: green" > <?php
                                $fechaVencimiento = strtotime(date('d-m-Y', strtotime($datos['fecha'] . '+30 days')));
                                $hoy = strtotime(date('d-m-Y'));
                                $diasRestantes = ($fechaVencimiento - $hoy) / (60 * 60 * 24);
                                if ($diasRestantes < 0) {
                                    echo "<p style='color:red'>Vencido</p>";
                                } else {
                                    echo "" . round($diasRestantes) . " días";
                                }
                                ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCliente<?php echo $datos['dni'] ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </td>
                        <td><a class="btn btn-primary" href="clientes.php?dni=<?= $datos['dni'] ?>" type="button"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <?php include("modalEditarCliente.php");    ?>
                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Télefono</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Vencimiento</th>
                    <th scope="col">Dias restantes</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
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