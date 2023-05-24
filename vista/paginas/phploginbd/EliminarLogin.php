<?php

include("conexion.php");
$con=conectar();

$idlogin=$_GET['idlogin'];

$sql="DELETE FROM Proyecto_Final.login  WHERE idlogin='$idlogin'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: usuario.php");
    }
?>