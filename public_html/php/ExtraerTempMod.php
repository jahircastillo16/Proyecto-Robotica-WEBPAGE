
<?php
$servername = "localhost";
$username = "id20904196_jahir";
$password = "esqnxp7j56utquqqisdb1A-";
$dbname = "id20904196_bdwebsite";



  // Establecer conexión a la base de datos
  $conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener el valor deseado
$sql = "SELECT TemperaturaMod FROM Estado WHERE ID = 1"; // Cambia "tabla" por el nombre de tu tabla y "id" por el campo que corresponda

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $valor = $row["TemperaturaMod"];
    echo $valor;
} else {
    echo "No se encontraron resultados";
}

$conn->close();
?>

