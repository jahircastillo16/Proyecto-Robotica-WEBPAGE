<?php
$servername = "localhost"; // Cambiar si es necesario
$username ="id20893267_jahiruwu"; // Cambiar por el nombre de usuario de la base de datos
$password = "esqnxp7j56utquqqisdb1A-";// Cambiar por la contraseña de la base de datos
$dbname = "id20893267_dbairesacondicionados"; // Cambiar por el nombre de la base de datos

// Establecer conexión
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consulta para obtener el perfil del usuario
$sql = "SELECT nombre, apellido, usuario, tipousuario FROM Usuarios WHERE id_usuario = 1"; // Asegúrate de ajustar la consulta y el id del usuario según tu estructura de base de datos

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
  // Si hay resultados, imprimir los datos en formato JSON
  $fila = $resultado->fetch_assoc();
  echo json_encode($fila);
} else {
  // Si no hay resultados, imprimir un mensaje de error o hacer algo apropiado
  echo "No se encontró ningún perfil de usuario";
}

$conn->close();
?>
