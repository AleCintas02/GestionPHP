<?php
include("Controllers/usuario_sesion.php");
include("Controllers/conexion.php");
$usuario = $_SESSION['user'];
$query = "SELECT user_id FROM login WHERE user = '$usuario'";
$result = mysqli_query($db, $query);
if($row = mysqli_fetch_assoc($result)){
  $user_id = $row['user_id'];
}
if (!isset($usuario)) {
  header("location: index.php");
}


// Consulta SQL para obtener el conteo de registros en la tabla 'productos'
$consultaProductos = mysqli_query($db, "SELECT COUNT(*) AS cantidad_registros FROM productos WHERE idUser = $user_id");
$datosProductos = mysqli_fetch_assoc($consultaProductos);
$cantidad_productos = $datosProductos['cantidad_registros'];



$consultaClientes = mysqli_query($db, "SELECT COUNT(*) AS cantidad_registros FROM clientes WHERE idUser = $user_id");
$datosClientes = mysqli_fetch_assoc($consultaClientes);
$cantidad_clientes = $datosClientes['cantidad_registros'];


$consultaVentas = mysqli_query($db, "SELECT COUNT(*) AS cantidad_registros FROM ventas WHERE idUser = $user_id");
$datosVentas = mysqli_fetch_assoc($consultaVentas);
$cantidad_ventas = $datosVentas['cantidad_registros'];


$consulta = mysqli_query($db, "SELECT SUM(importe_total) AS monto_total FROM ventas WHERE idUser = $user_id");
$datos = mysqli_fetch_assoc($consulta);
$monto_total = $datos['monto_total'];


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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/inicio.css">
  <link rel="stylesheet" href="./css/adminlite/adminlte.min.css">
  <title>Document</title>
</head>

<body>

<?php include("menu.php"); ?>

  <div class="contendedor_body">
    






    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?php echo $cantidad_productos; ?></h3>

            <h5>Productos</h5>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?php echo $cantidad_clientes; ?></h3>

            <h5>Clientes</h5>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?php echo $cantidad_ventas; ?></h3>

            <h5>Ventas</h5>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>$<?php
            
            if($monto_total == 0){
              echo "0";
            }else{
              echo $monto_total;
            }
             ?></h3>

            <h5>Monto total de ventas</h5>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>


    <!-- <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-tag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inventory</span>
              <span class="info-box-number">5,200</span>
            </div>
            
          </div>
          
          <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="far fa-heart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mentions</span>
              <span class="info-box-number">92,050</span>
            </div>
            
          </div>
          
          <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>
            </div>
            
          </div>
          
          <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="far fa-comment"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>
            </div>
            
          </div> -->


    <?php
    $listarVentas = "SELECT * FROM ventas WHERE idUser = $user_id";
    $listar = mysqli_query($db, $listarVentas);


    ?>
    <div class="container mt-4">
      <table id="tabla-nueva" class="table table-striped display responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Producto</th>
            <th>Categoria</th>
            <th>Cantidad</th>
            <th>Monto</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>

          <?php

          while ($datos = mysqli_fetch_assoc($listar)) {
            $fecha_mostrar = date('d/m/Y', strtotime($datos['fecha_compra']));

          ?>



            <tr>
              <td><?php echo $datos['dni_cliente'] ?> </td>
              <td><?php echo $datos['nombre'] ?> </td>
              <td><?php echo $datos['apellido'] ?> </td>
              <td><?php echo $datos['correo'] ?> </td>
              <td><?php echo $datos['producto'] ?> </td>
              <td><?php echo $datos['categoria'] ?> </td>
              <td><?php echo $datos['cantidad'] ?> </td>
              <td><?php echo $datos['importe_total'] ?> </td>
              <td><?php echo $fecha_mostrar ?> </td>
            </tr>

          <?php } ?>



        </tbody>
        <tfoot>
          <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Producto</th>
            <th>Categoria</th>
            <th>Cantidad</th>
            <th>Monto</th>
            <th>Fecha</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>




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

  <script src="https://kit.fontawesome.com/1d10b38d89.js" crossorigin="anonymous"></script>

</body>

</html>