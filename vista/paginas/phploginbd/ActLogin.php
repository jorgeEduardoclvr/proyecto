<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "Proyecto_Final";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("call Proyecto_Final.sp_ActualizarUsuario(:idlogin,:usuario,:contrasena);");
  $stmt->bindParam(':idlogin', $idlogin);
  $stmt->bindParam(':usuario', $usuario);
  $stmt->bindParam(':contrasena', $contrasena);

  // insert a row
  $idlogin = $_REQUEST['idlogin'];
  $usuario = $_REQUEST['usuario'];
  $contrasena = $_REQUEST['contrasena'];
  $stmt->execute();


  Header("Location: usuario.php");
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>