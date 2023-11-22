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

// Obtener el ID del registro a eliminar
$id = $_GET['id'] ?? null;

if ($id !== null) {
    // Eliminar el registro de la tabla "Estado"
    $sql = "DELETE FROM Estado WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Registro eliminado correctamente.";
        } else {
            echo "No se encontró ningún registro para eliminar con ese ID.";
        }
    } else {
        echo "Error al ejecutar la eliminación: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID no proporcionado correctamente.";
}

$conn->close();
?>
