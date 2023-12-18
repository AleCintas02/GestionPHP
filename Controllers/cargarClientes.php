<?php
include("conexion.php");
session_start();

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaActual = date('Y-m-d');



if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $query = "SELECT user_id FROM login WHERE user = '$user'";
    $result = mysqli_query($db, $query);


    if ($row = mysqli_fetch_assoc($result)) {
        $user_id = $row['user_id'];
        if ($_POST) {
            $dni = $_POST["dni"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $correo = $_POST["correo"];
            $telefono = $_POST["telefono"];
            $fecha = $_POST["fecha"];
            $fecha_db = date('Y-m-d', strtotime($fecha));

            $nueva_fecha = date('Y-m-d', strtotime($fecha . ' +30 days'));

            $nueva_fecha_mostrar = date('d/m/Y', strtotime($nueva_fecha));

            $validarCliente = "SELECT * FROM clientes WHERE dni = $dni and idUser = $user_id";
            $validacion = $db->query($validarCliente);

            if ($validacion->num_rows > 0) {
                $error = "cliente existente";
                header("Location: ../clientes.php?error=" . urlencode($error));
            } else {
                $consulta = "INSERT INTO clientes VALUES ($dni, '$nombre','$apellido','$correo', '$telefono', '$fecha', $user_id)";
                mysqli_query($db, $consulta);
                header("Location: ../clientes.php");
            }
        }

    }


}



?>