<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "Proyecto_Final";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("call Proyecto_Final.sp_ActualizarRol(:idrolusuario,:nombre,:descripcion);");
  $stmt->bindParam(':idrolusuario', $idrolusuario);
  $stmt->bindParam(':nombre', $nombre);
  $stmt->bindParam(':descripcion', $descripcion);

  // insert a row
  $idrolusuario = $_REQUEST['idRolUsuario'];
  $nombre = $_REQUEST['nombre'];
  $descripcion = $_REQUEST['descripcion'];
  $stmt->execute();


  Header("Location: usuario.php");
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>