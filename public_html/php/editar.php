<?php
session_start();

$servername = "localhost";
$username = "id20904196_jahir";
$password = "esqnxp7j56utquqqisdb1A-";
$dbname = "id20904196_bdwebsite";

// Establecer conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si los datos se están enviando correctamente desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contrasena = $_POST['contrasena'];
  
    // Obtener el usuario de la sesión actual
    $usuario = $_SESSION['username'];

    // Consulta para actualizar los datos del usuario en la base de datos
    $sql = "UPDATE Usuarios SET nombre='$nombre', apellido='$apellido', contrasena='$contrasena' WHERE usuario='$usuario'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Los datos se actualizaron correctamente');
        window.location.href = '../../html/editar.html';
        </script>";
    } else {
        echo "<script>
        alert('Error al actualizar los datos: " . $conn->error . "');
        window.location.href = '../../html/editar.html';
        </script>";
    }
} else {
    echo "No se recibieron datos del formulario";
}

$conn->close();
?>
