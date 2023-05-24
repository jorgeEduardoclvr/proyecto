<?php
include("../phploginbd/conexion.php");
$con = conectar();
$sql1 = "SELECT * FROM login";
$sql2 = "SELECT * FROM rolusuario";
$sql3 = "SELECT * FROM publicaciones";
$sql4 = "SELECT p.*, l.usuario FROM publicaciones as p inner join login as l on p.idUsuario = l.idlogin";

$query2 = mysqli_query($con, $sql1);
$query3 = mysqli_query($con, $sql2);
$query4 = mysqli_query($con, $sql3);
$query5 = mysqli_query($con, $sql4);

session_start();
if (isset($_SESSION["usuarioValido"])) {
    $idlogin = $_SESSION["idlogin"];
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog usuarios</title>
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
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
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
                                <a class="dropdown-item" href="../publicacion/PublicacionesUser.php">
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
        <div class="container mt-12">
            <div class="card">
                <div class="card-header">
                    Blog
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="Imagenes2.php">
                        <h5 class="card-title">¿Que esta pasando?</h5>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="titulo" placeholder="Titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea class="form-control" name="contenido" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Sube una imagen!</label>
                            <input class="form-control" type="file" name="imagen">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Fecha de publicacion</label>
                            <input class="form-control" type="text" name="fechaPublicacion" placeholder="YYYY-MM-DD" required pattern="\d{4}-\d{2}-\d{2}">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="hidden" name="idUsuario" value="<?php echo $idlogin; ?>" >
                        </div>
                        <input class="form-control btn btn-success" type="submit" name="enviarForm" value="Publicar">
                    </form>
                </div>
            </div>
        </div>
        </br>
        <div class="container mt-12">
            <?php
            while ($row = mysqli_fetch_array($query5)) {
            ?>
                <div class="card text-center">
                    <div class="card-header">
                        Publicacion
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['titulo'] ?></h5>
                        <p class="card-text"><?php echo $row['contenido'] ?></p>
                        <div class="card" style="width: 50rem;">
                        <img src="<?php echo $row['imagen'] ?>" class="card-img-top mx-auto d-block">
                        </div>
                        </br>
                        <p>
                        <h4>Autor: </h4><?php echo $row["usuario"] ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $row['fechaPublicacion'] ?>
                    </div>
                </div>
                </br>
            <?php
            }
            ?>
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