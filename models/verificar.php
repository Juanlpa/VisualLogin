<?php
include 'conexion.php';

session_start();

$usuario = $_POST['usuario'];
$contra = $_POST['contra'];
$sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contra = '$contra'";
$resultado = mysqli_query($conn,$sql);

$row = mysqli_num_rows($resultado);

if ($row) {
    $_SESSION['usuario'] = $usuario;
    header('Location: ..\..\index.php?action=servicios');
    
    } else {
    header('Location: ..\..\index.php?action=logueadoe');   

}
$conn->close();
?>