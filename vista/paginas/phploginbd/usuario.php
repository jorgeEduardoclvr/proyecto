<?php
include("conexion.php");
$con = conectar();
$sql1 = "SELECT * FROM login";
$sql2 = "SELECT * FROM rolusuario";
$query2 = mysqli_query($con, $sql1);
$query3 = mysqli_query($con, $sql2);

session_start();
if (isset($_SESSION["usuarioValido"])) {
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title> Usuario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../../styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>

        <script src="https://kit.fontawesome.com/a5cfe7c1c2.js" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <h1 class="navbar-brand mx-auto">Espacio Arquitectonico en México</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                        <a class="nav-link active" aria-current="page" href="../php/indexAdmin.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <i class="fa-solid fa-landmark" style="color: #ffffff;"></i>
                        <a class="nav-link active" aria-current="page" href="Ed_inicio.html">Edificios</a>
                    </li>
                    <li class="nav-item">
                        <i class="fa-solid fa-building" style="color: #ffffff;"></i>
                        <a class="nav-link active" aria-current="page" href="Es_inicio.html">Espacios Urbanos</a>
                    </li>
                    <li class="nav-item">
                        <i class="fa-sharp fa-solid fa-helmet-safety" style="color: #ffffff;"></i>
                        <a class="nav-link active" aria-current="page" href="Bio_inicio.html">Biografias</a>
                    </li>
                    <!-- Agregar un dropdownlist -->
                    <li class="nav-item dropdown">
                        <i class="fas fa-user" style="color:#ffffff;"></i>
                        <a class="nav-link dropdown-toggle" style="color: #ffffff;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            echo '' . $_SESSION['usuarioValido'];
                            ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="../phploginbd/usuario.php"><i class="fas fa-users-cog">
                                    </i>&nbsp;<span style="font-family: inherit;">Administrar usuarios</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="../publicacion/Publicaciones.php">
                                <i class="fas fa-comment-alt"></i>&nbsp;<span style="font-family: inherit;">Blog</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="../php/cerrarSesion.php">
                                    <i class="fas fa-sign-out"></i>&nbsp;<span style="font-family: inherit;">Salir</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>Agregar usuarios</h1>
                <form action="insertarLogi.php" method="POST">
                    <input type="text" class="form-control mb-3" id="NomLog" name="NomLog" placeholder="Nombre usuario" required>
                    <input type="text" class="form-control mb-3" id="Clave" name="Clave" placeholder="Contraseña" required>
                    <input type="text" class="form-control mb-3" id="Rol" name="Rol" placeholder="Rol" required>
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>idlogin</th>
                            <th>User Name</th>
                            <th>Contraseña</th>
                            <th>id rol usuario</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query2)) {
                        ?>
                            <tr>
                                <th><?php echo $row['idlogin'] ?></th>
                                <th><?php echo $row['usuario'] ?></th>
                                <th><?php echo $row['contrasena'] ?></th>
                                <th><?php echo $row['idRolUsuario'] ?></th>
                                <th><a href="ActLoginVista.php?id=<?php echo $row['idlogin'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="EliminarLogin.php?idlogin=<?php echo $row['idlogin'] ?>" class="btn btn-danger">Eliminar</a></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>Agregar roles</h1>
                <form action="insertarRol.php" method="POST">
                    <input type="text" class="form-control mb-3" id="pNombreRolUsuario" name="pNombreRolUsuario" placeholder="Nombre del rol" required>
                    <input type="text" class="form-control mb-3" id="pDescripcion" name="pDescripcion" placeholder="Descripcion" required>
                    <input type="submit" class="btn btn-success">
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Rol</th>
                            <th>Descripcion</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query3)) {
                        ?>
                            <tr>
                                <th><?php echo $row['idRolUsuario'] ?></th>
                                <th><?php echo $row['nombreRolUsuario'] ?></th>
                                <th><?php echo $row['descripcion'] ?></th>
                                <th><a href="ActRolVista.php?id=<?php echo $row['idRolUsuario'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="EliminarRol.php?idRolUsuario=<?php echo $row['idRolUsuario'] ?>" class="btn btn-danger">Eliminar</a></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<?php
} else {
    echo 'Debes inicar sesion';
    echo '<br>';
    echo '
  <a href="../../../Index.html">
  inicair sesion
  </a>
  ';
}
?>