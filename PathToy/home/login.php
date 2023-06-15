<?php
require_once('C://xampp/htdocs/PathToy/view/header.php');
if(!empty($_SESSION['usuario'])){
    header("Location:panel_control.php");
}
?>
<?php if($page = "login"); ?>

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
        Inicia sesión
    </div>
    <!--formulario de login-->

    <form action="verificar.php" method="POST" class="col-8 col-md-3  login">
        <div class="md-3">
            <label for="exampleInputEmail1" class="form-label">Correo</label>
            <input type="email"  name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="md-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <div class="box-eye">
                <button type="button" onclick="mostrarcontraseña('password', 'eyepassword')">
                    <i id="eyepassword" class="fa-solid fa-eye changePassword"></i>
                </button>
            </div>
            <input type="password" name="contraseña" class="form-control" id="password">
        </div>
        <?php if (!empty($_GET['error'])) :   ?>
            <div class="row p-2">
                <div id="alertError" style="margin: auto;" class=" alert alert-danger mb-2" role="alert">
                    <?= !empty($_GET['error']) ? $_GET['error'] : "" ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row p-3">
            <div class="d-grid">
                <button type="submit" class=" btn btn-dark">Ingresar</button>
            </div>
        </div>
    </form>
    <div class="col-8 col-md-3 mt-3 login">
        Registrate <a href="signup.php">Crea una cuenta</a>
    </div>

</div>


<script src="../asset/js/main.js"></script>