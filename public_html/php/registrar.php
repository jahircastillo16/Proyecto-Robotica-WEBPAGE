<?php
// Conectar a la base de datos (ajusta las credenciales según tu configuración)
$servername = "localhost";
$username = "id20904196_jahir";
$password = "esqnxp7j56utquqqisdb1A-";
$dbname = "id20904196_bdwebsite";



  // Establecer conexión a la base de datos
  $conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$tipousuario = $_POST["tipousuario"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
$confirmar_contrasena = $_POST["confirmar_contrasena"];

// Verificar si las contraseñas coinciden
if ($contrasena !== $confirmar_contrasena) {
    die("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
}

// Verificar si ya existe un usuario con el mismo nombre de usuario
$sql = "SELECT * FROM Usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //die("Ya existe un usuario con el mismo nombre de usuario. Por favor, elige otro nombre de usuario.");
        echo "<script>alert('Ya existe un usuario con el mismo nombre de usuario. Por favor, elige otro nombre de usuario.'); window.location.href='../html/crearcuenta.html';</script>";
}

// Insertar los datos en la tabla Usuarios
$sql = "INSERT INTO Usuarios (nombre, apellido, contrasena, tipousuario, usuario, nombreimagen) VALUES ('$nombre', '$apellido', '$contrasena', '$tipousuario', '$usuario', 'usuario.jpg')";

if ($conn->query($sql) === TRUE) {
    // Cuenta creada con éxito, redirigir al login.html
    echo "<script>alert('Cuenta creada exitosamente.'); window.location.href='../index.html';</script>";
} else {
    //echo "Error al registrar la cuenta: " . $conn->error;
    echo "<script>alert('Error al registrar la cuenta.'); window.location.href='../html/crearcuenta.html';</script>";
    
}

// Cerrar la conexión
$conn->close();
?>
