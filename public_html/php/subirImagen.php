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

// Verificar si se ha enviado una imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Obtener el nombre de usuario de la sesión actual
    $nombreUsuario = $_SESSION['username'];

    // Directorio de destino para la imagen
    $directorioDestino = "../fotos_perfil/";

    $nombreArchivo = basename($_FILES["imagen"]["name"]);
    $tipoArchivo = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

    // Verificar el tipo de archivo
    if ($tipoArchivo != "jpg" && $tipoArchivo != "jpeg") {
        echo "<script>
        alert('Solo se permiten archivos JPG o JPEG.');
        window.location.href = '../html/editar.html';
        </script>";
        exit;
    }

    $rutaArchivo = $directorioDestino . $nombreUsuario . ".jpg"; // Asegúrate de que la extensión sea .jpg

    // Mover el archivo cargado al directorio de destino
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaArchivo)) {
        // Actualizar la columna nombreimagen en la base de datos
        $sql = "UPDATE Usuarios SET nombreimagen='$nombreUsuario.jpg' WHERE usuario='$nombreUsuario'";

        if ($conn->query($sql) === TRUE) {
            //Nombre de imagen actualizado en la base de datos.
            echo "<script>
            alert('Imagen actualizada correctamente.');
            window.location.href = '../../html/editar.html';
            </script>";
        } else {
            echo "<script>
            alert('Error al actualizar la imagen " . $conn->error . "');
            window.location.href = '../../html/editar.html';
            </script>";
        }
    } else {
        echo "<script>
        alert('Error al subir la imagen.');
        window.location.href = '../../html/editar.html';
        </script>";
    }
} else {
    echo "<script>
    alert('No se recibió ninguna imagen para subir.');
    window.location.href = '../../html/editar.html';
    </script>";
}

$conn->close();
?>
