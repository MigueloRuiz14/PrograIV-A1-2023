<?php
    require_once("c://xampp/htdocs/PathToy/controller/homeController.php");
    session_start();
    $obj = new homeController();
    $obj->limpiarcorreo($correo = $_POST['correo']);
    $obj->limpiarcadena ($contraseña = $_POST['contraseña']);
    $bandera = $obj->verificarusuario($correo,$contraseña);
    if($bandera){
        $_SESSION['usuario'] = $correo;
        header("Location:panel_control.php");
    }else{
        $error = "<li>Correo o contraseña incorrecto</li>";
        header("Location:login.php?error=".$error);
    }
?>