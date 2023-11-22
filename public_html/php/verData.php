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

// Obtener datos de la tabla "Estado"
$sql = "SELECT * FROM Estado";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Ubicación</th>
                <th>Código On</th>
                <th>Código Off</th>
                <th>Eliminar</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['Ubicacion']}</td>
                <td>{$row['CodigoOn']}</td>
                <td>{$row['CodigoOff']}</td>
                <td><a href='../php/borrarAC.php?id={$row['id']}' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este registro?\")'>Eliminar</a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No hay registros en la base de datos.";
}

$conn->close();
?>
