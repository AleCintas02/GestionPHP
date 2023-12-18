<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/cargarProducto.css">
    <title>Document</title>
</head>
<body>
    <?php include("menu.php"); ?>
    <div class="container">
        <form id="formulario" action="./Controllers/cargar.php" method="post">
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="categoriaProd" required>
                <option value="" selected disabled>Categoria</option>
                    <option value="Bicicletas">Bicicletas</option>
                    <option value="Motos">Motos</option>
                    <option value="Alquileres">Alquileres</option>
                </select>
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input name="nombreProd" required class="form-control" type="text" >
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Precio</label>
                <input name="precioProd" required class="form-control" type="number"  step=0.01>
            </div>
            <div class="mb-3">

            <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                <input name="cantidadProd" required class="form-control" type="number" >
            </div>


            <input type="submit" class="btn btn-success" value="Cargar">
        </form>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>