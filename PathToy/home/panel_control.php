<?php
require_once('c://xampp/htdocs/PathToy/view/header.php');
if (empty($_SESSION['usuario'])) {
  header("Location:login.php");
}
?>

<head>
  <link rel="stylesheet" href="/PathToy/asset/css/styles.css">
  <link rel="stylesheet" href="/PathToy/asset/css/panel.css">
  <style>
    .card-image img {
      width: 200px; /* Ancho deseado */
      height: 250px; /* Altura automática para mantener la proporción */
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    function habilitarEdicion() {
      var campos = document.getElementsByClassName('campo-editable');
      var btnActualizar = document.getElementsByClassName('btn-actualizar');
      var btnGuardar = document.getElementsByClassName('btn-guardar');

      for (var i = 0; i < campos.length; i++) {
        campos[i].innerHTML = '<input type="text" value="' + campos[i].innerText + '">';
        btnActualizar[i].style.display = 'none';
        btnGuardar[i].style.display = 'inline';
      }
    }

    function guardarCambios() {
      var campos = document.getElementsByClassName('campo-editable');
      var btnActualizar = document.getElementsByClassName('btn-actualizar');
      var btnGuardar = document.getElementsByClassName('btn-guardar');

      for (var i = 0; i < campos.length; i++) {
        var valorEditado = campos[i].querySelector('input').value;
        campos[i].innerHTML = valorEditado;
        btnActualizar[i].style.display = 'inline';
        btnGuardar[i].style.display = 'none';

        // Obtener el ID del registro
        var id = campos[i].getAttribute('data-id');

        // Enviar el valor editado al servidor para guardar en la base de datos
        $.ajax({
          url: '/PathToy/home/guardar_registro.php', // Ruta del archivo PHP que guarda los datos
          method: 'POST',
          data: { id: id, valor: valorEditado },
          success: function(response) {
            // Manejar la respuesta del servidor
            console.log(response);
            // Mostrar mensaje de éxito
            alert('Datos actualizados con éxito');
          },
          error: function(xhr, status, error) {
            // Manejar el error en caso de fallo en la petición
            console.error(error);
          }
        });
      }
    }

    function eliminarRegistro(id) {
      // Enviar el ID del registro al archivo PHP para eliminarlo de la base de datos
      if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
        $.ajax({
          url: '/PathToy/home/eliminar_registro.php', // Ruta del archivo PHP que elimina el registro
          method: 'POST',
          data: { id: id },
          success: function(response) {
            // Manejar la respuesta del servidor
            console.log(response);
            // Mostrar mensaje de éxito
            alert('Registro eliminado con éxito');
            // Recargar la página para actualizar la lista de registros
            location.reload();
          },
          error: function(xhr, status, error) {
            // Manejar el error en caso de fallo en la petición
            console.error(error);
          }
        });
      }
    }
  </script>
</head>

<h1 class="text-center mt-4">Bienvenido <?= $_SESSION['usuario'] ?></h1>


<script src="../asset/js/main.js"></script>

<?php
require_once('c://xampp/htdocs/PathToy/view/footer.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donations";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT id, tipo_publicacion, imagen_producto, descripcion, habilidad, edad, genero FROM juguetes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Mostrar los datos de la tabla juguetes
  echo '<div class="card-container">';
  while ($row = $result->fetch_assoc()) {
    echo '<div class="card">';
    echo '<div class="card-image">';
    echo '<img src="data:image/jpeg;base64,' . $row['imagen_producto'] . '" alt="Imagen del producto">';
    echo '</div>';
    echo '<div class="card-content">';
    echo '<h2 class="campo-editable" data-id="' . $row['id'] . '">' . $row['tipo_publicacion'] . '</h2>';
    echo '<p>Descripción: <span class="campo-editable" data-id="' . $row['id'] . '">' . $row['descripcion'] . '</span></p>';
    echo '<p>Habilidad requerida: <span class="campo-editable" data-id="' . $row['id'] . '">' . $row['habilidad'] . '</span></p>';
    echo '<p>Edad recomendada: <span class="campo-editable" data-id="' . $row['id'] . '">' . $row['edad'] . '</span></p>';
    echo '<p>Género: <span class="campo-editable" data-id="' . $row['id'] . '">' . $row['genero'] . '</span></p>';
    echo '<button class="btn-actualizar" onclick="habilitarEdicion()">Editar</button>';
    echo '<button class="btn-guardar" style="display: none;" onclick="guardarCambios()">Guardar</button>';
    echo '<button class="btn-eliminar" onclick="eliminarRegistro(' . $row['id'] . ')">Eliminar</button>';
    echo '</div>';
    echo '</div>';
    echo "<br>";
  }
} else {
  echo "No se encontraron registros en la tabla juguetes.";
}
echo '</div>';

$conn->close();
?>
