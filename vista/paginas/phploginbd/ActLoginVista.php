<?php
    include("conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM login WHERE idlogin='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
                <div class="container mt-5">
                    <form action="ActLogin.php" method="POST">
                                <input type="text" class="form-control mb-3" name="idlogin" placeholder="Id del usuario" value="<?php echo $row['idlogin']  ?>">
                                <input type="text" class="form-control mb-3" name="usuario" placeholder="Nombre" value="<?php echo $row['usuario']  ?>">
                                <input type="text" class="form-control mb-3" name="contrasena" placeholder="contraseña" value="<?php echo $row['contrasena']  ?>">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                </div>
    </body>
</html>