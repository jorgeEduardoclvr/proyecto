<?php

include("conexion.php");
$con=conectar();

$idRolUsuario=$_GET['idRolUsuario'];

$sql="DELETE FROM rolusuario  WHERE idRolUsuario='$idRolUsuario'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: usuario.php");
    }
?>