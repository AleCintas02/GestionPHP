<?php 


session_start();

include("conexion.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaActual = date('Y-m-d');

$dni = $_POST['dni_cliente'];
$nombre = $_POST['nombre_cliente'];
$apellido = $_POST['apellido_cliente'];
$telefono = $_POST['telefono_cliente'];
$correo = $_POST['correo_cliente'];
$cantidad = $_POST['cantidadProd'];
$precio = $_POST['precio'];
$producto = $_POST['producto'];
$categoria = $_POST['categoria'];
$id = $_POST['id'];

$importeTotal = $cantidad * $precio;



if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
    $query = "SELECT user_id FROM login WHERE user = '$user'";
    $result = mysqli_query($db, $query);
    if($row = mysqli_fetch_assoc($result)){
        $user_id = $row['user_id'];
        $resultado = mysqli_query($db, "SELECT cantidad FROM productos WHERE id = $id and idUser = $user_id");
        $stock_actual = mysqli_fetch_assoc($resultado)['cantidad'];

        if ($cantidad > $stock_actual) {
            $_SESSION['error_msg'] = "La cantidad a vender supera el stock disponible.";
            header("Location: ../stock.php");
            // Aquí puedes redireccionar al usuario o mostrar un mensaje de error como desees.
        }  else {
            // Calcular el importe total
            $importeTotal = $cantidad * $precio;
        
            // Insertar en la tabla de ventas
            $sql = "INSERT INTO ventas VALUES ($dni, '$nombre', '$apellido', $telefono, '$correo', '$producto', '$categoria', $cantidad, $importeTotal, '$fechaActual', $user_id)";
            mysqli_query($db, $sql);
        
            // Actualizar el stock en la tabla de productos
            $editar = "UPDATE productos SET cantidad = cantidad - $cantidad, precioTotal = precioTotal - $importeTotal  WHERE id = $id and idUser = $user_id";
            mysqli_query($db, $editar);
        
            $_SESSION['exito_msg'] = "Venta realizada correctamente. Stock actualizado.";
            header("Location: ../stock.php");
            // Aquí puedes redireccionar al usuario o mostrar un mensaje de éxito como desees.
        }


    }

}

