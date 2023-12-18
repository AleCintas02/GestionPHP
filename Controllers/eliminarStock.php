<?php 

    include("conexion.php");
    if(!empty($_GET["id"])){
        $id = $_GET["id"];
        $sql = $db->query("delete from productos where id=$id");
        if($sql == 1){
            echo '<div class="alert alert-info">Producto eliminado </div>';
        }else{
            echo '<div class="alert alert-danger">ERROR!</div>';
        }
    }



?>