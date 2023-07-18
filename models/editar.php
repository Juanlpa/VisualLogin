<?php
include 'conexion.php';

$cedula=$_POST['cedula'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$edad=$_POST['edad'];

$sqlEditar="UPDATE estudiante SET nombre='$nombre',apellido='$apellido',telefono='$telefono',edad='$edad' WHERE cedula='$cedula'";
if ($conn->query($sqlEditar)==TRUE) {
    echo json_encode("Se ha editado el estudiante");
} else {
    echo json_encode("Error: ". $sqlEditar. "<br>". $conn->error);    
}
    $conn->close();
?>
