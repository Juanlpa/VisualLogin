<?php
$servername="localhost";
$username="root";
$password="";
$datbasename="cuarto";
$conn=mysqli_connect($servername,$username,$password,$datbasename);
if(!$conn){
die("Error de Conexion".mysqli_connect_error());
}
?>