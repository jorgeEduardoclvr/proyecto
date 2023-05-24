<?php
    include("conexion.php");
    $con=conectar();

$idRol=$_GET['id'];

$sql="SELECT * FROM rolusuario WHERE idRolUsuario='$idRol'";
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
                    <form action="ActRol.php" method="POST">
                                <input type="text" class="form-control mb-3" name="idRolUsuario" placeholder="Id de Rol" value="<?php echo $row['idRolUsuario']  ?>">
                                <input type="text" class="form-control mb-3" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $row['nombreRolUsuario']  ?>">
                                <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion" value="<?php echo $row['descripcion']  ?>">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                </div>
    </body>
</html>