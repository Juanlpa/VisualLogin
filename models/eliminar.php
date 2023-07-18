<?php
include 'conexion.php';
$cedula=$_POST['cedula'];
$sqlEliminar="DELETE FROM estudiante WHERE cedula=$cedula";
if ($conn->query($sqlEliminar)==TRUE) {
echo json_encode("Se ha eliminado el estudiante");
} else {
    echo json_encode("Error: ". $sqlEliminar. "<br>". $conn->error);    
}
$conn->close();
?>