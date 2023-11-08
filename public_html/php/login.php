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

// Obtener los datos enviados desde el formulario de inicio de sesión
$username_input = $_POST['username'];
$password = $_POST['password'];

// Consulta para verificar las credenciales del usuario
$sql = "SELECT * FROM Usuarios WHERE usuario = '$username_input' AND contrasena = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Credenciales válidas, iniciar sesión y configurar la cookie del nombre de imagen
    $row = $result->fetch_assoc();
    $username_from_db = $row['usuario'];
    $nombreimagen_from_db = $row['nombreimagen'];

    if (strtolower($username_from_db) === strtolower($username_input)) {
        $_SESSION['username'] = $username_from_db;
        setcookie('username', $username_from_db, time() + (86400 * 30), "/"); // Cookie válida por 30 días
        setcookie('nombreimagen', $nombreimagen_from_db, time() + (86400 * 30), "/"); // Configurar la cookie del nombre de imagen por 30 días
        header("Location: ../html/pagina_principal.html"); // Redireccionar a la página principal después de iniciar sesión
    } else {
        header("Location: ../index.html?error=true");
    }
} else {
    // Credenciales inválidas, mostrar mensaje de error
    //echo "Credenciales inválidas. Inténtalo de nuevo.";
    header("Location: ../index.html?error=true");
}

$conn->close();
?>
