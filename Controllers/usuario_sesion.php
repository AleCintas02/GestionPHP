<?php 
session_start();
include("conexion.php");

if(!empty($_POST['entrar'])){
    if(empty($_POST['user']) and empty($_POST['pass'])){
        header("Location: ../index.php?_!!DQjr6,");
    }else{
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $sql=$db->query("SELECT * FROM login WHERE user='$user' and pass='$pass'");
        if ($datos = $sql->fetch_object()) {
            $_SESSION['user'] = $user;
            header("location:../inicio.php");
        } else {
            header("Location: ../index.php?)-HiPdTTF");
        }
        
    }
}

?>