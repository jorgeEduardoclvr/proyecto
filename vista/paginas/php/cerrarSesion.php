<?php
session_start();
if(isset($_SESSION['usuarioValido'])){
    session_unset();
    session_destroy();

    echo '
    <script>
    window.location.href="../../../Index.html"
    </script>
    ';
}
else{
    echo 'No has iniciado sesion';
}

?>