<?php 
  require_once("c://xampp/htdocs/PathToy/controller/homeController.php");
  $obj = new homeController();
   $correo = $_POST['correo'];
   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $genero = $_POST['genero'];
   $contraseña = $_POST['contraseña'];
   $confirmarContraseña = $_POST['confirmarContraseña'];
   $error = "";
   if(empty($correo) || empty($nombre) ||empty($apellido) ||empty($genero) || empty($contraseña) ||empty($confirmarContraseña)){
        $error .= "<li>Completa los campos</li>";
        header("Location:signup.php?error=".$error/*."&&correo=".$correo."&&nombre=".$nombre."&&apellido=".$apellido.
   "&&genero=".$genero."&&contraseña=".$contraseña."&&confirmarContraseña=".$confirmarContraseña*/);
    }elseif($correo && $nombre && $apellido && $genero && $contraseña && $confirmarContraseña){
        if ($contraseña==$confirmarContraseña){
            if($obj->guardarUsuario($correo,$nombre,$apellido,$genero,$contraseña) == false){
                $error .= "<li>El correo ya está registrado";
                header("Location:signup.php?error=".$error."&&correo=".$correo."&&nombre=".$nombre."&&apellido=".$apellido.
                "&&genero=".$genero."&&contraseña=".$contraseña."&&confirmarContraseña=".$confirmarContraseña);
            }else{
                header("Location:login.php");
            }

        }else{
            $error = "<li>Las contraseñas no coinciden</li>";
            header("Location:signup.php?error=".$error."&&correo=".$correo."&&nombre=".$nombre."&&apellido=".$apellido.
            "&&genero=".$genero."&&contraseña=".$contraseña."&&confirmarContraseña=".$confirmarContraseña);
        }
    }


?>