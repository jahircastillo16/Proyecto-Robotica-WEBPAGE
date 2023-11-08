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

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Consulta para obtener el perfil del usuario que ha iniciado sesión
    $sql = "SELECT nombre, apellido, usuario, tipousuario FROM Usuarios WHERE usuario = '$username'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Si hay resultados, imprimir los datos en formato JSON
        $fila = $resultado->fetch_assoc();
        echo json_encode($fila);
    } else {
        // Si no hay resultados, imprimir un mensaje de error o hacer algo apropiado
        echo "No se encontró ningún perfil de usuario";
    }
} else {
    // Manejar el caso en el que el usuario no ha iniciado sesión
    echo "Usuario no ha iniciado sesión";
}

$conn->close();
?>
