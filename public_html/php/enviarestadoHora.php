<?php

include 'conexion.php';

if (isset($_POST['newEst'])) {
        $estado = $_POST['newEst'];
        echo "estado: " . $estado;
        
      $consulta = "UPDATE Estado SET estado = '$estado' WHERE ID = 1";
       // $consulta = "INSERT INTO Estado (Temperatura) VALUES ('$temperatura')";
     //   $resultado = mysqli_query($con, $consulta);
      //  if ($resultado) {
      if (mysqli_query ($con, $consulta)){
            echo "Registro en base de datos OK! ";
        } else {
            echo "Falla! Registro BD". mysqli_error($con);
        }
    } else {
    echo "Falla! Conexión con Base de datos ";
}
?>