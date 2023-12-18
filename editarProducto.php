<?php

include("./Controllers/conexion.php");
$id = $_GET["id"];

$sql = $db->query(" SELECT * FROM productos WHERE id=$id");




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/GESTION/./css/eliminarProducto.css">
    <title>Document</title>
</head>

<body>
    <form class="row g-3" method="POST">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

        <?php
        include("./Controllers/editar.php");

        while ($datos = $sql->fetch_object()) {
        ?>

            <select class="form-select" aria-label="Default select example" name="categoriaProd">
                <option selected disabled>Opcion anterior: <?= $datos->categoria?></option>
                <option value="Bicicletas">Bicicletas</option>
                <option value="Motos">Motos</option>
                <option value="Alquileres">Alquileres</option>
            </select>

            <input name="nombreProd" class="form-control" type="text" placeholder="Producto" value="<?= $datos->nombreProducto ?>">


            <input name="precioProd" class="form-control" type="number" placeholder="Precio" value="<?= $datos->precio ?>" step=0.01>


            <input name="cantidadProd" class="form-control" type="number" placeholder="Cantidad" value="<?= $datos->cantidad ?>">

        <?php } ?>


        <button type="submit" name="btnModificar" class="btn btn-success" value="Editar">Editar</button>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>