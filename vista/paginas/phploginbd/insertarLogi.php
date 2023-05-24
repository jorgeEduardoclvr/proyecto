<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "Proyecto_Final";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $stmt = $conn->prepare("call Proyecto_Final.sp_insertarLogin(:usuario,:contrasena, :rol);");
  $stmt->bindParam(':usuario', $usuario);
  $stmt->bindParam(':contrasena', $contrasena);
  $stmt->bindParam(':rol', $rol);

  // insert a row
  $usuario = $_REQUEST['NomLog'];
  $contrasena = $_REQUEST['Clave'];
  $rol = $_REQUEST['Rol'];
  $stmt->execute();

  Header("Location: usuario.php");
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?> INSERTAR