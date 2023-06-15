<?php
session_start();
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PathToy</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php if (empty($_SESSION['usuario'])) : ?>
    <nav class="sidebar close">
      <header>
        <div class="image-text">
          <span class="image">
            <!--<img src="logo.png" alt="">-->
          </span>

          <div class="text logo-text">
            <span class="name">PathToy</span>
            <!--span class="profession">New Edge</span-->
          </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
      </header>

      <div class="menu-bar">
        <div class="menu">
          <li class="nav-link">
            <a href="/PathToy/home/login.php">
              <i class='bx bx-log-in-circle icon'></i>
              <span class="text nav-text">Iniciar Sesión</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="/PathToy/home/signup.php">
              <i class='bx bx-user icon'></i>
              <span class="text nav-text">Registrarse</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="/PathToy/home/login.php">
              <i class='bx bx-add-to-queue icon'></i>
              <span class="text nav-text">Publicar</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="/PathToy/home/login.php">
              <i class='bx bx-expand-horizontal icon'></i>
              <span class="text nav-text">Mis Intercambios</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="/PathToy/home/login.php">
              <i class='bx bx-donate-heart icon'></i>
              <span class="text nav-text">Mis Donaciones</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="/PathToy/home/AyudaFuera.php">
              <i class='bx bx-wallet icon'></i>
              <span class="text nav-text">Ayuda</span>
            </a>
          </li>
          <!--ul class="menu-links"></ul-->

        </div>

        <!--div class="bottom-content">

        <li class="">
          <a href="#">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text">Logout</span>
          </a>
        </li>

        <li-- class="mode">
          <div class="sun-moon">
            <i class='bx bx-moon icon moon'></i>
            <i class='bx bx-sun icon sun'></i>
          </div>
          <span class="mode-text text">Dark mode</span>

          <div class="toggle-switch">
            <span class="switch"></span>
          </div>
        </li-->
      </div>

      </div>
    </nav>
  <?php else : ?>
    <nav class="sidebar close">
      <header>
        <div class="image-text">
          <span class="image">
            <!--<img src="logo.png" alt="">-->
          </span>

          <div class="text logo-text">
            <span class="name">PathToy</span>
            <!--span class="profession">New Edge</span-->
          </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
      </header>

      <div class="menu-bar">
        <div class="menu">
          <li class="nav-link">
            <a href="/PathToy/home/private/perfil.php">
              <i class='bx bx-user icon'></i>
              <span class="text nav-text">Perfil</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="/PathToy/home/publicar.php">
              <i class='bx bx-add-to-queue icon'></i>
              <span class="text nav-text">Publicar</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="/PathToy/home/private/Intercambios.php">
              <i class='bx bx-expand-horizontal icon'></i>
              <span class="text nav-text">Mis Intercambios</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="/PathToy/home/private/Donaciones.php">
              <i class='bx bx-donate-heart icon'></i>
              <span class="text nav-text">Mis Donaciones</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="/PathToy/home/private/AyudaDentro.php">
              <i class='bx bx-wallet icon'></i>
              <span class="text nav-text">Ayuda</span>
            </a>
          </li>
          <!--ul class="menu-links"></ul-->
          <li class="nav-link">
            <a href="/PathToy/home/logout.php">
              <i class='bx bx-log-out-circle icon'></i>
              <span class="text nav-text">Cerrar Sesión</span>
            </a>
          </li>
        </div>

        <!--div class="bottom-content">

        <li class="">
          <a href="#">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text">Logout</span>
          </a>
        </li>

        <li-- class="mode">
          <div class="sun-moon">
            <i class='bx bx-moon icon moon'></i>
            <i class='bx bx-sun icon sun'></i>
          </div>
          <span class="mode-text text">Dark mode</span>

          <div class="toggle-switch">
            <span class="switch"></span>
          </div>
        </li-->
      </div>

      </div>
    </nav>
  <?php endif ?>
</body>