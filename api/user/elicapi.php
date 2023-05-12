<?php
// Incluir la clase Capi y establecer la conexión a la base de datos
include_once '../config/database.php';

// Incluir la clase Capi
include_once '../objects/capi.php';

// Crear una instancia de la clase Database
$database = new Database();
$db = $database->getConnection();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  
  // Crear una instancia de la clase Capi
  $capi = new Capi($db);
  // Iniciar sesión
  session_start();
  $usuario1 = $_GET['usuario1'];
  $rol = $_GET['rol'];
  // Llamar a la función Eliminar($id)
  $capi->Eliminar($id);
  $capi->log3();
  
  // Redireccionar a la página principal u otra ubicación después de eliminar el registro
  header('Location: ../../capacitaciones.php?usuario1=' . urlencode($usuario1) . '&rol=' . urlencode($rol) .'');
  exit();
}
?>
