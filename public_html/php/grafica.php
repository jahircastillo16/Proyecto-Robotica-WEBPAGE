
<?php
$servername = "localhost";
$username = "id20904196_jahir";
$password = "esqnxp7j56utquqqisdb1A-";
$dbname = "id20904196_bdwebsite";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para recuperar los datos
$sql = "SELECT hora, temperatura FROM DatosAC";
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 resultados";
}
$conn->close();

echo json_encode($data);
?>