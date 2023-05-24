<?php
include ('../phploginbd/conexion.php');

$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
// para subir la imagen dividemos en nombre y despues atrapamos la imagen
$n_imagen = $_FILES['imagen']['name'];
$imagen = $_FILES['imagen']['tmp_name'];

$fechaPublicacion = $_POST['fechaPublicacion'];
$idUsuario = $_POST['idUsuario'];

// ruta
$ruta = "image/" . $n_imagen;
$base_datos = "image/" . $n_imagen;

move_uploaded_file($imagen, $ruta);
$con = conectar();

$insertar = mysqli_query($con, "Insert into
publicaciones (titulo,contenido,imagen,idUsuario, fechaPublicacion)
values('$titulo', '$contenido', '$base_datos', '$idUsuario', '$fechaPublicacion')");

if($insertar ){
    echo '
    <script>
        alert("Los datos se guardaron correctamente");
    </script>
    ';
    header("location:PublicacionesUser.php");
}else{
    echo '
    <script>
        alert("Los datos NO se guardaron correctamente");
    </script>
    ';
}
?>