<?php
include 'conexion.php';

$cedula=$_POST['cedula'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$edad=$_POST['edad'];

$sqlInsertar="INSERT INTO estudiante(cedula,nombre,apellido,telefono,edad)
VALUES('$cedula','$nombre','$apellido','$telefono','$edad')";
if($conn->query($sqlInsertar)==TRUE){
    echo json_encode(("Se inserto el Estudiante"));
}else{
    echo json_encode(("error".$sqlInsertar.$conn->error()));
}
$conn->close();
?>

