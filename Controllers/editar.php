<?php 
    include("conexion.php");
    if($_POST){

            $id = $_POST["id"];
            $nombre = $_POST["nombreProd"];
            $nombre = strtolower($nombre);
            $precio = $_POST["precioProd"];
            $cantidad = $_POST["cantidadProd"];
            $categoria = $_POST["categoriaProd"];
            $precioTotal = $precio * $cantidad;
            $sql = $db->query("UPDATE productos SET nombreProducto = '$nombre', precio = $precio, cantidad = $cantidad, categoria = '$categoria', precioTotal = $precioTotal where id = $id");
                header("Location: ../stock.php");

    }
?>