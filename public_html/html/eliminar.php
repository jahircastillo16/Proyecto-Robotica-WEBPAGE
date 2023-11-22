<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borrar AC</title>
  <script defer="" src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
  <link rel="stylesheet" type="text/css" href="../css/eliminarAC.css">
  <style>
    /* Add your custom CSS here */
  </style>
</head>

<body>
  <main class="min-h-screen w-full bg-gray-100 text-gray-700" x-data="layout">
    <!-- header page -->
    <header class="flex w-full items-center justify-between border-b-2 border-gray-200 bg-white p-2">
      <!-- logo -->
      <div class="flex items-center space-x-2">
        <button type="button" class="text-3xl" @click="asideOpen = !asideOpen"><i class="bx bx-menu"></i></button>
        <div>Menu</div>
      </div>
      <!-- button profile -->
      <div>
        <div class="imagenPerfil">
          <button type="button" @click="profileOpen = !profileOpen" @click.outside="profileOpen = false"
            class="h-9 w-9 overflow-hidden rounded-full">
            <img id="imagen" alt="plchldr.co" />
            <!-- el id imagen sirve para extraer la imagen de perfil del que inicio sesion usando la cookie -->
          </button>
        </div>
        <!-- dropdown profile -->
        <div
          class="absolute right-2 mt-1 w-48 divide-y divide-gray-200 rounded-md border border-gray-200 bg-white shadow-md"
          x-show="profileOpen" x-transition>
          <div class="flex items-center space-x-2 p-2">
            <div class="font-medium" id="usernameDisplay">No has iniciado sesión uwu</div>
            <!-- el id usernamedisplay es para mostrar el nombre de la persona que inicio sesion usando la cookie -->
          </div>
          <div class="flex flex-col space-y-3 p-2">
            <a href="perfil.html" class="transition hover:text-blue-600">Mi Perfil</a>
            <a href="editar.html" class="transition hover:text-blue-600">Editar Perfil</a>
            <a href="#" class="transition hover:text-blue-600">Configuración</a>
          </div>
          <div class="p-2">
            <a href="../index.html" class="flex items-center space-x-2 transition hover:text-blue-600">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                </path>
              </svg>
              <div>Salir</div>
            </a>
          </div>
        </div>
      </div>
    </header>

    <div class="flex">
      <!-- aside -->
      <aside class="flex w-72 flex-col space-y-2 border-r-2 border-gray-200 bg-white p-2" style="height: 90.5vh;"
        x-show="asideOpen">
        <a href="pagina_principal.html"
          class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
          <span class="text-2xl"><i class="bx bx-home"></i></span>
          <span>Inicio</span>
        </a>

        <a href="graficas.html"
          class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
          <span class="text-2xl">
            <img src="../imagenes/graficas.png" width="24" height="25" alt="Gráficos">
          </span>

          <span>Graficas</span>
        </a>

        <div id="adminOptions">
                    <!-- Elementos que solo se mostrarán si el tipo de usuario es 'admin' -->
                    <a href="agregarAC.html" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                        <span class="text-2xl">
                            <img src="../imagenes/agregar.png" width="24" height="25" alt="Anadir" />
                        </span>
                        <span>Añadir AC</span>
                    </a>
                    <a href="eliminar.php" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                        <span class="text-2xl">
                            <img src="../imagenes/eliminar.png" width="24" height="25" alt="Eliminar" />
                        </span>
                        <span>Borrar AC</span>
                    </a>
                </div>
        <a href="perfil.html"
          class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
          <span class="text-2xl"><i class="bx bx-user"></i></span>
          <span>Perfil</span>
        </a>
      </aside>

      <!-- main content page -->
      <div class="card">
        <!-- Agrega el código PHP/HTML para eliminar y mostrar la tabla de Estado aquí -->
        <?php
        $servername = "localhost";
        $username = "id20904196_jahir";
        $password = "esqnxp7j56utquqqisdb1A-";
        $dbname = "id20904196_bdwebsite";

        // Crear la conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Verificar si se ha enviado un formulario para eliminar
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener la Ubicacion del estado a eliminar
            $ubicacion = $_POST["ubicacion"];

            // Consulta SQL para eliminar el registro
            $sql_delete = "DELETE FROM Estado WHERE Ubicacion = '$ubicacion'";

            if ($conn->query($sql_delete) === TRUE) {
            echo "<script>
                alert('No existe la ubicacion seleccionada');
              window.location.href = 'eliminar.php';
             </script>";
            } else {
             echo "<script>
                alert('Los datos se actualizaron correctamente');
              window.location.href = 'eliminar.php';
             </script>";
            }
        }

        // Consulta SQL para obtener los registros de la tabla Estado
        $sql_select = "SELECT Ubicacion, Estado, Temperatura FROM Estado";
        $result = $conn->query($sql_select);
        ?>
        <div class="titulo">
             <h2>Eliminar AC</h2>
        </div>
       
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="ubicacion">Selecciona o Ingresa la ubicación del AC</label>
            <input type="text" name="ubicacion" required>
            <br>
            <input type="submit" value="Eliminar">
        </form>

        <h2>Aires Acondicionados disponibles</h2>
        <table border="1">
            <tr>
                <th>Ubicacion</th>
                <th>Estado</th>
                <th>Temperatura</th>
            </tr>
            <?php
            // Mostrar los registros en la tabla
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo "<tr onclick=\"fillUbicacion('{$row['Ubicacion']}')\"><td>{$row['Ubicacion']}</td><td>{$row['Estado']}</td><td>{$row['Temperatura']} °C</td></tr>";

                }
            } else {
                echo "<tr><td colspan='3'>No hay registros</td></tr>";
            }
            ?>
        </table>

        <?php
        // Cerrar la conexión
        $conn->close();
        ?>
      </div>
    </div>
    <script>
      //script para desplegar el aside
      document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
          profileOpen: false,
          asideOpen: true,
        }));
      });

      // Función para llenar automáticamente el campo de ubicación al hacer clic en la tabla
      function fillUbicacion(ubicacion) {
        document.querySelector('input[name="ubicacion"]').value = ubicacion;
      }

      // obtener la cookie del usuario que inicio sesion
      document.addEventListener('DOMContentLoaded', function () {
        var username = getCookie('username');
        if (username) {
          var usernameDisplay = document.getElementById('usernameDisplay');
          usernameDisplay.textContent = username;
        }
      });

            //funcion para extraer al que inicio sesion y obtener su imagen
        document.addEventListener('DOMContentLoaded', function () {
            var nombreimagen = getCookie('nombreimagen');
            if (nombreimagen) {
                var imagenElement = document.getElementById('imagen');
                imagenElement.src = "../../fotos_perfil/" + nombreimagen;
                
                var profileImageElement = document.getElementById('profileImage');
                profileImageElement.src = "../../fotos_perfil/" + nombreimagen;
            } else {
                var imagenElement = document.getElementById('imagen');
                imagenElement.src = "../../fotos_perfil/usuario.jpg"; // Puedes proporcionar una imagen predeterminada en caso de que no haya ninguna imagen de perfil
                 var imagenElement = document.getElementById('profileImage');
                profileImageElement.src = "../../fotos_perfil/usuario.jpg"; // Puedes proporcionar una imagen predeterminada en caso de que no haya ninguna imagen de perfil
            }
        });
        //funcion para obtener cookie
        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }

    </script>
  </main>
</body>

</html>
