<?php 

include("conexion.php");
if(!empty($_GET["dni"])){
    $dni = $_GET["dni"];
    $sql = $db->query("delete from clientes where dni=$dni");
    if($sql == 1){
        echo '<div class="alert alert-info">Cliente eliminado </div>';
    }else{
        echo '<div class="alert alert-danger">ERROR!</div>';
    }
}

?>