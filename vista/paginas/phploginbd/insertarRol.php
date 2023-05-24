<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "Proyecto_Final";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $stmt = $conn->prepare("call Proyecto_Final.sp_insertarRolUsuario(:pNombreRolUsuario,:pDescripcion);");
  $stmt->bindParam(':pNombreRolUsuario', $pNombreRolUsuario);
  $stmt->bindParam(':pDescripcion', $pDescripcion);

  // insert a row
  $pNombreRolUsuario = $_REQUEST['pNombreRolUsuario'];
  $pDescripcion= $_REQUEST['pDescripcion'];
  $stmt->execute();

  Header("Location: usuario.php");
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?> INSERTAR