<?php
session_start();
if (isset($_SESSION["usuarioValido"])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin pagina</title>
        <link rel="stylesheet" href="../../../styles.css">
        <script src="https://kit.fontawesome.com/8fa7958ccd.js" crossorigin="anonymous"></script>
        <script src="../../../vendor/alertifyjs/alertify.js"></script>
        <!--Boostrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
        <meta name="theme-color" content="#7952b3" />
        <script src="https://kit.fontawesome.com/a5cfe7c1c2.js" crossorigin="anonymous"></script>
        <!-- links -->
        <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
        <script>
            function mensaje() {
                var nombreUsuario = "<?php echo $_SESSION['usuarioValido']; ?>";
                var mensajeConcatenado = "Bienvenido " + nombreUsuario + "Tu rol es: Administrador";
                alertify.alert(mensajeConcatenado, function() {});
            }
        </script>
    </head>

    <body onload="mensaje();">
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
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="edificio">
                        <div class="decoracion">
                            <div class="circulo"></div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <footer class="text-muted py-5 header-bg">
            <div class="container">
                <p class="float-end mb-1">
                </p>
                <p class="mb-1">© 2023 Todos los derechos reservados.</p>
            </div>
        </footer>
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