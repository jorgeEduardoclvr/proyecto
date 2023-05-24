<?php
include_once('../modelo/login.php');

$nombreUsuario = $_REQUEST['txtUsuario'];
$claveUsuario = $_REQUEST['txtContrasena'];

$objLogin = new Login($nombreUsuario, $claveUsuario);

if ($objLogin->validarLogin()) {
    $rolUsuario = $objLogin->getRol();
    $idlogin = $objLogin->getIdLogin();

    session_start();
    $_SESSION["idlogin"] = $objLogin->getIdLogin();

    define('ROL_ADMIN', 1);
    define('ROL_USUARIO', 2);

    switch ($rolUsuario) {
        case ROL_ADMIN:
            header('Location: ../vista/paginas/php/indexAdmin.php');
            break;

        case ROL_USUARIO:
            header('Location: ../vista/paginas/php/indexUsuario.php');
            break;

        default:
            echo "Rol de usuario inválido";
            break;
    }
} else {
    echo '<script> alert("Usuario y/o contraseña incorrecta"); </script>';
    echo '
    <script>
    window.location.href="../vista/login.html"
    </script>
    ';
}

