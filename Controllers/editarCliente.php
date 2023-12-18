<?php 

include("conexion.php");

if($_POST){

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];



    $consultarCliente = "SELECT dni FROM clientes WHERE dni = '$dni'";
    $validandoCliente = $db->query($consultarCliente);
    if($validandoCliente->num_rows > 0){
        header("location: ../clientes.php?cliente_existente");
    }else{
        $consulta = "UPDATE clientes SET dni=$dni, nombre='$nombre', apellido='$apellido', correo='$correo', telefono=$telefono, fecha='$fecha'";
    
        mysqli_query($db, $consulta);
        header("location: ../clientes.php");
    }


}
