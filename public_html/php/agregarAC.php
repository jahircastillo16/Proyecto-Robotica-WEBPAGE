<?php
$servername = "localhost";
$username = "id20904196_jahir";
$password = "esqnxp7j56utquqqisdb1A-";
$dbname = "id20904196_bdwebsite";

// Establecer conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener datos del formulario
$ubicacion = $_POST['ubicacion'];
$codigoOn = $_POST['codigoOn'];
$codigoOff = $_POST['codigoOff'];

// Insertar datos en la tabla "Estado"
$sql = "INSERT INTO Estado (Ubicacion, CodigoOn, CodigoOff, estado, Temperatura) VALUES ('$ubicacion', '$codigoOn', '$codigoOff', '0', '99')";

if ($conn->query($sql) === TRUE) {
    // Datos insertados correctamente, mostrar ventana emergente y redirigir
    echo "<script>
            alert('Datos insertados correctamente.');
            window.location.href = '../html/agregarAC.html';
          </script>";
} else {
    // Error al insertar datos, mostrar ventana emergente con mensaje de error
    echo "<script>
            alert('Error al insertar datos: " . $conn->error . "');
            window.history.back();
          </script>";
}

$conn->close();
?>
