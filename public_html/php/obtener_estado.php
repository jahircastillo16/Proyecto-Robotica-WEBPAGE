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

// Consulta para obtener el estado actual
$sql = "SELECT estado FROM Estado WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $estado = $row["estado"];
  echo $estado;
} else {
  echo "0"; // Valor predeterminado en caso de no encontrar registros
}

$conn->close();
?>
