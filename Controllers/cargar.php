<?php
session_start();
$nombreProd = $_POST['nombreProd'];
$precioProd = $_POST['precioProd'];
$cantidadProd = $_POST['cantidadProd'];
$categoriaProd = $_POST['categoriaProd'];


$precioTotal = $precioProd * $cantidadProd;


include("conexion.php");

$nombreProd = strtolower($nombreProd);






if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $query = "SELECT user_id FROM login WHERE user = '$user'";
    $result = mysqli_query($db, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $user_id = $row['user_id'];
        $validar = "SELECT * FROM productos WHERE nombre = '$nombreProd' and categoria = '$categoriaProd' and user_id = '$user_id";
        $validando = $db->query($validar);

        if ($validando->num_rows > 0) {
            $precioTotal = $precioProd * $cantidadProd;
            mysqli_query($db, "UPDATE productos SET cantidad = '$cantidadProd', precioTotal = '$precioTotal' WHERE nombre = '$nombreProd'");
            header("Location: ../stock.php");
        } else {
            mysqli_query($db, "INSERT INTO productos VALUES (DEFAULT, '$nombreProd', $precioProd, $cantidadProd, '$categoriaProd', $precioTotal, $user_id)");
            header("Location: ../stock.php");
        }

    }else{
        echo "no se pudo obtener el id";
    }
}else{
    echo "el user no esta autenticado";
}

