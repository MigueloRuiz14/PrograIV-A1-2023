<?php
require_once('c://xampp/htdocs/PathToy/view/header.php');
if(!empty($_SESSION['usuario'])){
    header("Location:panel_control.php");
}
?>

<head>
  <link rel="stylesheet" href="/PathToy/asset/css/styles.css">
</head>

<div class="fondo-login">
    <div class="icon">
        <a href="/PathToy/index.php">
            <i class="fa-solid fa-house back-icon">Inicio</i>
        </a>
    </div>
    <div class="titulo">
        Crea una cuenta
    </div>
    <!--formulario de singup-->

    <form action="store.php" method="POST" class="col-8 col-md-3  login">

        <div class="md-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" name="nombre"  value="<?= (!empty($_GET['nombre'])) ? $_GET['nombre'] : "" ?>" class="form-control" id="usuarioNombre">
        </div>
        <div class="md-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" name="apellido" value="<?= (!empty($_GET['apellido'])) ? $_GET['apellido'] : "" ?>" class="form-control" id="usuarioApellido">
        </div>
        <div class="md-3">
            <label for="exampleInputEmail1" class="form-label">Género</label>
            <select type="text" name="genero" value="<?= (!empty($_GET['genero'])) ? $_GET['genero'] : "" ?>" class="form-control" id="usuarioGenero">
                <option></option>
                <option>Masculino</option>
                <option>Femenino</option>
            </select>

        </div>
        <div class="md-3">
            <label for="exampleInputEmail1" class="form-label">Correo</label>
            <input type="email" name="correo" autocomplete="off" value="<?= (!empty($_GET['correo'])) ? $_GET['correo'] : "" ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="md-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <div class="box-eye">
                <button type="button" onclick="mostrarcontraseña('password', 'eyepassword')">
                    <i id="eyepassword" class="fa-solid fa-eye changePassword"></i>
                </button>
            </div>
            <input type="password" name="contraseña" value="<?= (!empty($_GET['contraseña'])) ? $_GET['contraseña'] : "" ?>" class="form-control" id="password">
        </div>
        <div class="md-3">
            <label for="exampleInputPassword2" class="form-label">Repetir Contraseña</label>
            <div class="box-eye">
                <button type="button" onclick="mostrarcontraseña('password2', 'eyepassword2')">
                    <i id="eyepassword2" class="fa-solid fa-eye changePassword"></i>
                </button>
            </div>
            <input type="password" name="confirmarContraseña" value="<?= (!empty($_GET['confirmarContraseña'])) ? $_GET['confirmarContraseña'] : "" ?>" class="form-control" id="password2">
        </div>
        <?php if (!empty($_GET['error'])) :   ?>
            <div class="row p-2">
                <div id="alertError" style="margin: auto;" class=" alert alert-danger mb-2" role="alert">
                    <?= !empty($_GET['error']) ? $_GET['error'] : "" ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row p-1">
            <div class="d-grid">
                <button type="submit" class=" btn btn-dark">Registro</button>
            </div>
        </div>
    </form>
    <div class="col-8 col-md-3 mt-3 login">
        Ya tienes una cuenta <a href="login.php">Ingreso</a>
    </div>

</div>

</div>

<script src="../asset/js/main.js"></script>


<?php
require_once('c://xampp/htdocs/PathToy/view/footer.php');
?>